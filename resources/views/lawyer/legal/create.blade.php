@extends('layouts.lawyer.layout')
@section('title')
<title>Create District Case</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">

                    <div class="col-12">
                        <div class="d-flex justify-content-center w-100 mb-2">
                            <button id="case-info" class="btn btn-info mx-1">service Info</button>
                            <button id="case-status" class="btn btn-secondary mx-1">service Status</button>
                            <button id="event-stage" class="btn btn-secondary mx-1">Events & Stages</button>
                            <button id="party-info" class="btn btn-secondary mx-1">Party Info</button>
                            <button id="lawyer-info" class="btn btn-secondary mx-1">Lawyer Info</button>
                            <button id="case-document" class="btn btn-secondary mx-1">service Doc</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('lawyer.legalservice.store')}}" method="post">
                    @csrf

                    {{-- case info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="service_info_category_id" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Category</label>
                                    <div class="col-md-12">
                                        <select name="service_info_category_id" id="service_info_category_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_type_id" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Type</label>
                                    <div class="col-md-12">
                                        <select name="service_info_type_id" id="service_info_type_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="service_info_mater_id" class="col-form-label font-weight-bold text-info col-md-10">Service
                                        Mater</label>
                                    <div class="col-md-10">
                                        <select name="service_info_mater_id" id="service_info_mater_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>

                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_dispute" class="col-form-label font-weight-bold text-info col-md-10">Dispute</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="service_info_dispute" id="service_info_dispute" value="" placeholder="Type dispute">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_description" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Discription</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_description" id="service_info_description" value="" placeholder="Type service discription">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_recive_date_time" class="col-form-label font-weight-bold text-info col-md-12">Receive Date &
                                        Time</label>
                                    <div class="col-md-12">
                                        <input type="date" name="service_info_recive_date_time" id="service_info_recive_date_time" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_mode_recived_id" class="col-form-label font-weight-bold text-info col-md-12">Mode Of
                                        Received</label>
                                    <div class="col-md-12">
                                        <select name="service_info_mode_recived_id" id="service_info_mode_recived_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_client_name_id" class="col-form-label font-weight-bold text-info col-md-10">Client
                                        Name</label>
                                    <div class="col-md-10">
                                        <select name="service_info_client_name_id" id="service_info_client_name_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_client_coordinator" class="col-form-label font-weight-bold text-info col-md-12">Client
                                        Coordinator</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_client_coordinator" id="service_info_client_coordinator" value="" placeholder="Type cliend coordinator">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_legal_service_required_id" class="col-form-label font-weight-bold text-info col-md-10">Legal Service
                                        Required</label>
                                    <div class="col-md-10">
                                        <select name="service_info_legal_service_required_id" id="service_info_legal_service_required_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_previous_despute" class="col-form-label font-weight-bold text-info col-md-12">Previous Dispute
                                        (If any)</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_previous_despute" id="service_info_previous_despute" value="" placeholder="Type previous dispute ">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="service_info_division_id" class="col-form-label font-weight-bold text-info col-md-12">Division</label>
                                    <div class="col-md-12">
                                        <select name="service_info_division_id" id="service_info_division_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_district_id" class="col-form-label font-weight-bold text-info col-md-12">District</label>
                                    <div class="col-md-12">
                                        <select name="service_info_district_id" id="service_info_district_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_police_station_id" class="col-form-label font-weight-bold text-info col-md-12">Police
                                        Station</label>
                                    <div class="col-md-12">
                                        <select name="service_info_police_station_id" id="service_info_police_station_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_claim_amount_prayer" class="col-form-label font-weight-bold text-info col-md-12">Claim
                                        Amount/prayer</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_claim_amount_prayer" id="service_info_claim_amount_prayer" value="" placeholder="Type claim amount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_other_claim" class="col-form-label font-weight-bold text-info col-md-12">Other Claim (If
                                        any)</label>
                                    <div class="col-md-12">
                                        <select name="service_info_other_claim" id="service_info_other_claim" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_recived_form" class="col-form-label font-weight-bold text-info col-md-12">Received
                                        Form</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_recived_form" id="service_info_recived_form" value="" placeholder="Type received form">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_recived_by" class="col-form-label font-weight-bold text-info col-md-12">Received By</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_recived_by" id="service_info_recived_by" value="" placeholder="Type received by">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_opponent_name" class="col-form-label font-weight-bold text-info col-md-12">Opponent
                                        Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_opponent_name" id="service_info_opponent_name" value="" placeholder="Type opponent name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_referrer_details" class="col-form-label font-weight-bold text-info col-md-12">Referrer
                                        Details</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_referrer_details" id="service_info_referrer_details" value="" placeholder="Type referrer details">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_low_id" class="col-form-label font-weight-bold text-info col-md-10">Low</label>
                                    <div class="col-md-10">
                                        <select name="service_info_low_id" id="service_info_low_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_section_id" class="col-form-label font-weight-bold text-info col-md-10">Section</label>
                                    <div class="col-md-10">
                                        <select name="service_info_section_id" id="service_info_section_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group row">
                                    <label for="service_info_summary_facts" class="col-form-label font-weight-bold text-info col-md-12">Summary
                                        Facts</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_summary_facts" id="service_info_summary_facts" value="" placeholder="Type summary facts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_special_note" class="col-form-label font-weight-bold text-info col-md-12">Special
                                        Note</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_special_note" id="service_info_special_note" value="" placeholder="Type special note">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_info_reference_case" class="col-form-label font-weight-bold text-info col-md-12">Reference
                                        Case/Issue Info</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="service_info_reference_case" id="service_info_reference_case" value="" placeholder="Type reference case">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- case status section --}}
                    <div class="case-status-section d-none section">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group row">
                                    <label for="service_status_category_id" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Category</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="service_status_category_id" value="" placeholder="Type service category" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_progress_status_id" class="col-form-label font-weight-bold text-info col-md-12">Service Progress
                                        Status</label>
                                    <div class="col-md-12">
                                        <select name="service_status_progress_status_id" id="service_status_progress_status_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_progress_status_id" class="col-form-label font-weight-bold text-info col-md-11">Service Progress
                                        Status</label>
                                    <div class="col-md-11">
                                        <select name="service_progress_status_id" id="service_progress_status_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_recive_date_time" class="col-form-label font-weight-bold text-info col-md-12">Receive Date &
                                        Time</label>
                                    <div class="col-md-12">
                                        <input type="date" name="service_status_recive_date_time" id="service_status_recive_date_time" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_recived_mode_id" class="col-form-label font-weight-bold text-info col-md-12">Received
                                        Mode</label>
                                    <div class="col-md-12">
                                        <select name="service_status_recived_mode_id" id="service_status_recived_mode_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_recived_form_id" class="col-form-label font-weight-bold text-info col-md-12">Received
                                        Form</label>
                                    <div class="col-md-12">
                                        <select name="service_status_recived_form_id" id="service_status_recived_form_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_recived_by_id" class="col-form-label font-weight-bold text-info col-md-12">Received
                                        By</label>
                                    <div class="col-md-12">
                                        <select name="service_status_recived_by_id" id="service_status_recived_by_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_note" class="col-form-label font-weight-bold text-info col-md-12">Note</label>
                                    <div class="col-md-12">
                                        <textarea name="service_status_note" id="service_status_note" class="form-control new" placeholder="Type note" aria-invalid="false"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">

                                <h3 class="completed">Completed Service Status</h3>
                                <div class="form-group row">
                                    <label for="service_status_timeline_deadline" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Timeline/Deadline</label>
                                    <div class="col-md-12">
                                        <input type="date" name="service_status_timeline_deadline" id="service_status_timeline_deadline" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_completed" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Completed</label>
                                    <div class="col-md-12">
                                        <input type="date" name="service_status_completed" id="service_status_completed" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_delivered" class="col-form-label font-weight-bold text-info col-md-12">Service
                                        Delivered</label>
                                    <div class="col-md-12">
                                        <input type="date" name="service_status_delivered" id="service_status_delivered" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_delivery_mode_id" class="col-form-label font-weight-bold text-info col-md-12">Delivery
                                        Mode</label>
                                    <div class="col-md-12">
                                        <select name="service_status_delivery_mode_id" id="service_status_delivery_mode_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_delivery_to_id" class="col-form-label font-weight-bold text-info col-md-11">Delivery
                                        To</label>
                                    <div class="col-md-11">
                                        <select name="service_status_delivery_to_id" id="service_status_delivery_to_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_evidence_type_id" class="col-form-label font-weight-bold text-info col-md-12">Service/Evidence
                                        Type</label>
                                    <div class="col-md-12">
                                        <select name="service_status_evidence_type_id" id="service_status_evidence_type_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service_status_note" class="col-form-label font-weight-bold text-info col-md-12">Note</label>
                                    <div class="col-md-12">
                                        <textarea name="service_status_note" id="service_status_note" class="form-control new" placeholder="Type note" aria-invalid="false"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- event stage section --}}
                    <div class="event-stage-section d-none section">
                        <h3 class="completed-2nd font-weight-bold mb-4" style="color: black;">Case Events & Incidents
                        </h3>

                        <div class="row">
                            <div class="col-md-12">


                                <div class="form-group row">
                                    <label for="case_events_date" class="col-form-label font-weight-bold text-info col-md-12">Date</label>
                                    <div class="col-md-12">
                                        <input type="date" name="case_events_date" id="case_events_date" class="form-control dateandtimepicker">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_events_title" class="col-form-label font-weight-bold text-info col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" name="case_events_title" id="case_events_title" class="form-control" value="" placeholder="Type title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_events_description" class="col-form-label font-weight-bold text-info col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea name="case_events_description" id="case_events_description" class="form-control new" placeholder="Type description" aria-invalid="false"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_events_evidence" class="col-form-label font-weight-bold text-info col-md-12">Evidence</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="case_events_evidence" id="case_events_evidence" value="" placeholder="Type evidence">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h3 class=" completed font-weight-bold mb-4" style="color: black;">Service Stages (Steps)
                            </h3>

                        </div>
                        <div class="form-group row">
                            <label for="service_stages_stage" class="col-form-label font-weight-bold text-info col-md-12">Stage</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="service_stages_stage" id="service_stages_stage" value="" placeholder="Type stage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="service_stages_date" class="col-form-label font-weight-bold text-info col-md-12">Date</label>
                            <div class="col-md-12">
                                <input type="date" name="service_stages_date" id="service_stages_date" class="form-control dateandtimepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="service_stages_note" class="col-form-label font-weight-bold text-info col-md-12">Note</label>
                            <div class="col-md-12">
                                <textarea name="service_stages_note" id="service_stages_note" class="form-control new" placeholder="Type note" aria-invalid="false"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="service_status_next_stage" class="col-form-label font-weight-bold text-info col-md-12">Next
                                Stage</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="service_status_next_stage" id="service_status_next_stage" value="" placeholder="Type next stage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="service_status_evidence" class="col-form-label font-weight-bold text-info col-md-12">Evidence</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="service_status_evidence" id="service_status_evidence" value="" placeholder="Type evidence">
                            </div>
                        </div>

                    </div>

                    {{-- case document section --}}
                    <div class="case-document-section d-none section">
                        <h3 class="font-weight-bold text-info legal-h3">DOCUMENTS RECEIVED</h3>

                        <div class="row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-3">
                                        <select name="stages_documents_recived_id" id="stages_documents_recived_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input name="stages_documents_recived_type" id="stages_documents_recived_type" type="text" class="form-control" placeholder="type..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input name="stages_documents_recived_date" id="stages_documents_recived_date" type="date" class="form-control dateandtimepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="stages_documents_recived_type_id" id="stages_documents_recived_type_id" class="form-control select2">
                                                    <option selected disabled hidden>Select</option>

                                                    <option value="">District</option>
                                                    <option value="">Special</option>
                                                    <option value="">High Court</option>
                                                    <option value="">Appellate</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                            </div>
                        </div>
                        <h3 class="font-weight-bold text-info legal-h3">DOCUMENTS REQUIRED</h3>

                        <div class="row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-3">
                                        <select name="stages_documents_required_id" id="stages_documents_required_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input name="stages_documents_required_type" id="stages_documents_required_type" type="text" class="form-control" placeholder="type..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input name="stages_documents_required_date" id="stages_documents_required_date" type="date" class="form-control dateandtimepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="stages_documents_required_type_id" id="stages_documents_required_type_id" class="form-control select2">
                                                    <option selected disabled hidden>Select</option>

                                                    <option value="">District</option>
                                                    <option value="">Special</option>
                                                    <option value="">High Court</option>
                                                    <option value="">Appellate</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                            </div>
                        </div>


                        <h3 class="font-weight-bold text-info legal-h3">DOCUMENTS UPLOAD</h3>

                        <div class="row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="file" name="stages_documents_upload_file" id="stages_documents_upload_file" class="form-control file">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input name="stages_documents_upload_date" id="stages_documents_upload_date" type="date" class="form-control dateandtimepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="stages_documents_upload_id" id="stages_documents_upload_id" class="form-control select2">
                                                    <option selected disabled hidden>Select</option>

                                                    <option value="">District</option>
                                                    <option value="">Special</option>
                                                    <option value="">High Court</option>
                                                    <option value="">Appellate</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    {{-- lawer secton --}}
                    <div class="lawyer-info-section d-none section">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold mb-4 completed-2nd" style="color: black;">Client Lawer Information</h3>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group row">
                                    <label for="lawer_name_advocate_law_firm_id" class="col-form-label col-sm-11 font-weight-bold text-info">Name of Advocate/Law
                                        Firm</label>
                                    <div class="col-md-11">
                                        <select name="lawer_name_advocate_law_firm_id" id="lawer_name_advocate_law_firm_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="lawyer_name_of_assigned_lawyer_id" class="col-form-label col-sm-11 font-weight-bold text-info">Name of Assigned Lawyer</label>
                                    <div class="col-md-11">
                                        <select name="lawyer_name_of_assigned_lawyer_id" id="lawyer_name_of_assigned_lawyer_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="lawyer_name_assigned_paralegal_id" class="col-form-label col-sm-11 font-weight-bold text-info">Name of Assigned Para-Legal</label>
                                    <div class="col-md-11">
                                        <select name="lawyer_name_assigned_paralegal_id" id="lawyer_name_assigned_paralegal_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info legal-btn mx-1"><i class="fas fa-fw fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="client_lawyer_info_note" class="col-form-label col-sm-12 font-weight-bold text-info">Note</label>
                                    <div class="col-sm-12">
                                        <textarea name="client_lawyer_info_note" id="client_lawyer_info_note" cols="30" rows="5" class="form-control new" placeholder="note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h3 class=" completed font-weight-bold mb-4" style="color: black;">Service Stages (Steps)
                                </h3>

                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="stages_name_of_advocate_law_firm" class="col-form-label col-sm-12 font-weight-bold text-info">Name of Advocate/Law Firm</label>
                                    <div class="col-sm-12">
                                        <input name="stages_name_of_advocate_law_firm" id="stages_name_of_advocate_law_firm" type="text" class="form-control" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="stages_name_of_concerned_lawyer" class="col-form-label col-sm-12 font-weight-bold text-info">Name of Concerned Lawyer</label>
                                    <div class="col-sm-12">
                                        <input name="stages_name_of_concerned_lawyer" id="stages_name_of_concerned_lawyer" type="text" class="form-control" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="opponent_lawyer_contact_detail" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Lawyer
                                        Contact Detail</label>
                                    <div class="col-sm-12">
                                        <input name="opponent_lawyer_contact_detail" id="opponent_lawyer_contact_detail" type="text" class="form-control" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="opponent_paralegal_lawyer_contact_detail" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Para-Legal Lawyer
                                        Contact Detail </label>
                                    <div class="col-sm-12">
                                        <input name="opponent_paralegal_lawyer_contact_detail" id="opponent_paralegal_lawyer_contact_detail" type="text" class="form-control" placeholder="type">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="stages_steps_note" class="col-form-label col-sm-12 font-weight-bold text-info">Note</label>
                            <div class="col-sm-12">
                                <textarea name="stages_steps_note" id="stages_steps_note" cols="30" rows="5" class="form-control new" placeholder="note"></textarea>
                            </div>
                        </div>


                    </div>

                    {{-- party section --}}
                    <div class="party-info-section d-none section">
                        <h3 class="font-weight-bold mb-4 completed-2nd" style="color: black;">Client Info</h3>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_on_behalf_of_id" class="col-form-label col-sm-12 font-weight-bold text-info">Client (on behalf
                                        of)</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_on_behalf_of_id" id="client_info_on_behalf_of_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_info_on_behalf_division_id" class="col-form-label col-sm-12 font-weight-bold text-info">Division</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_on_behalf_division_id" id="client_info_on_behalf_division_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_info_on_behalf_zone_id" class="col-form-label col-sm-12 font-weight-bold text-info">Zone</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_on_behalf_zone_id" id="client_info_on_behalf_zone_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_category_id" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Category</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_category_id" id="client_info_category_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_info_category_district_id" class="col-form-label col-sm-12 font-weight-bold text-info">District</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_category_district_id" id="client_info_category_district_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_info_category_area_id" class="col-form-label col-sm-12 font-weight-bold text-info">Area</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_category_area_id" id="client_info_category_area_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_sub_category_id" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Sub-Category</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_sub_category_id" id="client_info_sub_category_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>

                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_info_police_station_id" class="col-form-label col-sm-12 font-weight-bold text-info">Police
                                        Station</label>
                                    <div class="col-sm-12">
                                        <select name="client_info_police_station_id" id="client_info_police_station_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="client_sub_category_branch_id" class="col-form-label col-sm-12 font-weight-bold text-info">Branch</label>
                                    <div class="col-sm-12">
                                        <select name="client_sub_category_branch_id" id="client_sub_category_branch_id" class="form-control select2">
                                            <option selected disabled hidden>Select</option>
                                            <option value="">District</option>
                                            <option value="">Special</option>
                                            <option value="">High Court</option>
                                            <option value="">Appellate</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_client_group" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Group</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="client_info_client_group" id="client_info_client_group" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_client_profession" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Profession</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="client_info_client_profession" id="client_info_client_profession" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_client_business_name" class="col-form-label col-sm-12 font-weight-bold text-info">Client Business
                                        Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="client_info_client_business_name" id="client_info_client_business_name" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="client_info_client_communication" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                        Communication</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="client_info_client_communication" id="client_info_client_communication" placeholder="type">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="client_info_client_name" class="col-form-label col-sm-12 font-weight-bold text-info">Client Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_client_name" id="client_info_client_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_mobile" id="client_info_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="client_info_email" id="client_info_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_address" id="client_info_address" placeholder="type">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="client_info_representative_name" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                    Representative Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_representative_name" id="client_info_representative_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_representative_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_representative_mobile" id="client_info_representative_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_representative_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="client_info_representative_email" id="client_info_representative_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_representative_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_representative_address" id="client_info_representative_address" placeholder="type">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="client_info_coordinator_name" class="col-form-label col-sm-12 font-weight-bold text-info">Client
                                    Coordinator Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_coordinator_name" id="client_info_coordinator_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_coordinator_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_coordinator_mobile" id="client_info_coordinator_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_coordinator_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="client_info_coordinator_email" id="client_info_coordinator_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="client_info_coordinator_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="client_info_coordinator_address" id="client_info_coordinator_address" placeholder="type">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="client_info_previous_legal_dispute" class="col-form-label col-sm-12 font-weight-bold text-info" style="padding-top: 25px;">Previous Legal
                                        Dispute</label>
                                    <div class="col-sm-12">
                                        <textarea name="client_info_previous_legal_dispute" id="client_info_previous_legal_dispute" cols="30" rows="5" class="form-control new" placeholder="Type previous legal dispute "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="client_info_special_note" class="col-form-label col-sm-12 font-weight-bold text-info">Special
                                        Note</label>
                                    <div class="col-sm-12">
                                        <textarea name="client_info_special_note" id="client_info_special_note" cols="30" rows="5" class="form-control new" placeholder="Type special note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h3 class="font-weight-bold mb-4 completed" style="color: black;">Opponent Info</h3>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_on_behalf_of" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent (on behalf
                                        of)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_on_behalf_of" id="opponent_info_on_behalf_of" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_on_behalf_division" class="col-form-label col-sm-12 font-weight-bold text-info">
                                        Division</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_on_behalf_division" id="opponent_info_on_behalf_division" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_on_behalf_zone" class="col-form-label col-sm-12 font-weight-bold text-info">Zone</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_on_behalf_zone" id="opponent_info_on_behalf_zone" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_category" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Category</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_category" id="opponent_info_category" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_category_district" class="col-form-label col-sm-12 font-weight-bold text-info">District</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_category_district" id="opponent_info_category_district" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_category_area" class="col-form-label col-sm-12 font-weight-bold text-info">Area</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_category_area" id="opponent_info_category_area" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_sub_category" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Sub-Category</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_sub_category" id="opponent_info_sub_category" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_sub_category_police_station" class="col-form-label col-sm-12 font-weight-bold text-info">Police
                                        Station</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_sub_category_police_station" id="opponent_info_sub_category_police_station" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label for="opponent_info_sub_category_branch" class="col-form-label col-sm-12 font-weight-bold text-info">Branch</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_sub_category_branch" id="opponent_info_sub_category_branch" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_opponent_group" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Group</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_opponent_group" id="opponent_info_opponent_group" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_profession" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Profession</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_profession" id="opponent_info_profession" placeholder="type">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="oppenent_info_business_name" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Business
                                        Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="oppenent_info_business_name" id="oppenent_info_business_name" placeholder="type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="opponent_info_communication" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                        Communication</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="opponent_info_communication" id="opponent_info_communication" placeholder="type">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="oppenent_info_oppenent_name" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="oppenent_info_oppenent_name" id="oppenent_info_oppenent_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="oppenent_info_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="oppenent_info_mobile" id="oppenent_info_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="oppenent_info_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="oppenent_info_email" id="oppenent_info_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="oppenent_info_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="oppenent_info_address" id="oppenent_info_address" placeholder="type">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="opponent_representative_name" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                    Representative Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_representative_name" id="opponent_representative_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_representative_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_representative_mobile" id="opponent_representative_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_representative_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="opponent_representative_email" id="opponent_representative_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_representative_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_representative_address" id="opponent_representative_address" placeholder="type">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 p-0">
                                <label for="opponent_coordination_name" class="col-form-label col-sm-12 font-weight-bold text-info">Opponent
                                    Coordinator Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_coordination_name" id="opponent_coordination_name" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_coordination_mobile" class="col-form-label col-sm-12 font-weight-bold text-info">Mobile</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_coordination_mobile" id="opponent_coordination_mobile" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_coordination_email" class="col-form-label col-sm-12 font-weight-bold text-info">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="opponent_coordination_email" id="opponent_coordination_email" placeholder="type">
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <label for="opponent_coordination_address" class="col-form-label col-sm-12 font-weight-bold text-info">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="opponent_coordination_address" id="opponent_coordination_address" placeholder="type">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="opponent_info_previous_legal_dispute" class="col-form-label col-sm-12 font-weight-bold text-info" style="padding-top: 25px;">Previous Legal
                                        Dispute</label>
                                    <div class="col-sm-12">
                                        <textarea name="opponent_info_previous_legal_dispute" id="opponent_info_previous_legal_dispute" cols="30" rows="5" class="form-control new" placeholder="Type previous legal dispute "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="opponent_info_special_note" class="col-form-label col-sm-12 font-weight-bold text-info">Special
                                        Note</label>
                                    <div class="col-sm-12">
                                        <textarea name="opponent_info_special_note" id="opponent_info_special_note" cols="30" rows="5" class="form-control new" placeholder="Type special note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <button class="btn btn-primary" type="submit"> Create</button>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button class="btn btn-danger" onclick="prev();">Previous</button>
                <button class="btn btn-info" id="next-button" onclick="next();" id="">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
    var step = 1;

    function next() {
        $('#next-button').text('Next');
        if (step == 1) {
            $('#case-info').removeClass('btn-info');
            $('#case-info').addClass('btn-secondary');
            $('.case-info-section').addClass('d-none');

            $('#case-status').removeClass('btn-secondary');
            $('#case-status').addClass('btn-info');
            $('.case-status-section').removeClass('d-none');
        }
        if (step == 2) {
            $('#case-status').removeClass('btn-info');
            $('#case-status').addClass('btn-secondary');
            $('.case-status-section').addClass('d-none');

            $('#event-stage').removeClass('btn-secondary');
            $('#event-stage').addClass('btn-info');
            $('.event-stage-section').removeClass('d-none');
        }
        if (step == 3) {
            $('#event-stage').removeClass('btn-info');
            $('#event-stage').addClass('btn-secondary');
            $('.event-stage-section').addClass('d-none');

            $('#party-info').removeClass('btn-secondary');
            $('#party-info').addClass('btn-info');
            $('.party-info-section').removeClass('d-none');
        }
        if (step == 4) {
            $('#party-info').removeClass('btn-info');
            $('#party-info').addClass('btn-secondary');
            $('.party-info-section').addClass('d-none');

            $('#lawyer-info').removeClass('btn-secondary');
            $('#lawyer-info').addClass('btn-info');
            $('.lawyer-info-section').removeClass('d-none');
        }
        if (step == 5) {
            $('#lawyer-info').removeClass('btn-info');
            $('#lawyer-info').addClass('btn-secondary');
            $('.lawyer-info-section').addClass('d-none');

            $('#case-document').removeClass('btn-secondary');
            $('#case-document').addClass('btn-info');
            $('.case-document-section').removeClass('d-none');
            $('#next-button').text('Save');
        }
        if (step < 5) {
            window.scrollTo(0, 0);
            step++;
        }
    }


    function prev() {
        if (step > 1) {
            window.scrollTo(0, 0);
            step--;
            $('#next-button').text('Next');
            if (step == 1) {
                $('#case-info').removeClass('btn-info');
                $('#case-info').addClass('btn-secondary');
                $('.case-info-section').addClass('d-none');

                $('#case-status').removeClass('btn-secondary');
                $('#case-status').addClass('btn-info');
                $('.case-status-section').removeClass('d-none');
            }
            if (step == 2) {
                $('#case-status').removeClass('btn-info');
                $('#case-status').addClass('btn-secondary');
                $('.case-status-section').addClass('d-none');

                $('#event-stage').removeClass('btn-secondary');
                $('#event-stage').addClass('btn-info');
                $('.event-stage-section').removeClass('d-none');
            }
            if (step == 3) {
                $('#event-stage').removeClass('btn-info');
                $('#event-stage').addClass('btn-secondary');
                $('.event-stage-section').addClass('d-none');

                $('#party-info').removeClass('btn-secondary');
                $('#party-info').addClass('btn-info');
                $('.party-info-section').removeClass('d-none');
            }
            if (step == 4) {
                $('#party-info').removeClass('btn-info');
                $('#party-info').addClass('btn-secondary');
                $('.party-info-section').addClass('d-none');

                $('#lawyer-info').removeClass('btn-secondary');
                $('#lawyer-info').addClass('btn-info');
                $('.lawyer-info-section').removeClass('d-none');
            }
            if (step == 5) {
                $('#lawyer-info').removeClass('btn-info');
                $('#lawyer-info').addClass('btn-secondary');
                $('.lawyer-info-section').addClass('d-none');

                $('#case-document').removeClass('btn-secondary');
                $('#case-document').addClass('btn-info');
                $('.case-document-section').removeClass('d-none');
                $('#next-button').text('Save');
            }
        }

    }

    // datetimepicker

    $(".dateandtimepicker").datetimepicker({
        format: 'Y-m-d H:i:s',
        formatTime: 'H:i:s',
        formatDate: 'Y-m-d',
        step: 5,
        minDate: 0,
        minTime: 0
    })

    // ajax


    function getClientSubCategories() {
        var category_id = $('#client_category_id').val();
        var subcategory = $('#client_subcategory_id');
        if (category_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.client.subcategories') }}",
                data: {
                    client_category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    subcategory.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        subcategory.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentSubCategories() {
        var category_id = $('#opponent_category_id').val();
        var subcategory = $('#opponent_subcategory_id');
        if (category_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.client.subcategories') }}",
                data: {
                    client_category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    subcategory.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        subcategory.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getClientDistricts() {
        var division_id = $('#client_division_id').val();
        var district = $('#client_district_id');
        if (division_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.districts') }}",
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    district.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        district.append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentDistricts() {
        var division_id = $('#opponent_division_id').val();
        var district = $('#opponent_district_id');
        if (division_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.districts') }}",
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    district.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        district.append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }
    }

    function getClientThanas() {
        var district_id = $('#client_district_id').val();
        var thana = $('#client_thana_id');
        if (district_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.thanas') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    thana.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        thana.append('<option value="' + value
                            .id + '">' + value.thana_name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentThanas() {
        var district_id = $('#opponent_district_id').val();
        var thana = $('#opponent_thana_id');
        if (district_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.thanas') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    thana.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        thana.append('<option value="' + value
                            .id + '">' + value.thana_name + '</option>');
                    });
                }
            });
        }
    }

    function getZones() {
        var thana_id = $('#client_thana_id').val();
        var zone = $('#client_zone_id');
        if (thana_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.zones') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    zone.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        zone.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentZones() {
        var thana_id = $('#opponent_thana_id').val();
        var zone = $('#');
        if (thana_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.zones') }}",
                data: {
                    thana_id: thana_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    zone.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        zone.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getAreas() {
        var zone_id = $('#client_zone_id').val();
        var area = $('#client_area_id');
        if (zone_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.areas') }}",
                data: {
                    zone_id: zone_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    area.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        area.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentAreas() {
        var zone_id = $('#').val();
        var area = $('#opponent_area_id');
        if (zone_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.areas') }}",
                data: {
                    zone_id: zone_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    area.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        area.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getBranches() {
        var area_id = $('#client_area_id').val();
        var branch = $('#client_branch_id');
        if (area_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.branches') }}",
                data: {
                    area_id: area_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    branch.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        branch.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getOpponentBranches() {
        var area_id = $('#opponent_area_id').val();
        var branch = $('#opponent_branch_id');
        if (area_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.branches') }}",
                data: {
                    area_id: area_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    branch.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        branch.append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    }

    function getDistricts() {
        var division_id = $('#case_infos_division_id').val();
        var district = $('#case_infos_district_id');
        if (division_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.districts') }}",
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    district.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        district.append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }
    }

    function getThanas() {
        var district_id = $('#case_infos_district_id').val();
        var thana = $('#police_station_id');
        if (district_id) {
            $.ajax({
                method: 'post',
                url: "{{ route('case.thanas') }}",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    thana.find('option').not(':first').remove();
                    $.each(result, function(key, value) {
                        thana.append('<option value="' + value
                            .id + '">' + value.thana_name + '</option>');
                    });
                }
            });
        }
    }



    // $(".btn_success_letter_notice").click(function () {
    //     var lsthmtl_letter_notice = $(".clone_letter_notice").html();
    //     $(".increment_letter_notice").after(lsthmtl_letter_notice);
    // });
    // $("body").on("click", ".btn_danger_letter_notice", function () {
    //     $(this).parents(".hdtuto_letter_notice").remove();
    // });

    // // edit

    // $(".btn_success_letter_notice_edit").click(function () {
    //     var lsthmtl_letter_notice_edit = $(".clone_letter_notice_edit").html();
    //     $(".clone_letter_notice").after(lsthmtl_letter_notice_edit);
    // });
    // $("body").on("click", ".btn_danger_letter_notice_edit", function () {
    //     $(this).parents(".hdtuto_letter_notice_edit").remove();
    // });
</script>
<style scoped>
    .legal-btn {
        width: 100%;
        height: 50px;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #36b9cc !important;
    }

    .select2-container .select2-selection--single {
        height: 50px !important;
        padding: 0 15px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 50px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
        padding-right: 30px;

    }

    .form-control {
        display: block;
        width: 100%;
        height: 50px;
        padding: 0 15px;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #36b9cc;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 50px !important;
    }

    .select2-container {
        width: 100% !important;
    }

    textarea.new {
        height: auto;
        min-height: 100px;
        padding: 20px;
    }

    .completed {

        color: #36b9cc !important;
        padding-top: 50px;
        margin-bottom: 25px;
        width: max-content;
        border-bottom: 1px solid #36b9cc;

    }

    .completed-2nd {
        color: #36b9cc !important;
        margin-bottom: 25px;
        width: max-content;
        border-bottom: 1px solid #36b9cc;
    }

    .file {
        padding-top: 10px;
    }

    .textarea {
        padding-top: 15px;
    }

    .legal-h3 {
        font-size: 22px;
        margin-top: 30px;
        margin-bottom: 20px;
    }
</style>
@endsection