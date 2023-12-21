<?php

namespace App\Http\Controllers\Lawyer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Client;
use App\ClientEngagement;

class ClientController extends Controller
{

	public function index()
	{
		if (request()->ajax()) {
			return DataTables::of(Client::query()->where('client_class_id',1)->whereLawyerId(auth()->guard('lawyer')->id()))
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addIndexColumn()
			->addColumn('action', function ($row) {
				$edit = route('lawyer.client.edit', $row->id);
				$show = route('lawyer.client.show', $row->id);
				$delete = route('lawyer.client.delete', $row->id);
				$confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<a href="' . $show . '" class="btn btn-info btn-sm">View</a> <a href="' . $edit . '" class="edit btn btn-success btn-sm">Edit</a> <a onClick="'.$confirm.'" href="' . $delete . '" class="delete btn btn-danger btn-sm">Delete</a>';
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.client.index');
	}

	public function create()
	{
		return view('lawyer.client.create');
	}
	public function store(Request $request)
	{
		$client = Client::create(request()->except('engagement_from','engagement_to','engagement_document','engagement_note'));
		
		$engagement = new ClientEngagement();
		$engagement->engagement_from  = $request->engagement_from;
		$engagement->engagement_to  = $request->engagement_to;
		$engagement->engagement_note  = $request->engagement_note;
		 if ($request->hasFile('engagement_document')) {
            $image = $request->file('engagement_document');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/client'), $imageName);
            $engagement->engagement_document  = $imageName;
        }
        $engagement->client_id = $client->id;
		$engagement->save();
		
		
		$notification=array('messege'=>"Client Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	public function edit($id){
		$client = Client::find($id);
		$clientEngagement = ClientEngagement::where('client_id',$client->id)->get();
		//dd($clientEngagement);
		return view('lawyer.client.edit', compact('client','clientEngagement'));
	}
		public function show($id){
		$client = Client::find($id);
		$clientEngagement = ClientEngagement::where('client_id',$client->id)->get();
		return view('lawyer.client.edit', compact('client','clientEngagement'));
	}
	public function update(Request $request,$id){
	    
	    //dd($request->engagement_document);
		$client = Client::findOrFail($id);
		$client->update(request()->except('engagement_id','engagement_from','engagement_to','engagement_document','engagement_note'));
		
		if($request->engagement_id){
		    
		foreach($request->engagement_id as $id){

    		$engagement = ClientEngagement::findOrFail($id);
    		$engagement->engagement_from  = $request->engagement_from[$id];
    		$engagement->engagement_to  = $request->engagement_to[$id];
    		$engagement->engagement_note  = $request->engagement_note[$id];
    		
    		 
		    if ($request->engagement_document && $request->engagement_document[$id]) {
		        $image = $request->engagement_document[$id];
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/client'), $imageName);
                $engagement->engagement_document  = $imageName;
               
		    }
		    

    		$engagement->save();
		
		}
		}
		
		$notification=array('messege'=>"Client Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	public function destroy($id){
		$client = Client::findOrFail($id)->delete();
		$notification=array('messege'=>"Client Deleted Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.index')->with($notification);
	}
	
// 	Client Persons
    
    public function person_index()
	{
		if (request()->ajax()) {
			return DataTables::of(Client::query()->where('client_class_id',2)->whereLawyerId(auth()->guard('lawyer')->id()))
			->setRowId('{{$id}}')
			->setRowAttr([
				'align' => 'center'
			])
			->addIndexColumn()
			->addColumn('action', function ($row) {
				$edit = route('lawyer.client.person.edit', $row->id);
				$show = route('lawyer.client.person.show', $row->id);
				$delete = route('lawyer.client.person.delete', $row->id);
				$confirm = "return confirm('Are you sure you want to delete?')";
				$actionBtn = '<a href="' . $show . '" class="btn btn-info btn-sm">View</a> <a href="' . $edit . '" class="edit btn btn-success btn-sm">Edit</a> <a onClick="'.$confirm.'" href="' . $delete . '" class="delete btn btn-danger btn-sm">Delete</a>';
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('lawyer.client.person.index');
	}
	
           

	public function person_create()
	{
		return view('lawyer.client.person.create');
	}
	public function person_store()
	{
		$client = Client::create(request()->all());
		$notification=array('messege'=>"Client Added Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	public function person_edit($id){
		$client = Client::find($id);
		//dd($clientEngagement);
		return view('lawyer.client.person.edit', compact('client'));
	}
	public function person_show($id){
		$client = Client::find($id);
		return view('lawyer.client.person.edit', compact('client'));
	}
	public function person_update(Request $request,$id){
	    
	    //dd($request->engagement_document);
		$client = Client::findOrFail($id);
		$client->update(request()->all());
	
		$notification=array('messege'=>"Client Updated Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	public function person_destroy($id){
		$client = Client::findOrFail($id)->delete();
		$notification=array('messege'=>"Client Deleted Successfully",'alert-type'=>'success');
		return redirect()->route('lawyer.client.person.index')->with($notification);
	}
	
	
	
}