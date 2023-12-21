<?php

namespace App\Http\Controllers\Lawyer;
use App\Chamber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Image;
use File;
use Hash;

class ChamberController extends Controller
{
    
    public function all()
    {
        if (request()->ajax()) {
            return DataTables::of(Chamber::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-danger" }}')
            ->setRowId('{{$id}}')
            ->setRowAttr([
                'align' => 'center'
            ])
            
            ->addColumn('status',function($row){
                if($row->status==1){
                   $actionBtn = 'Active';
                    return $actionBtn;
                }else{
                     $actionBtn = 'DeActive';
                    return $actionBtn;
                }
                
            })
            ->rawColumns(['status'])
            
            ->addColumn('action', function ($row) {
                $edit = route('lawyer.chamber.edit', $row->id);
                $show = route('lawyer.chamber.show', $row->id);
                $delete = route('lawyer.chamber.delete', $row->id);
                $actionBtn = '<a href="' . $show . '" class="btn btn-info btn-sm">View</a> <a href="' . $edit . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . $delete . '" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
             ->rawColumns(['action'])
            ->make(true);
        }
        $title = 'All Chamber List';
        return view('lawyer.chamber.all',compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Chamber';
        return view('lawyer.chamber.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Chamber;
        $data->ch_name = $request->ch_name;
        $data->ch_telephone = $request->ch_telephone;
        $data->ch_mobile_one = $request->ch_mobile_one;
        $data->ch_mobile_two = $request->ch_mobile_two;
        $data->ch_email_one = $request->ch_email_one;
        $data->ch_email_two = $request->ch_email_two;
        $data->ch_main_office_address = $request->ch_main_office_address;
        $data->ch_office_one_address = $request->ch_office_one_address;
        $data->ch_office_two_address = $request->ch_office_two_address;
        $data->ch_person_type = $request->ch_person_type;
        $data->ch_letter_write_up = $request->ch_letter_write_up;
        $data->ch_letter_address = $request->ch_letter_address;
        $data->status = $request->status;
        $data->user_id = $request->lawyer_id;

        if ($request->hasFile('ch_logo')) {
            $image = $request->file('ch_logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data->ch_logo =  $imageName;
        }
        
        if ($request->hasFile('ch_person_signature')) {
            $image = $request->file('ch_person_signature');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data->ch_person_signature = $imageName;
        }
        
        $data->save();
            
        $notification = array('messege' => "Chamber Added Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.chamber.all')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Chamber::find($id);
        $title = 'Show Chamber';
        //dd($data);
        return view('lawyer.chamber.show',compact('title','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = Chamber::find($id);
        $title = 'Update Chamber';
        return view('lawyer.chamber.edit',compact('title','data'));
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
        //dd($request->all());
        //Chamber::create($request->all());
        
        $data = Chamber::find($id);
        $data->ch_name = $request->ch_name;
        $data->ch_telephone = $request->ch_telephone;
        $data->ch_mobile_one = $request->ch_mobile_one;
        $data->ch_mobile_two = $request->ch_mobile_two;
        $data->ch_email_one = $request->ch_email_one;
        $data->ch_email_two = $request->ch_email_two;
        $data->ch_main_office_address = $request->ch_main_office_address;
        $data->ch_office_one_address = $request->ch_office_one_address;
        $data->ch_office_two_address = $request->ch_office_two_address;
        $data->ch_person_type = $request->ch_person_type;
        $data->ch_letter_write_up = $request->ch_letter_write_up;
        $data->ch_letter_address = $request->ch_letter_address;
        $data->status = $request->status;
        $data->user_id = $request->lawyer_id;
        
        //dd($data);
        
        if ($request->hasFile('ch_logo')) {
            
            $old_image= $request->old_image;
            if($old_image)
            {
                File::delete('/public/uploads/chamber-images/' . $old_image);
            }
            $image = $request->file('ch_logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data->ch_logo =  $imageName;
        }
        
        if ($request->hasFile('ch_person_signature')) {
            $old_image1= $request->old_image1;
            if($old_image1)
            {
                File::delete('/public/uploads/chamber-images/' . $old_image1);
            }
            $image = $request->file('ch_person_signature');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/chamber-images'), $imageName);
            $data->ch_person_signature = $imageName;
        }
        
        $data->save();
            
        $notification = array('messege' => "Chamber Updated Successfully", 'alert-type' => 'success');
        return redirect()->route('lawyer.chamber.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $data = Chamber::find($id);
        $image_path = asset('uploads/chamber-images/').$data->ch_logo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        $image_path1 = asset('uploads/chamber-images/').$data->ch_person_signature;
        if(file_exists($image_path1)){
            unlink($image_path1);
        }
        
        $data->delete();
        
        $notification = array('messege' => "Chamber Deleted Successfully", 'alert-type' => 'success');
        return back()->with($notification);
    }
}