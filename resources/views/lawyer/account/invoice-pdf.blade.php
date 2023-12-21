@extends('layouts.lawyer.layout')
@section('title')
<title>Create District Case</title>
@endsection
@section('lawyer-content')
   <div>
    <div class="card shadow mt-4 mb-5">
      <div class="card-body p-3">
          <div class="ledger_report_inv ">
            <div class="row">
              <div class="col-4">
                <div class="leader_info_inv">
                 <h3>{{$client->name}}</h3>
                </div>
                <div class="leader_info_inv">
                  <p>{!! $client->address !!}</p>
                </div>
              </div>
                 <div class="col-4">
                <div class="ledger_logo_invoice">
                  <img src="https://dlegal.visamohol.com/uploads/custom-images/lawyer-2021-09-15-10-06-32-2203.jpg" alt="">
                </div>                    
                </div>
              <div class="col-4">
                <div class="ledger_info_invoice">
                    <div class="leader_info_inv">
                    <h3>{{auth()->user()->name}}</h3>
                </div>
                <div>
                    <span>357/C, Modhubag, Hatirjheel, 
                            <br>Dhaka-1217, Bangladesh</span>
                </div>
                <div>
                    <span>Call: 01711-112233</span>
                </div>
                <div>
                     <span>Email: abcd.adv@gmail.com</span>
                </div>
                </div>
              </div>
              <div class="col-12">
                  <div class="invoice_heading">
                      <h5>Invoice</h5>
                  </div>
              </div>
              <div class="col-12 mb-2">
                  <div class="d-flex justify-content-between align-items-center">
                      <div>
                          <span style="font-weight: 600;">Date :</span><span class="mx-2"> {{\Carbon\Carbon::now()->format('d-m-Y')}}</span><br/>
                          <span style="font-weight: 600;">Subject :</span><span class="mx-2 font-weight-bold"> {{$subject}}</span>
                      </div>
                      <div>
                          From : {{\Carbon\Carbon::parse($from)->format('d-m-Y')}}
                          <br/>
                          To : {{\Carbon\Carbon::parse($to)->format('d-m-Y')}}
                      </div>
                  </div>
                  
              </div>
            </div>
          </div>
               <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered " width="100%" cellspacing="0"
                    role="grid" style="width: 100%;font-size: 12px;">
                    <thead>
                      <tr role="row"style="background: #3AAFA9 !important; color: #fff;">
                        <th style="width:20px;min-width:20px !important">SL</th>
                        <th>Case Date</th>
                        <th>Particulars</th>
                        <th>Bill Ref.</th>
                        <th>Bill Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $bill)
                      <tr class="odd">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bill->bill_date->format('d-m-Y')}}</td>
                        <td>Case No.: <span class="font-weight-bold">{{$bill->cases->caseTitleShort->name_short.' '.$bill->cases->case_infos_case_no.'/'.$bill->cases->case_infos_case_year}}.</span><br> {{$bill->cases->client->name}}<span class="font-weight-bold"> Vs </span>{{$bill->cases->opponent_info_name}}<br>@if($bill->cpl)The case is fixed for {{$bill->cpl->fixed_for->name}}. @endif {{$bill->bill_particulars}}</td>
                        <td>{{$bill->reference ? $bill->reference->name : ''}}</td>
                        <td>{{$bill->bill_amount}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
                <div class="text-right mx-2">
                    <p>Subtotal :     {{$subtotal}}</p>
                    @if($tax != 0)
                    <p>With Tax (10%) :     {{$subtotal + $tax}}</p>
                    @endif
                     @if($vat != 0)
                    <p>Add: Vat (15%) :     {{$vat}}</p>
                    @endif
                    <p class="font-weight-bold">Total :     {{$total}}</p>
                </div>

            </div>
          </div>
          <div class="row mt-5">
              <div class="col-4">
                  <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>Prepared By</p>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                   <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>Checked By</p>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                   <div class="invoice_footer">
                      <div class="account_inv">
                          <div class="invoice_line"></div>
                          <p>Received By</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="invoice_footer_box">
          <div class="powerby">
              <h6>Powered By <span> dLegal Services</span></h6>
          </div>
      </div>
    </div>
  </div>
  


<style scoped>
.powerby h6{
    font-size:15px;
}
.powerby span{
      font-weight: 700;
}
.invoice_footer_box{
    border-top: 1px solid #3AAFA9;
    padding-top: 10px;
    display: flex;
    justify-content: center;
    padding-bottom: 5px;
}
.invoice_line{
    width: 200px;
    height: 1px;
    background: #ccc;
    margin-bottom: 5px;
}
.invoice_footer{
        display: flex;
    justify-content: center;
}
.account_inv{
    width: 200px;
    text-align: center;
    font-size: 15px;
}
.invoice_heading{
    background: #3AAFA9 !important;
    text-align: center;
    color: #fff;
    letter-spacing: 7px;
    height: 35px;
    line-height: 35px;
    align-items: baseline;
    border-radius: 5px;
    margin: 20px 0;
}
.invoice_heading h5{
    font-weight: 800;
    margin: 0;
    line-height: 35px;
}
.leader_info_inv h3{
    color: #000;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 24px;
}
.leader_info_inv p{
        margin-bottom: 0;
    font-size: 14px;
    font-weight: bold;
    color: #000;
}
.ledger_info_invoice {
    margin: 0px;
    font-size: 14px;
    font-weight: 600;
    color: #000;
}
.ledger_report_inv {
    padding:10px 0;
}
.ledger_logo_invoice{
    text-align: center;
}
.ledger_logo_invoice img{
    width: 140px;
    border-radius: 5px;
}
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
    .ledger_logo img{
     width: 80px;
    border-radius: 5px;
    }
    .ledger_info{
    margin: 10px 0;
    font-size: 15px;
}
.ledger_middle{
    text-align:center;
}
.leader_info{
    display: flex;
}
.leader_info p{
    width: 100px;
    font-size: 13px;
}
.ledger_header h4{
        font-weight: 700;
        color: #000;
}
.ledger_middle span{
        font-size: 13px;
    font-weight: 700;
}
.dataTables_length{
        font-size: 13px;
}
.custom-select{
        height: 30px;
         width: 60px !important;
        padding: 3px;

}
.dataTables_filter{
        font-size: 13px;
}
.dataTables_filter .form-control{
     width: 130px !important;
    height: 30px;
    font-size: 13px;
}
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    border-left-width: 0;
    font-size: 12px;
    padding: 5px;
    min-width: 125px;
}
table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
    padding-right: 20px;
}
</style>


@endsection

@section('script')


@endsection
