<?php

namespace App\Http\Controllers\Lawyer;

use App\CaseProceeding;
use App\Cases;
use App\Bill;
use App\BillClass;
use App\BillCategory;
use App\BillReference;
use App\InvoiceSubject;
use App\BillType;
use App\Client;
use App\LedgerHead;
use App\LedgerSubHead;
use App\Ledger;
use App\PaymentType;
use App\Adjustmentreason;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function ledgerEntryView()
    {
        return view('lawyer.account.ledger-entry-view');
    }
    public function billing()
    {
        if(request()->case_id){
            session()->put('case_id',request()->case_id);
        }else{
            if(!request()->ajax()){
                session()->forget('case_id');
            }
            
        }
        if(request()->bill_case_service_id){
            session()->put('bill_case_service_id',request()->bill_case_service_id);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_case_service_id');
            }
            
        }
        if (request()->ajax()) {
            return DataTables::of(Bill::with('cases','client','type','reference','cases.caseTitleShort','ledgers')->when(session()->has('case_id'),function($q){
                return $q->where('cases_id',session()->get('case_id'));
                })->when(session()->has('bill_case_service_id'),function($q){
                return $q->where('bill_case_service_id',session()->get('bill_case_service_id'));
                })->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addIndexColumn()
                ->addColumn('bill_date', function ($q) {
                        return $q->bill_date->format('d-m-Y');
                })
                ->addColumn('bill_no', function ($q) {
                        return 'BL-000'.$q->id;
                })
                ->addColumn('balance_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    if($due == 0){
                        return '<span class="badge badge-success" style="font-size:13px">Paid<span/>';
                    }else{
                        return '<span class="text-danger">'.$due.'<span/>';
                    }
                })
                ->addColumn('reference_name', function ($q) {
                    if($q->reference){
                        return $q->reference->name;
                    }else{
                        return '';
                    }
                })
                ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->bill_case_service_id);
                
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
            })
                ->addColumn('action', function ($row) {
                    $received = $row->ledgers()->sum('paid_received_amount');
                    $due = $row->bill_amount - $received;
                    if($due <= 0){
                    $ledger = route('lawyer.account.ledger-entry', ['bill_no_id'=>$row->id]);
                    }else{
                    $ledger = route('lawyer.account.ledger-entry-create', ['bill_no_id'=>$row->id]);
                    }
                    $show = route('lawyer.account.billing.show', $row->id);
                    $delete = route('lawyer.account.billing.delete', $row->id);
                    $confirm = "return confirm('Are you sure you want to delete?')";
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" href="'.$ledger.'"><i class="fas fa-scroll mr-2"></i> </a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
                })
                ->rawColumns(['bill_particulars_modify','balance_amount','case_no','action'])
                ->make(true);
        }
        $title = 'Bill List';
        return view('lawyer.account.billing', compact('title'));
    }
    public function ledgerEntry()
    {
        if(request()->bill_no_id){
            session()->put('bill_no_id',request()->bill_no_id);
        }else{
            if(!request()->ajax()){
                session()->forget('bill_no_id');
            }
            
        }
        if (request()->ajax()) {
            return DataTables::of(Ledger::with('client','ledgerhead','ledgersubhead','cases','cases.caseTitleShort','bill','paymenttype','adjustmentreason')->when(session()->has('bill_no_id'),function($q){
                return $q->where('bill_no_id',session()->get('bill_no_id'));
                })->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addColumn('transaction_date', function ($q) {
                        return $q->transaction_date->format('d-m-Y');
                })
                ->addColumn('bill_date', function ($q) {
                        return $q->bill->bill_date->format('d-m-Y');
                })
                ->addColumn('ledgersubhead_name', function ($user) {
                if($user->ledgersubhead){
                    return $user->ledgersubhead->name;
                }else{
                    return '';
                }
                })
                ->addColumn('paymenttype_name', function ($user) {
                if($user->paymenttype){
                    return $user->paymenttype->name;
                }else{
                    return '';
                }
                })
                ->addColumn('bill_no', function ($q) {
                        return 'BL-000'.$q->id;
                })
                ->addColumn('completed', function ($q) {
                    if($q->is_completed == 1){
                        return 'Yes';
                    }else{
                        return 'No';
                    }
                })
                ->addColumn('adjustmentreason_name', function ($q) {
                    if($q->adjustmentreason){
                        return $q->adjustmentreason->name;
                    }else{
                        return '';
                    }
                })
                ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->case_service_job_id);
                
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
            })
                ->addColumn('action', function ($row) {
                    $show = route('lawyer.account.billing.show', $row->id);
                    $delete = route('lawyer.account.billing.delete', $row->id);
                     $confirm = "return confirm('Are you sure you want to delete?')";
                    $actionBtn='<div class="dropdown action_doc"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i> </button> <div style="width:3rem" class="dropdown-menu " aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a><a class="dropdown-item" onClick="'.$confirm.'" href="'.$delete.'"><i class="fas fa-trash-alt mr-2"></i></a> </div></div>';
                return $actionBtn;
                })
                ->rawColumns(['case_no','action'])
                ->make(true);
        }
        $title = 'Ledger-Entry';
        return view('lawyer.account.ledger-entry', compact('title'));
    }
    public function billingCreate()
    {
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->where('status',1)->latest()->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->get();
        $billCategories = BillCategory::latest()->get();
        $billReferences = BillReference::oldest('sort')->get();
        $billTypes = BillType::oldest('sort')->get();
        $cpl=null;
        if(request()->cpl_id){
            $cpl = CaseProceeding::with('cases','order','proceeding','cases.caseTitleShort','cases.client')->findOrFail(request()->cpl_id);
        }
        return view('lawyer.account.billing_create', compact('cases', 'billCategories', 'billReferences', 'billTypes','clients','cpl'));
    }
    public function ledgerEntryCreate()
    {
        $clients = Client::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        $ledgerheads = LedgerHead::latest()->get();
        $ledgersubheads = LedgerSubHead::latest()->get();
        $bills = Bill::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        
        $legal_services = \DB::table('legal_services')->get();
        $cases = Cases::whereLawyerId(auth()->guard('lawyer')->id())->latest()->get();
        $paymenttypes = PaymentType::latest()->get();
        $reasons = Adjustmentreason::latest()->get();
        $bill = null;
        if(request()->bill_no_id){
            $bill = Bill::with('client')->findOrFail(request()->bill_no_id);
        }
        return view('lawyer.account.ledger_entry_create', compact('bills','clients','ledgerheads','ledgersubheads','legal_services','cases','paymenttypes','reasons','bill'));
    }

    public function ledgerStore(Request $request)
    {
        Ledger::create($request->except('_token','is_bill'));
        $notification = array('messege' => "Ledger Added Successfully", 'alert-type' => 'success');
        if(request()->is_bill == 1){
            return redirect()->route('lawyer.account.billing')->with($notification);
        }
            return redirect()->route('lawyer.account.ledger-entry')->with($notification);
    }
    public function ledgerReport()
    {
        $ledgerHead = LedgerHead::all();
        $ledgerSubHead = LedgerSubHead::all();
        $paymentType = PaymentType::all();
        $clients = Client::all();
        return view('lawyer.account.ledger-report',compact('ledgerHead','ledgerSubHead','paymentType','clients'));
    }
    
    
    public function getSubHead(Request $request)
    {
        $data = LedgerSubHead::where("ledger_head_id", $request->head_id)->oldest('sort')
                                    ->get();
        return response()->json($data);
    }
    
    public function fetchCaseService(Request $request)
    {
        $data['cases'] = Cases::with('caseTitleShort')->where("case_infos_case_no", $request->type)
                                    ->get();
        return response()->json($data);
    }
    
    
    
    public function balanceReport()
    {
        if (request()->ajax()) {
            return DataTables::of(Bill::with('cases','client','type','reference','cases.caseTitleShort','ledgers')->whereLawyerId(auth()->guard('lawyer')->id())->latest())
                ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
                ->setRowId('{{$id}}')
                ->setRowAttr([
                    'align' => 'center'
                ])
                ->addIndexColumn()
                ->addColumn('bill_no', function ($q) {
                    $bill = route('lawyer.account.billing.show',$q->id);
                    return '<a href="'.$bill.'" target="_blank">BL-000'.$q->id.'</a>';
                })
                ->addColumn('case_no', function ($user) {
                $show = route('lawyer.litigation.case.show', $user->bill_case_service_id);
                
                return '<a href="'.$show.'" target="_blank">'.$user->cases->caseTitleShort->name_short.' '.$user->cases->case_infos_case_no.'/'.$user->cases->case_infos_case_year.'</a>';
                })
                ->addColumn('received_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    return $received;
                })
                ->addColumn('balance_amount', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    return $due;
                })
                ->addColumn('status', function ($q) {
                    $received = $q->ledgers()->sum('paid_received_amount');
                    $due = $q->bill_amount - $received;
                    if($q->bill_amount > $received){
                        return '<span class="badge badge-danger font-weight-bold">Due<span/>';
                    }else{
                        return '<span class="badge badge-success font-weight-bold">Paid<span/>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $show = route('lawyer.account.ledger-entry', ['bill_no_id'=>$row->id]);
                    $actionBtn='<a class="dropdown-item" href="'.$show.'"><i class="fas fa-eye mr-2"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['case_no','bill_no','status','action'])
                ->make(true);
        }
        $title = 'Balance Report';
        $bills = Bill::with('ledgers')->whereLawyerId(auth()->guard('lawyer')->id());
        $ledgers = Ledger::whereLawyerId(auth()->guard('lawyer')->id());
        return view('lawyer.account.balance-report', compact('title','bills','ledgers'));
    }
    public function invoice()
    {
        $clients = Client::where('status',1)->get();
        $subjects = InvoiceSubject::where('status',1)->get();
        return view('lawyer.account.invoice',compact('clients','subjects'));
    }
    public function invoiceGenerate()
    {
        $bills = Bill::whereLawyerId(auth()->guard('lawyer')->id())->where('bill_client_id',request()->client_id)->whereBetween('bill_date',[request()->from,request()->to])->oldest();
        if(request()->type == 'District'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District');
            });
        }
        if(request()->type == 'Special'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Special');
            });
        }
        if(request()->type == 'High Court'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court');
            });
        }
        if(request()->type == 'Appellate'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','Appellate');
            });
        }
        if(request()->type == 'District & Special'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','District')->orWhere('case_class_id','Special');
            });
        }
        if(request()->type == 'Supreame Court'){
            $bills->whereHas('cases',function($q){
                $q->where('case_class_id','High Court')->orWhere('case_class_id','Appellate');
            });
        }
        $client = Client::findOrFail(request()->client_id);
        $from= request()->from;
        $to= request()->to;
        if(!request()->subject_name){
        $subject = InvoiceSubject::findOrFail(request()->subject_id)->name;
        }else{
        $subject = request()->subject_name;
        }
        $bills = $bills->get();
        $vat = 0;
        $tax = 0;
        $subtotal = $bills->sum('bill_amount');
        $total= $subtotal;
        if(request()->tax){
            $tax = $subtotal * 0.1;
            $total +=$tax;
        }
        if(request()->vat){
            $vat = $total * 0.15;
            $total += $vat;
        }
        
        return view('lawyer.account.invoice-pdf',compact('bills','client','from','to','subject','subtotal','vat','tax','total'));
    }
    public function incExpReport()
    {
        return view('lawyer.account.income-expense-report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bill::create(request()->except('is_bill'));
        $notification = array('messege' => "Billing Added Successfully", 'alert-type' => 'success');
        if(request()->is_bill){
            return redirect()->route('lawyer.litigation.case.show',['cases'=>request()->bill_case_service_id,'bill'=>'true'])->with($notification);
        }
        return redirect()->route('lawyer.account.billing')->with($notification);
    }
    
  
    
    public function getbillClient(Request $request)
    {
        $data = Cases::with('caseTitleShort:id,name_short')->where("client_id", $request->billClient)->get(['case_infos_case_title_sort_id','id','case_infos_case_no','case_infos_case_year']);
        return response()->json($data);
    }
    public function getBillByCase(Request $request)
    {
        $data = Bill::where('bill_case_service_id',$request->case_id)->get(['id','bill_particulars']);
        return response()->json($data);
    }
    
    
    public function getBill(Request $request)
    {
        $bill = Bill::find($request->bill_id);
        $data['bill_amount'] = $bill->bill_amount;
        $data['balance_amount'] = $bill->bill_amount - $bill->ledgers()->sum('paid_received_amount');
        return response()->json($data);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        Ledger::findOrFail($id)->delete();
         $notification = array('messege' => "Ledger Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function printPdf()
    {
        return view('lawyer.account.invoice-pdf');
    }
    
    
}
