@extends('layouts.lawyer.layout')
@section('title')
<title>Create District Case</title>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3>Invoice Search</h3>
                </div>
            </div>

            <div class="card-body">

                <form action="{{route('lawyer.account.invoice.generate')}}" method="post">
                    @csrf
                    {{-- report info section --}}
                    <div class="case-info-section section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="client_id" class="col-form-label font-weight-bold text-info col-md-4">Client/Party</label>
                                    <div class="col-md-8 col-8">
                                        <select name="client_id" id="client_id" class="form-control select2" required>
                                            <option value="">Select</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Bill Category (litigation/Service)</label>
                                    <div class="col-md-8">
                                        <select name="category" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Litigation">Litigation</option>
                                            <option value="Service">Service</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Case/Service/Job</label>
                                    <div class="col-md-8">
                                        <select name="type" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="District">District</option>
                                            <option value="Special">Special</option>
                                            <option value="High Court">High Court</option>
                                            <option value="Appellate">Appellate</option>
                                            <option value="District & Special">District & Special</option>
                                            <option value="Supreame Court">Supreame Court</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">Invoice Subject</label>
                                    <div class="col-md-8">
                                        <select name="subject_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($subjects as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="subject_name" value="" placeholder="Type sub">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">From Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" name="from" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label font-weight-bold text-info col-md-4">To Date</label>
                                    <div class="col-md-8 ">
                                        <input type="date" name="to" class="form-control" required>
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8 ">
                                        <div class="d-flex" style="width:205px">
                                        <label class="container-checkbox mr-2">Tax
                                            <input type="checkbox" name="tax" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-checkbox">Vat
                                            <input type="checkbox" name="vat" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                


                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div class="billing-btn justify-content-end">
                                            <button type="submit" class="btn btn-info  mx-1" style="font-size: 14px;"><i class="fa-clipboard-check fa-fw fas"></i> Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </form>

            </div>

        </div>

    </div>


</div>




<style scoped>
    .card-header-report {
        padding-bottom: 0px !important;
        padding-left: 1rem !important;
        border-bottom: 1px solid #000;
    }

    .card-header-report h3 {
        color: #000;
    }

    .form-control {
        display: block;
        width: 100% !important;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #36b9cc !important;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #36b9cc !important;
    }

    .search {
        background: #36b9cc;
        color: #fff;
        border: none;
        width: 100px;
        height: 30px;
        border-radius: 4px;
        font-size: 13px;
        line-height: 30px;
    }

    .billing-btn {
        display: flex;
        justify-content: end;
        padding-top: 50px;
        padding-bottom: 30px;
    }

    textarea.new {
        height: auto;
        min-height: 75px;
    }


    .card-header-report {
        margin-bottom: 20px;
    }

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width: 100% !important;
    }

    @media (max-width:767px) {

        .card-header-report h3 {
            color: #000;
            font-size: 15px;
        }
    }

    textarea.new {
        height: auto;
        min-height: 75px;
    }

    .legal-btn {
        width: 85%;
        height: 40px;
        font-size: 15px;
        margin-left: 15% !important;
    }

    .container-checkbox {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: #000;
        padding-right: 15px;

    }

    .container-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }


    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border: 1px solid #ccc;
    }



    .container-checkbox input:checked~.checkmark {
        background-color: #2196F3;
    }


    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .checkmark::before {
        content: "";
        position: absolute;
        display: block;
    }


    .container-checkbox input:checked~.checkmark:after {
        display: block;
    }

    .container-checkbox .checkmark:after {
        left: 6px;
        top: 1px;
        width: 6px;
        height: 13px;
        border: solid white;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .checkmark::before {
        left: 6px;
        top: 1px;
        width: 6px;
        height: 13px;
        border: solid #ccc;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .billing-btn {
        display: flex;
        justify-content: space-between;
        padding-top: 65px;
        padding-bottom: 30px;
    }

    .card-header-report {
        margin-bottom: 20px;
    }

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width: 100% !important;
    }

    @media (max-width:767px) {
        .legal-btn {
            width: 100%;
            height: 40px;
            font-size: 13px;
            margin-left: 0% !important;
        }


        .billing-btn {
            display: block;
            justify-content: space-between;
            padding-top: 65px;
            padding-bottom: 30px;
        }
    }
</style>
@endsection