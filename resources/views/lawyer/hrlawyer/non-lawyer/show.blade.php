@extends('layouts.lawyer.layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('style')
<style>
    .tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    }

    .current {
        display: block;
    }

    /* form {background-color: #ffffff; margin: 100px auto; font-family: Raleway; padding: 40px; width: 100%; min-width: 300px; } */

    button {
        background-color: #2c9faf;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    .previous {
        background-color: #2c9faf;
    }

    /* Make circles that indicate the steps of the form: */
    .step.active {
        opacity: 1;
        background-color: #2c9faf !important;
        ;
        border-color: #2c9faf !important;
    }

    .step.finish {
        background-color: #4CAF50;
    }

    .error {
        color: #f00 !important;
        font-size: 15px !important;
        width: 100% !important;
    }
    .w-65{
        width:65% !important;
    }
    .font-weight-bold{
        font-weight:600 !important;
    }
    .text-black{
        color:#000;
    }
</style>
@endsection
@section('lawyer-content')


<!-- DataTales Example -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-0 text-black">{{ $data->personal_name }}</h2>
                        {!! $data->letter_head !!}
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a class="btn btn-info btn-sm d-block mb-2" href="#">Cases</a>
                                <a class="btn btn-primary btn-sm" href="#">Legal Services</a>
                            </div>
                            <div class="" style="text-align:end">
                                <img width="200px" height="200px" src="{{ asset('uploads/lawyer-images/'.$data->image) }}" class="img-fluid" />
                                <p class="mb-0 mt-2 text-black">+88 {{ $data->mobile_number_pro }}</p>
                                <p class="mb-0 text-black">{{ $data->email_pro }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="myForm" class="mt-4">
     <div class="row">
        <div class="col-12">
                <div class="card shadow" style="border-bottom: 1px solid black;">
                    <div class="card-header py-3">
    
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center w-100 mb-2">
                                    <button class="btn btn-secondary mx-1 step">Chamber Info</button>
                                    <button class="btn btn-secondary mx-1 step">Personal Info</button>
                                    <button class="btn btn-secondary mx-1 step">Professional Info</button>
                                    <button class="btn btn-secondary mx-1 step">Educational Info</button>
                                    <button class="btn btn-secondary mx-1 step">Documents</button>
                                    <button class="btn btn-secondary mx-1 step">Case/Service Log</button>
                                    <button class="btn btn-secondary mx-1 step">Working Log</button>
                                    <button class="btn btn-secondary mx-1 step">Payment Log</button>
                                    
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
                
                <div class="card-box">
                        {{-- Chamber Info --}}
                        <div class="tab">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="case-info-section section">
                               <h4 class="text-info">Chamber Information</h4>
                        	        
                        	    <div class="row mt-4">
                        	        <div class="col-md-6">
                        	            <div class="form-group">
                        	                <label for="chember_name_id" class="col-form-label font-weight-bold text-info mb-1 p-0">Name <span class="text-danger">*</span></label>
                    	                    <select readonly name="chember_name_id" class="form-control w-75" id="chember_name_id" >
                    	                        <option selected="" disabled="" hidden="" value="">-- Select Chambers --</option>
                    	                        @foreach($chambers as $row)
                    	                            <option value="{{ @$row->id }}" {{ $data->chember_name_id == $row->id ? 'selected':'' }}>{{ @$row->ch_name }}</option>
                                                @endforeach
                    	                    </select>
                        	            </div>
                    	            </div>
                    	            
                    	            <div class="col-md-6">
                        	            <div class="form-group">
                        	                <label for="entry_position" class="col-form-label font-weight-bold text-info mb-1 p-0">Lawyer (ABC) <span class="text-danger">*</span></label>
                    	                    <select readonly name="entry_position" class="form-control w-75" id="entry_position" >
                    	                        <option value="1" {{ $data->entry_position == 1 ? 'selected':'' }}>Internal</option>
                    	                        <option value="2" {{ $data->entry_position == 2 ? 'selected':'' }}>External</option>
                    	                    </select>
                        	            </div>
                        	        </div>
                        	        
                        	        <div class="col-md-6">
                        	            <div class="form-group">
                        	                <label for="role_id" class="col-form-label font-weight-bold text-info mb-1 p-0">Present Role at Chamber <span class="text-danger">*</span></label>
                    	                    <select readonly name="role_id" class="form-control w-75" id="role_id" >
                    	                        <option selected="" disabled="" hidden="" value="">-- Select Roles --</option>
                    	                        @foreach($roles as $row)
                    	                            <option value="{{ @$row->id }}" {{ $data->role_id == $row->id ? 'selected':'' }}>{{ @$row->name }}</option>
                                                @endforeach
                    	                    </select>
                        	            </div>
                        	        </div>
                        	        
                        	        <div class="col-md-6">
                        	            <div class="form-group">
                        	                <label for="date_of_joining" class="col-form-label font-weight-bold text-info mb-1 p-0">Joining at Present Role <span class="text-danger">*</span></label>
                    	                    <input readonly type="date" value="{{ $data->date_of_joining }}" name="date_of_joining" class="form-control w-75" id="date_of_joining" >
                        	            </div>
                        	        </div>
                        	        
                        	        
                    	        </div>
                	        </div>
                                </div>
                            </div>
                            <div class="card shadow mt-3">
                                <div class="card-body border">
                            <h4>Letter Head Designation</h4>
                            <div class="form-group">
            	                <label for="role_id" class="col-form-label font-weight-bold text-info mb-1 p-0">Type Designation<span class="text-danger">*</span></label>
        	                    <textarea readonly name="letter_head" id="letter_head" class="summernote">
        	                        {!! $data->letter_head !!}
        	                    </textarea>
            	            </div>
                            
                        </div>
                            </div>
                        </div>
                        
                        {{-- Personal Info --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                            <div class="case-info-section section">
                            <h4>Profile</h4>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <p class="mb-1 text-info">Family Info</p>
                                        <div class="border p-3">
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="personal_name" class="col-form-label font-weight-bold text-info">Name</label>
                                                <input readonly type="text" value="{{ $data->personal_name }}" name="personal_name" class="form-control w-65" id="personal_name" placeholder="enter name"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="father_name" class="col-form-label font-weight-bold text-info">Father's Name</label>
                                                <input readonly type="text" value="{{ $data->father_name }}" name="father_name" class="form-control w-65" id="father_name" placeholder="enter father's name"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="mother_name" class="col-form-label font-weight-bold text-info">Mother's Name</label>
                                                <input readonly type="text" value="{{ $data->mother_name }}" name="mother_name" class="form-control w-65" id="mother_name" placeholder="enter mohter's name"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="spouse_name" class="col-form-label font-weight-bold text-info">Spouse Name</label>
                                                <input readonly type="text" value="{{ $data->spouse_name }}" name="spouse_name" class="form-control w-65" id="spouse_name" placeholder="enter spouse name"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="present_address" class="col-form-label font-weight-bold text-info">Present Address</label>
                                                <textarea readonly name="present_address" class="form-control w-65" id="present_address" placeholder="enter present address">
                                                    {!! $data->present_address  !!}
                                                </textarea>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="parmanent_address" class="col-form-label font-weight-bold text-info">Parmanent Address</label>
                                                <textarea readonly name="parmanent_address" class="form-control w-65" id="parmanent_address" placeholder="enter parmanent address">
                                                    {!! $data->parmanent_address  !!}
                                                </textarea>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="image" class="col-form-label font-weight-bold text-info">Profile Picute</label>
                                                <input disabled type="file" name="image" class="form-control w-65" id="image" placeholder="profile picture upload" />
                                                
                                            </div>
                                            <div class="text-center">
                            	                <img src="{{ asset('uploads/lawyer-images/'.$data->image) }}" height="150px" width="150px" style="border-radius: 50%;border:1px solid"/>
                            	            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <p class="mb-1 text-info">Contact Info</p>
                                        <div class="border p-3">
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="mobile_number" class="col-form-label font-weight-bold text-info">Contact (Personal)</label>
                                                <input readonly type="number" value="{{ $data->mobile_number }}" name="mobile_number" class="form-control w-65" id="mobile_number" placeholder="01700000000"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="mobile_number_pro" class="col-form-label font-weight-bold text-info">Contact (Prof.)</label>
                                                <input readonly type="number" value="{{ $data->mobile_number_pro }}" name="mobile_number_pro" class="form-control w-65" id="mobile_number_pro" placeholder="01700000000"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="emergency_contact" class="col-form-label font-weight-bold text-info">Emmergency Con.</label>
                                                <input readonly type="number" value="{{ $data->emergency_contact }}" name="emergency_contact" class="form-control w-65" id="emergency_contact" placeholder="01700000000"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="email" class="col-form-label font-weight-bold text-info">Email (Personal)</label>
                                                <input readonly type="email" value="{{ $data->email }}" name="email" class="form-control w-65" id="email" placeholder="example@gmail.com"/>
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="email_pro" class="col-form-label font-weight-bold text-info">Email (Prof)</label>
                                                <input readonly type="email" value="{{ $data->email_pro }}" name="email_pro" class="form-control w-65" id="email_pro" placeholder="example@gmail.com"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="nid_number" class="col-form-label font-weight-bold text-info">NID</label>
                                                <input readonly type="text" value="{{ $data->nid_number }}" name="nid_number" class="form-control w-65" id="nid_number" placeholder="nid" />
                                            </div>
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="tin" class="col-form-label font-weight-bold text-info">TIN</label>
                                                <input readonly type="text" value="{{ $data->tin }}" name="tin" class="form-control w-65" id="tin" placeholder="tin" />
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bin" class="col-form-label font-weight-bold text-info">BIN</label>
                                                <input readonly type="text" value="{{ $data->bin }}" name="bin" class="form-control w-65" id="bin" placeholder="bin" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        {{-- Professional Info --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                            <div class="case-info-section section">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <h4 class="font-weight-bold mb-1 text-info">Professional Information</h4>
                                        <div class="border p-3">
                                        
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Bar Council Enrollment</label>
                                                <input type="date" readonly value="{{ $data->bar_council_enrollment_date }}" name="bar_council_enrollment_date" class="form-control mr-2" id="bar_council_enrollment_date" placeholder="date"/>
                                                <input type="text" readonly value="{{ $data->sanad_no }}" name="sanad_no" class="form-control mr-2" id="sanad_no" placeholder="Certification No."/>
                                                <input type="text" readonly value="{{ $data->bar_council_enrollment_reg_no }}" name="bar_council_enrollment_reg_no" class="form-control" id="bar_council_enrollment_reg_no" placeholder="Registration/Book No."/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Mother Bar Association</label>
                                                <input type="text" readonly value="{{ $data->mother_bar_name }}" name="mother_bar_name" class="form-control mr-2" id="mother_bar_name" placeholder="Name of Dist Bar"/>
                                                <input type="text" readonly value="{{ $data->mother_bar_membership_no }}" name="mother_bar_membership_no" class="form-control mr-2" id="mother_bar_membership_no" placeholder="Membership No."/>
                                                <input type="text" readonly value="{{ $data->mother_bar_membership_no_1 }}" name="mother_bar_membership_no_1" class="form-control" id="mother_bar_membership_no_1" placeholder="Membership No."/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Practicing Bar Association</label>
                                                <input type="text" readonly value="{{ $data->practicing_bar_name }}" name="practicing_bar_name" class="form-control mr-2" id="practicing_bar_name" placeholder="Name of Dist Bar"/>
                                                <input type="text" readonly value="{{ $data->practicing_bar_membership_no }}" name="practicing_bar_membership_no" class="form-control mr-2" id="practicing_bar_membership_no" placeholder="Membership No."/>
                                                <input type="text" readonly value="{{ $data->practicing_bar_membership_no_1 }}" name="practicing_bar_membership_no_1" class="form-control" id="practicing_bar_membership_no_1" placeholder="Membership No."/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">High Court Enrollment</label>
                                                <input type="text" readonly value="{{ $data->high_court_membership_no }}" name="high_court_membership_no" class="form-control mr-2" id="high_court_membership_no" placeholder=""/>
                                                <input type="text" readonly value="{{ $data->high_court_membership_no_1 }}" name="high_court_membership_no_1" class="form-control mr-2" id="high_court_membership_no_1" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->high_court_enrollment_date }}" name="high_court_enrollment_date" class="form-control" id="high_court_enrollment_date" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">SCBA Membership</label>
                                                <input type="text" readonly value="{{ $data->scba_membership_no }}" name="scba_membership_no" class="form-control mr-2" id="scba_membership_no" placeholder=""/>
                                                <input type="text" readonly value="{{ $data->scba_membership_no_1 }}" name="scba_membership_no_1" class="form-control mr-2" id="scba_membership_no_1" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->scba_memb_date }}" name="scba_memb_date" class="form-control" id="scba_memb_date" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Appellate Division</label>
                                                <input type="text" readonly value="{{ $data->appellate_divi_membership_no }}" name="appellate_divi_membership_no" class="form-control mr-2" id="appellate_divi_membership_no" placeholder=""/>
                                                <input type="text" readonly value="{{ $data->appellate_divi_membership_no_1 }}" name="appellate_divi_membership_no_1" class="form-control mr-2" id="appellate_divi_membership_no_1" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->appellate_divi_date }}" name="appellate_divi_date" class="form-control" id="appellate_divi_date" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Bar Council Fee (Latest)</label>
                                                <input type="date" readonly value="{{ $data->bar_council_fees_date }}" name="bar_council_fees_date" class="form-control mr-2" id="bar_council_fees_date" placeholder="for year"/>
                                                <input type="text" readonly value="{{ $data->bar_council_fees_membership_no }}" name="bar_council_fees_membership_no" class="form-control mr-2" id="bar_council_fees_membership_no" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->bar_council_fees_date_1 }}" name="bar_council_fees_date_1" class="form-control" id="bar_council_fees_date_1" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Mother Bar Mem.Fee(Latest)</label>
                                                <input type="date" readonly value="{{ $data->mother_bar_memb_fees_date }}" name="mother_bar_memb_fees_date" class="form-control mr-2" id="mother_bar_memb_fees_date" placeholder="for year"/>
                                                <input type="text" readonly value="{{ $data->mother_bar_memb_fees_membership_no }}" class="form-control mr-2" id="mother_bar_memb_fees_membership_no" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->mother_bar_memb_fees_date_1 }}" name="mother_bar_memb_fees_date_1" class="form-control" id="mother_bar_memb_fees_date_1" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">Practice Bar Mem.Fee(Latest)</label>
                                                <input type="date" readonly value="{{ $data->practice_bar_memb_fees_date }}" name="practice_bar_memb_fees_date" class="form-control mr-2" id="practice_bar_memb_fees_date" placeholder="for year"/>
                                                <input type="text" readonly value="{{ $data->practice_bar_memb_fees_membership_no }}" name="practice_bar_memb_fees_membership_no" class="form-control mr-2" id="practice_bar_memb_fees_membership_no" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->practice_bar_memb_date_1 }}" name="practice_bar_memb_date_1" class="form-control" id="practice_bar_memb_date_1" placeholder="data"/>
                                            </div>
                                            
                                            <div class="d-flex form-group justify-content-between">
                                                <label for="bar_council_enrollment" class="form-control col-form-label font-weight-bold text-info mr-2">SCBA Member.Free(Latest)</label>
                                                <input type="date" readonly value="{{ $data->scba_memb_fee_date }}" name="scba_memb_fee_date" class="form-control mr-2" id="scba_memb_fee_date" placeholder="for year"/>
                                                <input type="text" readonly value="{{ $data->scba_memb_fee_members_no }}" name="scba_memb_fee_members_no" class="form-control mr-2" id="scba_memb_fee_members_no" placeholder="Membership No."/>
                                                <input type="date" readonly value="{{ $data->scba_memb_fee_date_1 }}" name="scba_memb_fee_date_1" class="form-control" id="scba_memb_fee_date_1" placeholder="data"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                         <div class="form-group">
                                            <label for="bar_council_enrollment" class="col-form-label font-weight-bold text-info mr-2">Professional Experience-1</label>
                                           <textarea readonly name="professional_experience_1" id="professional_experience_1" class="form-control" placeholder="Type of" aria-invalid="false" rows="5">
                                               {!! $data->professional_experience_1 !!}
                                           </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group">
                                            <label for="bar_council_enrollment" class="col-form-label font-weight-bold text-info mr-2">Professional Experience-2</label>
                                           <textarea readonly name="professional_experience_2" id="professional_experience_2" class="form-control" placeholder="Type of" aria-invalid="false" rows="5">
                                               {!! $data->professional_experience_2 !!}
                                           </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        </div>
                        
                        {{-- Educational Info --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                                <div class="case-info-section section">
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <p class="font-weight-bold mb-1 text-info">Educational Information</p>
                                        
                                            <div class="border border-dark p-3">
                                                
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">S.S.C</label>
                                                    <input type="text" readonly value="{{ $data->ssc_year }}" name="ssc_year" class="form-control mr-2" id="ssc_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->ssc_result }}" name="ssc_result" class="form-control mr-2" id="ssc_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->ssc_subject }}" name="ssc_subject" class="form-control mr-2" id="ssc_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->ssc_institution }}" name="ssc_institution" class="form-control" id="ssc_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">H.S.C</label>
                                                    <input type="text" readonly value="{{ $data->hsc_year }}" name="hsc_year" class="form-control mr-2" id="hsc_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->hsc_result }}" name="hsc_result" class="form-control mr-2" id="hsc_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->hsc_subject }}" name="hsc_subject" class="form-control mr-2" id="hsc_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->hsc_institution }}" name="hsc_institution" class="form-control" id="hsc_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">L.L.B (Hons)</label>
                                                    <input type="text" readonly value="{{ $data->llb_hons_year }}" name="llb_hons_year" class="form-control mr-2" id="llb_hons_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->llb_hons_result }}" name="llb_hons_result" class="form-control mr-2" id="llb_hons_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->llb_hons_subject }}" name="llb_hons_subject" class="form-control mr-2" id="llb_hons_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->llb_hons_institution }}" name="llb_hons_institution" class="form-control" id="llb_hons_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">L.L.M</label>
                                                    <input type="text" readonly value="{{ $data->llm_year }}" name="llm_year" class="form-control mr-2" id="llm_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->llm_result }}" name="llm_result" class="form-control mr-2" id="llm_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->llm_subject }}" name="llm_subject" class="form-control mr-2" id="llm_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->llm_institution }}" name="llm_institution" class="form-control" id="llm_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">L.L.B</label>
                                                    <input type="text" readonly value="{{ $data->llb_year }}" name="llb_year" class="form-control mr-2" id="llb_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->llb_result }}" name="llb_result" class="form-control mr-2" id="llb_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->llb_subject }}" name="llb_subject" class="form-control mr-2" id="llb_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->llb_institution }}" name="llb_institution" class="form-control" id="llb_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">Graduation</label>
                                                    <input type="text" readonly value="{{ $data->gra_year }}" name="gra_year" class="form-control mr-2" id="gra_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->gra_result }}" name="gra_result" class="form-control mr-2" id="gra_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->gra_subject }}" name="gra_subject" class="form-control mr-2" id="gra_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->gra_institution }}" name="gra_institution" class="form-control" id="gra_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">Post-Graduation</label>
                                                    <input type="text" readonly value="{{ $data->post_gra_year }}" name="post_gra_year" class="form-control mr-2" id="post_gra_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->post_gra_result }}" name="post_gra_result" class="form-control mr-2" id="post_gra_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->post_gra_subject }}" name="post_gra_subject" class="form-control mr-2" id="post_gra_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->post_gra_institution }}" name="post_gra_institution" class="form-control" id="post_gra_institution" placeholder="Institution"/>
                                                </div>
                                                <div class="d-flex form-group justify-content-between">
                                                    <label for="name" class="form-control mr-2 col-form-label font-weight-bold text-info">Doctorate</label>
                                                    <input type="text" readonly value="{{ $data->doct_year }}" name="doct_year" class="form-control mr-2" id="doct_year" placeholder="Year"/>
                                                    <input type="text" readonly value="{{ $data->doct_result }}" name="doct_result" class="form-control mr-2" id="doct_result" placeholder="Result"/>
                                                    <input type="text" readonly value="{{ $data->doct_subject }}" name="doct_subject" class="form-control mr-2" id="doct_subject" placeholder="Group/Subject"/>
                                                    <input type="text" readonly value="{{ $data->doct_institution }}" name="doct_institution" class="form-control" id="doct_institution" placeholder="Institution"/>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Documents --}}
                        <div class="tab">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="mb-1 font-weight-bold text-info pb-3">Professional Documents</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex form-group justify-content-between">
                                                <select name="" class="form-control valid mr-2" id="document_recived_id" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    <option value="8">Charge Form</option>
                                                    <option value="7">Charge Sheet</option>
                                                    <option value="16">Cheque</option>
                                                    <option value="15">Cheque Dishonour</option>
                                                    <option value="5">Complaint</option>
                                                    <option value="9">Investigation Report</option>
                                                    <option value="14">Legal Notice (Served)</option>
                                                    <option value="10">Legal Notice by 1st Party</option>
                                                    <option value="11">Legal Notice by 2nd Party</option>
                                                    <option value="12">Letter by 1st Party</option>
                                                    <option value="13">Letter by 2nd Party</option>
                                                    <option value="3">Petition</option>
                                                    <option value="4">Plaint</option>
                                                    <option value="6">Written Statement</option>
                                                </select>
                                            
                                                <input type="text" name="" class="form-control mr-2" id="type" placeholder="type"/>
                                                <input type="date" name="" class="form-control mr-2" id="fname" placeholder="type"/>
                                                <select name="" class="form-control" id="documents_date_of_joining_chamber_id">
                                                    <option value="">Select</option>
                                                    <option value="CC">CC</option>
                                                    <option value="COPY">COPY</option>
                                                    <option value="ORG">ORG</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <h4 class="mb-1 font-weight-bold text-info pb-3">Educational Documents</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex form-group justify-content-between">
                                                <select name="" class="form-control valid mr-2" id="document_recived_id" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    <option value="8">Charge Form</option>
                                                    <option value="7">Charge Sheet</option>
                                                    <option value="16">Cheque</option>
                                                    <option value="15">Cheque Dishonour</option>
                                                    <option value="5">Complaint</option>
                                                    <option value="9">Investigation Report</option>
                                                    <option value="14">Legal Notice (Served)</option>
                                                    <option value="10">Legal Notice by 1st Party</option>
                                                    <option value="11">Legal Notice by 2nd Party</option>
                                                    <option value="12">Letter by 1st Party</option>
                                                    <option value="13">Letter by 2nd Party</option>
                                                    <option value="3">Petition</option>
                                                    <option value="4">Plaint</option>
                                                    <option value="6">Written Statement</option>
                                                </select>
                                                
                                                <input type="text" name="" class="form-control mr-2" id="type" placeholder="type"/>
                                                <input type="date" name="" class="form-control mr-2" id="fname" placeholder="type"/>
                                                <select name="" class="form-control" id="document_recived_type_id">
                                                    <option value="">Select</option>
                                                    <option value="CC">CC</option>
                                                    <option value="COPY">COPY</option>
                                                    <option value="ORG">ORG</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    
                        {{-- Case/Service Log --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                                <h4>Case / Service Log</h4>
                            </div>
                        </div>
                    
                        {{-- Working Log --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                                <h4>Working Log</h4>
                            </div>
                        </div>
                    
                        {{-- Payment Log --}}
                        <div class="tab card shadow">
                            <div class="card-body">
                                <h4>Payment Log</h4>
                                
                            </div>
                        </div>
                        
                        <div class="card shadow" style="border-top: 1px solid grey;">
                             <div class="card-footer">
                                 <div class="form-navigation">
                                    <div style="overflow:auto;">
                                        <div style="float:right; margin-top: 5px;">
                                            <button type="button" class="previous">Previous</button>
                                            <button type="button" class="next">Next</button>
                                            <!--<button type="button" class="submit">Submit</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
    </div>
</form>


@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           
            $.validator.addMethod('username', function(value, element, param) {
                var nameRegex = /^[a-zA-Z0-9]+$/;
                return value.match(nameRegex);
            }, 'Only a-z, A-Z, 0-9 characters are allowed');

            var val = {
                // Specify validation rules
                rules: {
                    fname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true
                    },
                    
                    username: {
                        username: true,
                        required: true,
                        minlength: 4,
                        maxlength: 16,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 16,
                    }
                },
                // Specify validation error messages
                messages: {
                    fname: "First name is required",
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid e-mail",
                    },
                    phone: {
                        required: "Phone number is requied",
                        minlength: "Please enter 10 digit mobile number",
                        maxlength: "Please enter 10 digit mobile number",
                        digits: "Only numbers are allowed in this field"
                    },
                    date: {
                        required: "Date is required",
                        minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                        maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                        digits: "Date should be a number"
                    },
                    month: {
                        required: "Month is required",
                        minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                        maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                        digits: "Only numbers are allowed in this field"
                    },
                    year: {
                        required: "Year is required",
                        minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                        maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                        digits: "Only numbers are allowed in this field"
                    },
                    username: {
                        required: "Username is required",
                        minlength: "Username should be minimum 4 characters",
                        maxlength: "Username should be maximum 16 characters",
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password should be minimum 8 characters",
                        maxlength: "Password should be maximum 16 characters",
                    }
                }
            }
            $("#myForm").multiStepForm({
                // defaultStep:0,
                beforeSubmit: function(form, submit) {
                    console.log("called before submiting the form");
                    console.log(form);
                    console.log(submit);
                },
                validations: val,
            }).navigateTo(0);
        });
    </script>
    <script>
        $(document).ready(function(){
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

        });
    </script>
@endsection