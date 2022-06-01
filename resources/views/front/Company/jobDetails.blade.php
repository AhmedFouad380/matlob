

@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

    <!-- this is content of the job-->
    <section class="container job-width">
        <div class="row">
            <div class="col-md-12 job-border">
                <div class="row">
                    <div class="bottom-border">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-10">
                                    <h6 class="blue">{{$data->title}} </h6>
                                    <div class="flex-job">
                                        <ul class="ul-job">
                                            <li class=" gray-color">
                                                                  <span>
                                                                      <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                                  </span>
                                                الشركة
                                            </li>
                                            <li class=" gray-color">
                                                                  <span class="span-2">
                                                                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                  </span>
                                                مقر العمل
                                            </li>
                                            <li class=" gray-color">
                                                                  <span>
                                                                      <i class="fa fa-users" aria-hidden="true"></i>
                                                                  </span>
                                                العمالة المطلوبة
                                            </li>
                                        </ul>
                                        <ul class="ul-job-2">
                                            <li>
                                                {{$data->Company->company_name}}
                                            </li>
                                            <li>  {{$data->Country->name}} - {{$data->City->name}} </li>
                                            <li> {{$data->employees_count}} </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2 job-center">
                                    <div class="img-job">
                                        @if(isset($data->Company->image))
                                            <img src="{{$data->Company->image}}" style="width:100px;height: 100px; border-radius: 50%;border: 2px #CCCCCC solid;" >
                                        @else
                                            <i class="fa fa-briefcase bag-job" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <div class=" gray-color size-lighter">نشرت                                  {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans()}}
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 margin-job">
                        <div class="row">
                            <div class="col-md-3 ">
                                @if(Auth::guard('company')->check())
                                    <a href="{{url('JobApplicants',$data->id)}}" class=" btn btn-primary job-btn">شاهد المتقدمين</a>

                                @elseif(Auth::guard('web')->check() )
                                    @if(! \App\Models\JobRequest::where('job_id',$data->id)->where('user_id',Auth::guard('web')->id() )->first())
                                        <form  action="{{url('JobApplay')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{$data->id}}">
                                            <button type="submit" class="   btn-primary job-btn">تقديم على الوظيقة</button>
                                        </form>
                                    @else
                                        <button disable  class="    btn-primary job-btn" style="border:1px solid #c4c4c4!important; background-color: #c4c4c4!important;"> تم التقديم على الوظيفة</button>
                                    @endif

                                    @endif
                            </div>
                            <div class="col-md-9">
                                <ul class="ul-3">
                                    <li>
                                        <span>{{\App\Models\JobRequest::where('job_id',$data->id)->count()}}</span>
                                        متقدمين
                                    </li>
                                    <li class="gray-color">
                                        <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('is_read','readed')->count()}}</span>
                                        تم مشاهدتهم
                                    </li>
                                    <li class="green">
                                        <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','accepted')->count()}}</span>
                                        مناسبين
                                    </li>
                                    <li class="red">
                                        <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','rejected')->count()}}</span>
                                        مرفوضين
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 job-border">
                <div class="row">
                    <div class="col-md-12 move-h6">
                        <h6>متطلبات الوظيفة</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 flex-job-ul">
                                <ul>

                                    <li class="gray-color">
                                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                        نوع الوظيفة
                                    </li>
                                    <li class="gray-color">
                                        <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                        سنين الخبرة
                                    </li>
                                    <li class="gray-color">
                                                            <span>
                                                                 <i class="fa fa-male" aria-hidden="true"></i>
                                                            </span>
                                        النوع
                                    </li>
                                    <li class="gray-color">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        مواعيد العمل
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                        <li>
                                            {{$data->JobType->name}}
                                        </li>
                                        <li>
                                            {{$data->min_experience}} - {{$data->max_experience}} سنوات
                                    </li>
                                    <li>
                                            ذكر
                                    </li>
                                    <li>

                                        {{__('lang.'.$data->job_time)}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 flex-job-ul">
                                <ul>
                                    <li class="gray-color">
                                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                        السن
                                    </li>
                                    <li class="gray-color">
                                        <span><i class="fa fa-laptop" aria-hidden="true"></i></span>
                                        استعمال الحاسب
                                    </li>
                                    <li class="gray-color">
                                        <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                        المؤهل
                                    </li>

                                    <li class="gray-color">
                                        <span><i class="fa fa-windows" aria-hidden="true"></i></span>
                                        MS office
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        {{$data->min_age}} - {{$data->max_age}}
                                    </li>
                                    <li>
                                        جيد
                                    </li>
                                    <li>
                                        {{$data->JobQualification->name}}
                                    </li>
                                    <li>
                                        نعم
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 job-border">
                <div class="row">
                    <div class="col-md-12 move-h6">
                        <h6>الراتب و نوع العمل</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 flex-job-ul">
                                <ul>
                                    <li class="gray-color">
                                        <span><i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                                        الراتب الأساسي
                                    </li>
                                    @if(isset($data->extra_min_salary))
                                    <li class="gray-color">
                                        <span><i class="fa fa-money" aria-hidden="true"></i></span>
                                        الحوافز الإضافية
                                    </li>
                                        @endif
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        {{$data->min_salary}}  - {{$data->max_salary}}  جنيه مصري
                                    </li>
                                    @if(isset($data->extra_min_salary))
                                    <li>
                                        {{$data->extra_min_salary}} - {{$data->extra_max_salary}}  جنيه مصري
                                    </li>
                                        @endif
                                </ul>
                            </div>
                            <div class="col-md-7 flex-job-ul">
                                <ul>
                                    <li class="gray-color">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        نوع الوظيفة
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        {{$data->JobType->name}}
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 job-border">
                <div class="row">
                    <div class="col-md-12 move-h6">
                        <h6>مميزات الوظيفة</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 flex-job-ul">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                                        تأمينات صحية
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 flex-job-ul">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-users" aria-hidden="true"></i></span>
                                        تأمينات إجتماعية
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 job-border">
                <div class="row">
                    <div class="col-md-12 move-h6">
                        <h6>الراتب و نوع العمل</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 flex-job-ul">
                                <ul>
                                    <li class="gray-color">
                                        <span><i class="fa fa-wrench" aria-hidden="true"></i></span>
                                        مجال الوظيفة
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        تسوق و مبيعات
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 flex-job-ul">
                                <ul>
                                    <li class="gray-color">
                                        <span><i class="fa fa-cog" aria-hidden="true"></i></span>
                                        تخصص الوظيفة
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        مبيعات خارجية و توزيع
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div clss="row">
                            <div class="col-md-12 flex-job-ul">
                                <ul>
                                    <li class="gray-color padding-left1">
                                        <span><i class="fa fa-outdent" aria-hidden="true"></i></span>
                                        التفاصيل
                                    </li>
                                </ul>
                                <ul class="size-ul">
                                    <li>
                                        مسئول عن زيادة عدد العملاء و تقديم أفضل خدمة ليهم
                                        خبرة لا تقل سنة في التمويل - تقدر على العمل الميداني
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="container-fluied main-1">
                <section class="container">
                    <h3 class="h3">"وظائف مثل وظيفة"مسئول إئتمان خارجي </h3>
                    <section >
                        <div class="row">
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>

                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>
                            <div class="col-md-3  ">
                                <div class="box">
                                    <li>مصمم جرافيكس </li>
                                    <li><span><i class="fa fa-briefcase"></i>شركة أوراسكم</span> </li>
                                    <li><i class="fa fa-map-marker"></i>مصر - العاشر من رمضان - المدينة الصناعية</li>
                                    <li><i class="fa fa-calendar"></i>منذ 2 يوم</li>
                                </div>
                            </div>

                        </div>
                    </section>
                    <a href="#" target="_blank"> شاهد جميع الوظائف الجديدة على مطلوب...</a>
                </section>
            </section>
        </div>
    </section>


@endsection
