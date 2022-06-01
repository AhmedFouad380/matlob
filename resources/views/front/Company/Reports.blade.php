@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
{{--    <link href="{{asset('admin/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />--}}

    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" >

    <style>

        th {
            padding-right: 10px;
            color: #181c32;
            background: #f3f6f9;

            font-size: 15px;
        }
        td {
            font-size: 15px;
        }
        .table > tbody {
            vertical-align: inherit;
        }
        .table > thead {
            vertical-align: bottom;
        }
        .table > :not(:first-child) {
            border-top: 2px solid currentColor;
        }

        .caption-top {
            caption-side: top;
        }

        .table-sm > :not(caption) > * > * {
            padding: 0.5rem 0.5rem;
        }

        .table-bordered > :not(caption) > * {
            border-width: 1px 0;
        }
        .table-bordered > :not(caption) > * > * {
            border-width: 0 1px;
        }

        .table-borderless > :not(caption) > * > * {
            border-bottom-width: 0;
        }
        .table-borderless > :not(:first-child) {
            border-top-width: 0;
        }

        .table-striped > tbody > tr:nth-of-type(odd) > * {
            --bs-table-accent-bg: var(--bs-table-striped-bg);
            color: var(--bs-table-striped-color);
        }

        .table-active {
            --bs-table-accent-bg: var(--bs-table-active-bg);
            color: var(--bs-table-active-color);
        }

        .table-hover > tbody > tr:hover > * {
            --bs-table-accent-bg: var(--bs-table-hover-bg);
            color: var(--bs-table-hover-color);
        }

        .table-primary {
            --bs-table-bg: #ccecfd;
            --bs-table-striped-bg: #c2e0f0;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #b8d4e4;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #bddaea;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #b8d4e4;
        }

        .table-secondary {
            --bs-table-bg: #fafafc;
            --bs-table-striped-bg: #eeeeef;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e1e1e3;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e7e7e9;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e1e1e3;
        }

        .table-success {
            --bs-table-bg: #dcf5e7;
            --bs-table-striped-bg: #d1e9db;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #c6ddd0;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #cce3d6;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #c6ddd0;
        }

        .table-info {
            --bs-table-bg: #e3d7fb;
            --bs-table-striped-bg: #d8ccee;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #ccc2e2;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #d2c7e8;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #ccc2e2;
        }

        .table-warning {
            --bs-table-bg: #fff4cc;
            --bs-table-striped-bg: #f2e8c2;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e6dcb8;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #ece2bd;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e6dcb8;
        }

        .table-danger {
            --bs-table-bg: #fcd9e2;
            --bs-table-striped-bg: #efced7;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e3c3cb;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e9c9d1;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e3c3cb;
        }

        .table-light {
            --bs-table-bg: #F5F8FA;
            --bs-table-striped-bg: #e9ecee;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #dddfe1;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e3e5e7;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #dddfe1;
        }

        .table-dark {
            --bs-table-bg: #181C32;
            --bs-table-striped-bg: #24273c;
            --bs-table-striped-color: #ffffff;
            --bs-table-active-bg: #2f3347;
            --bs-table-active-color: #ffffff;
            --bs-table-hover-bg: #292d41;
            --bs-table-hover-color: #ffffff;
            color: #ffffff;
            border-color: #2f3347;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tabs .nav-link.active {
            color:#269eda;
            border-bottom: #269eda 2px solid;
        }
        .nav-tabs .nav-link{
            color:#000000;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            @include('front.Company.sidebar')
            <div class="col-md-10">
                <!-- row -->
                <div class="col-md-12">
                    <div class="row jobs">
                        <div class="col-md-6">
                            <h5> التقارير
                            </h5>
                        </div>
                        <div class="col-md-6 leftbtn">

                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">متقدم</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">انتظار / تعليق</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Accepted" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">مقبول</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#Rejected" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">مرفوض</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact2" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">مقابلة اخرى</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact3" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">متغيب</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive">
                            <table  id="myTable"class="table align-middle table-row-dashed fs-4 gy-5">
                                <thead>
                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>
                                        </div>
                                    </th>

                                    <th class="min-w-125px">الوظيفة </th>
                                    <th class="min-w-125px">اسم المتقدم </th>
                                    <th class="min-w-125px">الحالة </th>
                                    <th class="min-w-125px">ميعاد المقابلة </th>
                                    <th class="min-w-125px">الرد النهائي   </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\JobRequest::whereIn('type',['new','pending'])->where('company_id',Auth::guard('company')->id())->OrderBy('id','desc')->get() as $JobRequest )
                                        <?php
                                        if($JobRequest->type == 'pending'){
                                            $states =  '<span class="bg-warning"  style=" padding:5px !important;border-radius: 5px;"> ' . __('lang.'.$JobRequest->type) . '</span>';
                                        }elseif($JobRequest->type == 'accepted'){
                                            $states =  '<span class=" p-3 bg-success"  style=" padding:5px !important;border-radius: 5px;" >' . __('lang.'.$JobRequest->type) . '</span>';
                                        }elseif($JobRequest->type == 'rejected'){
                                            $states =  '<span class=" p-3  bg-danger"   style=" padding:5px !important;border-radius: 5px;">' . __('lang.'.$JobRequest->type) . '</span>';

                                        }else{
                                            $states =  '<span class="bg-warning"  style=" padding:2px !important;border-radius: 5px;"> ' . __('lang.'.$JobRequest->type) . '</span>';

                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="{{$JobRequest->id}}" />
                                                </div>
                                            </td>
                                            <td>{{$JobRequest->Job->title}}</td>
                                            <td><a href="{{url('User-Profile',$JobRequest->User->id)}}" target="_blank"> {{$JobRequest->User->name}}</a></td>
                                            <td>{!! $states!!}</td>
                                            <td>@if($JobRequest->type == 'new' )
                                                  <div class="form-control">
                                                      <label> الحالة </label>
                                                      <select name="type" id="type" data-id="{{$JobRequest->id}}" class="form-control">
                                                          <option value="new">طلب جديد </option>
                                                          <option value="pending">تحديد معاد </option>
                                                          <option value="accepted">مقبول </option>
                                                          <option value="rejected">مرفوض </option>
                                                          <option value="pending">انتظار / تعليق </option>
                                                          <option value="block">خظر </option>
                                                          <option value="repeat">مكرر  </option>
                                                          <option value="trial_period">فترة تجريبة  </option>
                                                          <option value="absentee">متغيب  </option>
                                                      </select>
                                                  </div>
                                                    @endif
                                                <div id="data-{{$JobRequest->id}}">

                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table2">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>

                    </div>
                    <div class="tab-pane fade" id="Accepted" role="tabpanel" aria-labelledby="nav-contact-tab">

                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table3">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>
                    </div>
                    <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table4">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>

                    </div>
                    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table5">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>

                    </div>
                    <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table6">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#users_table .form-check-input" value="1"/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الوظيفة </th>
                                <th class="min-w-125px">اسم المتقدم </th>
                                <th class="min-w-125px">الحالة </th>
                                <th class="min-w-125px">ميعاد المقابلة </th>
                                <th class="min-w-125px">الرد النهائي   </th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
                        </table>

                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>$(document).ready( function () {
    $('#myTable').DataTable(
        {
            processing: true,
            serverSide: false,
            autoWidth: true,
            responsive: true,

            "language": {
                search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                searchPlaceholder: 'بحث سريع',
                "url": "{{ url('admin/assets/ar.json') }}"
            }
        }
    );

    } );</script>
    <script >
        $("#type").on('click change',function(){
            var id=$(this).data('id');
            var value = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{url('get-report-form')}}",
                data: {"id":id ,'value':value},
                success: function (data) {
                    $("#data-"+id).html(data)
                }
            })
        })
    </script>
    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('Reports-datatable') }}',
                    data: {
                        type:'new',
                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'job_name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'type', name: 'type', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'interview_description', name: 'interview_description', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Lang')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>


@endsection
