<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}" type="text/css">
    @yield('css')
    <title> مطلوب || @yield('title')</title>

</head>

<body>
<header class="background-header">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="logo" src="{{asset('website/assets/images/logo.png')}}" > </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == '') active @endif" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                    </li>

                    @if(Auth::guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'cv-maker') active @endif" aria-current="page" href="{{url('cv-maker')}}">إنشاء السيرة الذاتية</a>
                        </li>
                    @endif
                    @if(Auth::guard('company')->check())
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'SearchForEmployees') active @endif" aria-current="page" href="{{url('SearchForEmployees')}}"> بحث عن مواظفين
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'Jobs') active @endif" aria-current="page" href="{{url('Jobs')}}"> الوظائف</a>
                    </li>
                    @foreach(\App\Models\Page::where('is_active','active')->get() as $Page)
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'Page' && Request::segment(2) == $Page->id) active @endif" aria-current="page" href="{{url('Page',$Page->id)}}"> {{$Page->title}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{url('Contact-us')}}"> تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'Faq') active @endif" aria-current="page" href="{{url('Faq')}}"> الأسئلة المتكررة</a>
                    </li>


                </ul>
                <form class="d-flex padding-10" >
                    @if(Auth::guard('web')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('web')->user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('MyProfile')}}">الصفحة الشخصية</a>
                                <a class="dropdown-item" href="{{url('MyJobs')}}">الوظائف</a>
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>



                    @elseif(Auth::guard('admin')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('admin')->user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('Dashboard')}}">لوحة التحكم</a>
                                <a class="dropdown-item" href="#">الوظائف</a>
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>

                    @elseif(Auth::guard('company')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('company')->user()->first_name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('Profile')}}">الصفحة الشخصية</a>
                                <a class="dropdown-item" href="{{url('Company-jobs')}}">الوظائف</a>
                                <a class="dropdown-item" href="{{url('Reports')}}">التقارير</a>
                                <a class="dropdown-item" href="{{url('Complaints')}}">الشكاوي</a>
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>

                    @else
                        <button type="button" class="btn btn-primary btn-theme" data-toggle="modal" data-target="#login">
                            تسجيل دخول
                        </button>
                        <button type="button" class=" btn  btn-theme2" data-toggle="modal" data-target="#registerUser">
                            مستخدم جديد
                        </button>

                        <button type="button" class=" btn  btn-theme3" data-toggle="modal" data-target="#registerCompany">
                            صاحب عمل
                        </button>
                        {{-- <button type="button" class="btn  btn-theme3" data-toggle="modal" data-target="#registerOwner">--}}
                        {{--                        صاحب عمل--}}
                        {{--  </button>--}}
                    <!-- Modal -->
                    @endif
                </form>
            </div>
        </div>
    </nav>

@yield('content')


