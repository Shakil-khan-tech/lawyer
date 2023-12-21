@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')

@endsection
@section('lawyer-content')

 <form id="myForm" action="{{ route('lawyer.chamber.store'); }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="lawyer_id" value="{{ auth()->guard('lawyer')->id() }}">
        
    <div class="row">
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Chamber Information</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_name" class="col-form-label font-weight-bold text-info mb-1 p-0">Name Of Chamber <span class="text-danger">*</span></label>
        	                    <input type="text" name="ch_name" id="ch_name" class="form-control" required />
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_logo" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Logo<span class="text-danger">*</span></label>
        	                    <input type="file" name="ch_logo" id="ch_logo" class="form-control p-1" />
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_telephone" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Telephone<span class="text-danger">*</span></label>
        	                    <input type="number" name="ch_telephone" id="ch_telephone" class="form-control" required />
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_mobile_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-1<span class="text-danger">*</span></label>
        	                    <input type="number" name="ch_mobile_one" id="ch_mobile_one" class="form-control" required placeholder="+880"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
            	            <div class="form-group">
            	                <label for="ch_mobile_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Mobile-2<span class="text-danger">*</span></label>
        	                    <input type="number" name="ch_mobile_two" id="ch_mobile_two" class="form-control" required placeholder="+880"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_email_one" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-1<span class="text-danger">*</span></label>
        	                    <input type="email" name="ch_email_one" id="ch_email_one" class="form-control" required placeholder="example@gmail.com"/>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_email_two" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Email-2<span class="text-danger">*</span></label>
        	                    <input type="email" name="ch_email_two" id="ch_email_two" class="form-control" required placeholder="example@gmail.com"/>
            	            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_main_office_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Main Office Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_main_office_address" id="ch_main_office_address" rows="5" cols="5" class="form-control" required ></textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_office_one_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-1 Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_office_one_address" id="ch_office_one_address" rows="5" cols="5" class="form-control" required ></textarea>
            	            </div>
                        </div>
                        
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_office_two_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Branch Office-2 Address <span class="text-danger">*</span></label>
        	                    <textarea name="ch_office_two_address" id="ch_office_two_address" rows="5" cols="5" class="form-control" required ></textarea>
            	            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Chamber Person</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_person_type" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Person<span class="text-danger">*</span></label>
        	                    <select class="form-control" id="ch_person_type" name="ch_person_type">
        	                        <option value="Head of Chamber">Head of Chamber</option>
        	                        <option value="Partner of Chamber">Partner of Chamber</option>
        	                        <option value="Associate">Associate</option>
        	                        <option value="Contact Person">Contact Person</option>
        	                        <option value="Account">Account</option>
        	                        <option value="Head Clerk">Head Clerk</option>
        	                        <option value="Clerk">Clerk</option>
        	                        <option value="Support Staff">Support Staff</option>
        	                    </select>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_person_signature" class="col-form-label font-weight-bold text-info mb-1 p-0">Signature<span class="text-danger">*</span></label>
        	                    <input type="file" name="ch_person_signature" id="ch_person_signature" class="form-control p-1" />
            	            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Chamber Letterhead</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="ch_letter_write_up" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Write-up <span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_write_up" id="ch_letter_write_up" class="form-control"></textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
            	                <label for="ch_letter_address" class="col-form-label font-weight-bold text-info mb-1 p-0">Letterhead Address<span class="text-danger">*</span></label>
        	                    <textarea cols="3" rows="3" type="text" name="ch_letter_address" id="ch_letter_address" class="form-control"></textarea>
            	            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
            	                <label for="status" class="col-form-label font-weight-bold text-info mb-1 p-0">Chamber Status<span class="text-danger">*</span></label>
        	                    <select class="form-control" id="status" name="status">
        	                        <option value="1">Active</option>
        	                        <option value="0">DeActive</option>
        	                    </select>
            	            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-info btn-lg">Submit</button>
                </div>
            </div>
        </div>
        
        
        
    </div>
 </form>

@endsection
@section('script')

@endsection