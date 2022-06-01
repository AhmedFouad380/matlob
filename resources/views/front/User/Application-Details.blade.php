@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .none{
            display:none!important;
        }
        .block{
            display: block!important;
        }
        .label-radio{
            align-items: center;
            padding: 20px;
            border: 0.5px solid #ccc;
            background: #fff;
            margin: 0 0 8px 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            height: 48px;
            min-width: 144px;
            color: #777;
            display: inline-flex;
        }
        .label-radio input{
            margin:10px
        }
        .main-1{
            background-color: none;
        }
        .main-1 section {
            padding-top: 0px!important;
        }
        .box{
            text-align: right;
        }
        .box li{
            color:#000
        }
    </style>
@endsection
@section('content')




    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row" >
            <div class="col-md-3 main-1 ">
                <h4>الوظائف </h4>
                <hr>
                <section>
                <div class="row " style="text-align: right">
                    @foreach(\App\Models\JobRequest::where('id','!=',$data->id)->where('user_id',Auth::guard('web')->id())->inRandomOrder()->limit(4)->get() as $job )
                            <div class="col-md-12">
                                <a href="{{url('Job-Details',$job->id)}}">
                                 <div class="box">
                                  <li  >{{$job->Job->title}} </li>
                                    <li ><span><i class="fa fa-briefcase"></i>{{$job->Job->Company->company_name}}</span> </li>
                                    <li ><i class="fa fa-map-marker"></i>{{$job->Job->Country->name}} - {{$data->Job->City->name}}  </li>
                                    <li ><i class="fa fa-calendar"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}
                                </div>
                                </a>
                            </div>
                    @endforeach

                </div>
                </section>
            </div>
            <div class="col-md-8 main-1 ">
                <h4>التقرير </h4>
                <hr>
                <section>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="box">
                                <li  >{{$data->Job->title}} </li>
                                <li ><span><i class="fa fa-briefcase"></i>{{$data->Job->Company->company_name}}</span> </li>
                                <li ><i class="fa fa-map-marker"></i>{{$data->Job->Country->name}} - {{$data->Job->City->name}}  </li>
                                <li ><i class="fa fa-calendar"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans()}}
                                </li>
                                <hr>
                                @if($data->type == 'accpeted')
                                <div class="row">
                                    <div class="col-md-2">
                                        <li style="color:#000000"> الاشعارات  </li>
                                        <li><span style="color:green">تم الموافقة</span> </li>
                                        <li style="color:#000000"><i class="fa fa-calendar"></i>تاريخ المقابلة</li>
                                        <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                    </div>
                                    <div class="col-md-9">
                                        <li>  <br>  </li>
                                        <li>  <br>  </li>
                                        <li style="color:#000000"> {{$data->interview_date}}  </li>
                                        <li style="color:#000000">{{$data->interview_description}}  </li>
                                    </div>
                                </div>
                                    <hr>

                                @elseif($data->type == 'rejected')
                                    <div class="row">
                                        <div class="col-md-2">
                                            <li style="color:#000000"> الاشعارات  </li>
                                            <li><span style="color:red">تم الرفض</span> </li>
                                            <li style="color:#000000"><i class="fa fa-calendar"></i>تاريخ المقابلة</li>
                                            <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                        </div>
                                        <div class="col-md-9">
                                            <li>  <br>  </li>
                                            <li>  <br>  </li>
                                            <li style="color:#000000"> {{$data->interview_date}}  </li>
                                            <li style="color:#000000">{{$data->interview_description}}  </li>
                                        </div>
                                    </div>
                                    <hr>
                                @elseif($data->type == 'absentee')
                                    <div class="row">
                                        <div class="col-md-2">
                                            <li style="color:#000000"> الاشعارات  </li>
                                            <li><span style="color:red">متغيب</span> </li>
                                            <li style="color:#000000"><i class="fa fa-calendar"></i>تاريخ المقابلة</li>
                                            <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                        </div>
                                        <div class="col-md-9">
                                            <li>  <br>  </li>
                                            <li>  <br>  </li>
                                            <li style="color:#000000"> {{$data->interview_date}}  </li>
                                            <li style="color:#000000">{{$data->interview_description}}  </li>
                                        </div>
                                    </div>
                                    <hr>

                                @endif
                                <div class="col-md-12">
                                    <form method="post" action="{{url('StoreComplaints')}}">
                                        @csrf
                                    <li class="fs-5 text-dark"> اضافة شكوى :</li>
                                        <br>
                                        <input type="hidden" value="{{$data->job_id}}" name="job_id">
                                    <textarea name="description" class="form-control" id="editor1"></textarea>
                                        <button class="btn btn-primary  pull-left"  type="submit" >حفظ</button>
                                    </form>
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </section>

@endsection
@section('js')

    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
