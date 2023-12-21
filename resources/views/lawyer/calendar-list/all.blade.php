@extends('layouts.lawyer.layout')
@section('title')
<title>Calander List</title>
<style>
        .fc {
            font-size: 13px;
            background: #fff;
        }

        .fc th {

            color: #fff;
        }
        .fc-event-time{
            display:none !important;
        }
        .fc-list-event-time {
             display:none !important;
        }
        #calendar{
            padding:15px;
        }
        .fc-toolbar-title{
            color:#000;
        }
        .fc-button{
            background-color:#3AAFA9 !important;
        }
        .fc .fc-button-primary:disabled{
            background-color:#2C3E50 !important;
        }
        @media(max-width:575px){
            .fc-direction-ltr .fc-toolbar > * > :not(:first-child) {
                margin-left: 1px !important;
                margin-bottom: 5px;
            }
            .fc .fc-toolbar{
                display:block !important;
            }
        }
        .badge-color1{
          background-color:#E0EDCF;
          color:#82B54B;
        }
        .badge-color2{
          background-color:#FBDECE;
          color:#E87C52;
        }
        .badge-color3{
          background-color:#FFEAC0;
          color:#FFBC38;
        }
        .badge-color4{
          background-color:#CEE9F0;
          color:#547FDE;
        }
        p{
            color:#000;
            font-size:16px;
        }
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
     <link href="{{asset('backend')}}/custom/celendar/main.css" rel="stylesheet" />
   
@endsection
@section('lawyer-content')

<!-- DataTales Example -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <div id="calendar"></div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="pt-3">
                    <a class="btn btn-primary text-white" href="#">Case</a>
                    <a class="border border-primary btn btn-white text-dark" href="#">Court</a>
                </div>
                <p class="mt-5">Case View</p>
                    <div class="badge badge-color1 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color2 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color3 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color4 d-block py-2 mb-1">Civil Case : 25</div>
                <p class="mt-3">Court View</p>
                    <div class="badge badge-color1 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color2 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color3 d-block py-2 mb-1">Civil Case : 25</div>
                    <div class="badge badge-color4 d-block py-2 mb-1">Civil Case : 25</div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
     <script src="{{asset('backend')}}/fullcalendar/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-daygrid/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-timegrid/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-interaction/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-bootstrap/main.min.js"></script>
    <script src="{{asset('backend')}}/moment/moment.min.js"></script>

     <script src="{{asset('backend')}}/custom/celendar/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var eve = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    // left: "prev,next today",
                    left: "title",
                    center: "",
                    right: "prev next today dayGridMonth timeGridWeek timeGridDay listWeek",
                },
                height: "auto",
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: eve
            });

            calendar.render();
        });
    </script>

    @endsection