<!-- this is section 4 in main -->
    <section class="main-img" ></section>

    <footer>
        <div class="container">
            <div class="row list">
                <div class="col-md-3 footer-div">&copy;مطلوب كل الحقوق محفوظة 2021</div>
                <div class="col-md-7">
                    <div class="row" >
                        <div class="col-md-3">
                            <li>الاسئلة الشائعة</li>
                        </div>
                        <div class="col-md-3">
                            <li>سياسة الخصوصية</li>
                        </div>
                        <div class="col-md-3">
                            <li>الشروط و الاحكام</li>
                        </div>
                        <div class="col-md-3">
                            <li>اتفاقية الاستخدام</li>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <ul class="socail">
                        <li>
                            <i class="fa fa-facebook"></i>
                        </li>
                        <li>
                            <i class="fa fa-twitter"></i>
                        </li>
                        <li>
                            <i class="fa fa-youtube"></i>
                        </li>
                        <li>
                            <i class="fa fa-linked-squire"></i>

                        </li>
                        <li>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="container-fluied footer">
            <div class="container">
                يرجي العلم ان مطلوب دوت نت هو شركة توظيف وليس موقع لعرض الوظائف المتاحة. "مطلوب" للتوظيف بتوفر وظايف بدون رسوم للمتعطلين عن العمل في جميع المجالات بشكل دائم بجميع المحافظات
            </div>
        </section>

    </footer>

    <!-- model and wizard -->

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle ">
                        <div class=" text-center">
                            <img src="{{asset('website/assets/images/logo.png')}}" class="logo center" >
                        </div>

                    </h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="center"> مرحبا بعودتك !</h5>
                    <form action="{{url('loginUser')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label> رقم الهاتف </label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label> كملة المرور </label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary sign-in"> تسجيل الدخول  </button>
                        </div>
                        <a href="#" target="_blank" class="forget-password">نسيت كلمة المرور؟ </a>
                    </form>
                </div>
                <div class="modal-footer" id="new-account">
                    <span>مستخدم جديد ؟</span>
                    <a href="#" target="_blank">انشاء حساب جديد</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <div class=" text-center">
                            <img src="{{asset('website/assets/images/logo.png')}}" class="logo center" >
                        </div>

                    </h5>
                    <button type="button" class="close  btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>أنشئ حساب جديد و ابدا في التقديم للوظائف</h5>
                    <div class="form-wizard">
                        <form action="{{url('registerUser')}}" method="post" role="form">
                            @csrf
                            <fieldset class="wizard-fieldset show">
                                <div class="form-group">
                                    <label  for="fname">الاسم كامل *<br>
                                        <span  >  ( برجاء ادخال الاسم مطابق لبطاقة الرقم القومي) </span></label>
                                    <input type="text" class="form-control  wizard-required" name="name" id="fname">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="id_number">الرفم القومي  *</label>
                                    <input type="number" class="form-control wizard-required " name="id_number" id="id_number">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="email">البريد الالكتروني *</label>
                                    <input type="email" class="form-control wizard-required" id="email" name="email">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="birth_date">تاريخ الميلاد *</label>
                                    <input type="date" class="form-control wizard-required" id="birth_date" name="birth_date">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >الدولة *</label>
                                            <select class="form-control wizard-required" id="country" name="country_id">
                                                @inject('Countries','App\Models\Country')
                                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >المحافظة *</label>
                                            <select class="form-control wizard-required" id="city" name="city_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >المركز *</label>
                                            <select class="form-control wizard-required" id="state" name="state_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >القرية او الحي *</label>
                                            <select class="form-control wizard-required" id="village" name="village_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn ">الخطوة التالية</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">

                                <div class="form-group">
                                    <label  for="phone">رقم الهاتف  *</label>
                                    <input type="number" class="form-control " id="phone" name="phone">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" >النوع  *</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="male">ذكر </option>
                                                <option value="female">انثى </option>
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="how_register" >القائم على العمل  *</label>
                                            <select class="form-control" name="how_register" id="how_register">
                                                <option value="same">نفسه </option>
                                                <option value="father">الاب </option>
                                                <option value="mother"> الام </option>
                                                <option value="brother">الاخ </option>
                                                <option value="sister">الاخت </option>
                                                <option value="friend">صديق </option>
                                                <option value="near"> قريب </option>
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label  for="password">كلمة المرور  *</label>
                                    <input type="password" class="form-control " id="password" name="password">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group">
                                    <label  for="confirmPaswword">تاكيد كلمة المرور  *</label>
                                    <input type="password" class="form-control" id="confirmPaswword" name="password_confirmation">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">السابق</a>
                                    <button  type="submit" class="form-wizard-submit float-right">حفظ</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="registerCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <div class=" text-center">
                            <img src="{{asset('website/assets/images/logo.png')}}" class="logo center" >
                        </div>

                    </h5>
                    <button type="button" class="close  btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>أنشئ حساب شركات حديد  و ابدا في الحث عن موظفين </h5>
                    <div class="form-wizard">
                        <form action="{{url('registerCompany')}}" method="post" role="form">
                            @csrf
                            <fieldset class="wizard-fieldset show">
                                <div class="form-group">
                                    <label  for="fname">الاسم الاول *<br> </label>
                                    <input type="text" class="form-control  wizard-required" name="first_name" id="first_name">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="last_name">الاسم الثاني   *</label>
                                    <input type="text" class="form-control wizard-required " name="last_name" id="id_number">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="company_name">اسم الشركة   *</label>
                                    <input type="text" class="form-control wizard-required " name="company_name" id="company_name">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="email">البريد الالكتروني *</label>
                                    <input type="email" class="form-control wizard-required" id="email" name="email">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="birth_date">تاريخ الميلاد *</label>
                                    <input type="date" class="form-control wizard-required" id="birth_date" name="birth_date">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <label  for="birth_date">نوع الشركة *</label>
                                    <select name="type" class="form-control wizard-required" >
                                    <option value="private">شركة خاصة</option>
                                    <option value="employment">شركة توظيف</option>
                                    </select>
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >الدولة *</label>
                                            <select class="form-control wizard-required" id="country2" name="country_id">
                                                @inject('Countries','App\Models\Country')
                                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >المحافظة *</label>
                                            <select class="form-control wizard-required" id="city2" name="city_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >المركز *</label>
                                            <select class="form-control wizard-required" id="state2" name="state_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >القرية او الحي *</label>
                                            <select class="form-control wizard-required" id="village2" name="village_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn ">الخطوة التالية</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">

                                <div class="form-group">
                                    <label  for="phone">رقم الهاتف  *</label>
                                    <input type="number" class="form-control " id="phone" name="phone">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="type" >المجال  *</label>
                                            <select class="form-control" id="experience_category_id" name="experience_category_id">
                                                @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $data)
                                                <option value="{{$data->id}}">{{$data->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="how_register" >القائم على العمل  *</label>--}}
{{--                                            <select class="form-control" name="how_register" id="how_register">--}}
{{--                                                <option value="same">نفسه </option>--}}
{{--                                                <option value="father">الاب </option>--}}
{{--                                                <option value="mother"> الام </option>--}}
{{--                                                <option value="brother">الاخ </option>--}}
{{--                                                <option value="sister">الاخت </option>--}}
{{--                                                <option value="friend">صديق </option>--}}
{{--                                                <option value="near"> قريب </option>--}}
{{--                                            </select>--}}
{{--                                            <div class="wizard-form-error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>

                                <div class="form-group">
                                    <label  for="password">كلمة المرور  *</label>
                                    <input type="password" class="form-control " id="password" name="password">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group">
                                    <label  for="confirmPaswword">تاكيد كلمة المرور  *</label>
                                    <input type="password" class="form-control" id="confirmPaswword" name="password_confirmation">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">السابق</a>
                                    <button  type="submit" class="form-wizard-submit float-right">حفظ</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('website/assets/js/jquery.js')}}" ></script>
    <script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
    <script>
        jQuery(document).ready(function() {
            // click on next button
            jQuery('.form-wizard-next-btn').click(function() {
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                var next = jQuery(this);
                var nextWizardStep = true;
                parentFieldset.find('.wizard-required').each(function(){
                    var thisValue = jQuery(this).val();
                    if( thisValue == "") {
                        jQuery(this).siblings(".wizard-form-error").slideDown();
                        nextWizardStep = false;
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                });
                if( nextWizardStep) {
                    next.parents('.wizard-fieldset').removeClass("show","400");
                        currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
                    next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
                    jQuery(document).find('.wizard-fieldset').each(function(){
                        if(jQuery(this).hasClass('show')){
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                                if(jQuery(this).attr('data-attr') == formAtrr){
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                                }else{
                                    jQuery(this).removeClass('active');
                                }
                            });
                        }
                    });
                }
            });
            //click on previous button
            jQuery('.form-wizard-previous-btn').click(function() {
                var counter = parseInt(jQuery(".wizard-counter").text());;
                var prev =jQuery(this);
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                prev.parents('.wizard-fieldset').removeClass("show","400");
                prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
                currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
                jQuery(document).find('.wizard-fieldset').each(function(){
                    if(jQuery(this).hasClass('show')){
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                            if(jQuery(this).attr('data-attr') == formAtrr){
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                            }else{
                                jQuery(this).removeClass('active');
                            }
                        });
                    }
                });
            });
            //click on form submit button
            jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                parentFieldset.find('.wizard-required').each(function() {
                    var thisValue = jQuery(this).val();
                    if( thisValue == "" ) {
                        jQuery(this).siblings(".wizard-form-error").slideDown();
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                });
            });
            // focus on input field check empty or not
            jQuery(".form-control").on('focus', function(){
                var tmpThis = jQuery(this).val();
                if(tmpThis == '' ) {
                    jQuery(this).parent().addClass("focus-input");
                }
                else if(tmpThis !='' ){
                    jQuery(this).parent().addClass("focus-input");
                }
            }).on('blur', function(){
                var tmpThis = jQuery(this).val();
                if(tmpThis == '' ) {
                    jQuery(this).parent().removeClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideDown("3000");
                }
                else if(tmpThis !='' ){
                    jQuery(this).parent().addClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideUp("3000");
                }
            });
        });

    </script>

    <script>
        $("#state").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village').html($data);
                });
            }
        });
        $("#city").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state').html($data);
                });
            }
        });

        $("#country").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city').html($data);
                });
            }
        });
    </script>
    <script>
        $("#state2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village2').html($data);
                });
            }
        });
        $("#city2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state2').html($data);
                });
            }
        });

        $("#country2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city2').html($data);
                });
            }
        });
    </script>

    <?php
    $message = session()->get("messageSuccess");
    $messageError = session()->get("messageError");
    $pendingPayment = session()->get("PendingPayment");
    $SuccessPayment = session()->get("SuccessPayment");
    $RejectPayment = session()->get("RejectPayment");

    ?>
    @if( session()->has("RejectPayment"))
        <script>
            Swal.fire(
                'عفوا!',
                'فشل في عملية الدفع.',
                'error'
            )
        </script>

    @endif
    @if( session()->has("PendingPayment"))
        <script>
            Swal.fire(
                '!عفوا',
                'طلبك تحت الانتظار الرجاء تحويل المبلغ لاستكمال العملية.',
                'info'
            )
        </script>

    @endif
    @if( session()->has("SuccessPayment"))
        <script>
            Swal.fire(
                'تم العملية بنجاح',
                'تمت عملية الدفع بنجاح يمكنك الان تحميل السيرة الذاتية.',
                'success'
            )
        </script>

    @endif


@if( session()->has("messageSuccess"))
        <script>
            Swal.fire(
                'تم العملية بنجاح!',
                '{{$message}}.',
                'success'
            )
        </script>

    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'عفوا !',
                text:  " {{implode(' - ',$errors->all())}} "
            })
        </script>

        <div class="alert alert-danger">
            <ul>
            </ul>
        </div>
    @endif

    @if( session()->has("messageError"))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'عفوا !',
                text: '{{$messageError}}',
            })
        </script>

    @endif
    <script>
        $('.navbar-toggler').on('click',function () {
            $("#navbarSupportedContent").toggleClass("display-block");

        })
    </script>
</body>

</html>
