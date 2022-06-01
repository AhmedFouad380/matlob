@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<!-- this is content -->

             <section class="container">
                 <div class="row cv-maker">
						<div class="col-md-3 cv">
							<div>
								<h6>مراحل تصميم السيرة الذاتية </h6>
								<hr>
										<ul class="ul">
                                            <li class="blue"><span class="blue border-blue">1</span>  <a class="blue" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                                            <li ><span >2</span> <a href="{{url('cv-maker-step2')}}">الموجــز</a></li>
                                            <li ><span >3</span> <a href="{{url('cv-maker-step3')}}">التعليم</a></li>
                                            <li ><span >4</span> <a href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
                                            <li><span>5</span> <a href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                                            <li ><span >6</span> <a href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                                            <li><span>7</span> <a href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                                            <li><span>8</span><a href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                                            <li><span>9</span><a href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                                            <li><span>10</span><a href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>

										</ul>

							</div>
					    </div>

						<div class="col-md-9 cv-form">
							<h5>لنبدأ بالمعلومات الشخصية </h5>
							<p>قم بتضمين اسمك الكامل و طريقة واحدة على الأقل للوصول إليك من قبل أصحاب العمل </p>
						  <form method="post" action="cv-maker-step2" enctype="multipart/form-data">
                              @csrf
                              <div class="row">

                                  <div class="form-group col-md-6">
                                      <label> الصورة </label>
                                      <input type="file"  class="dropify form-control" data-default-file="{{Auth::guard('web')->user()->info->image}}" name="image" >
                                  </div>

                              </div>
                                  <div class="row">

										  <div class="form-group col-md-4">
											  <label> الإسم الأول </label>
											  <input type="text" required class="form-control" value="{{Auth::guard('web')->user()->info->firstname}}" name="firstname" placeholder="الإسم الأول">
										  </div>
										  <div class="form-group col-md-4">
											  <label>  الإسم الأخير</label>
											  <input type="text" required class="form-control"  value="{{Auth::guard('web')->user()->info->lastname}}" name="lastname" placeholder="الإسم الأخير">
										  </div>
                                      <div class="form-group col-md-4">
                                          <label>  المسمى الوظيفي</label>
                                          <input type="text" required class="form-control"  value="{{Auth::guard('web')->user()->info->job_title}}" name="job_title" placeholder="المسمى الوظيفي">
                                      </div>


								</div>
								<div class="row">
										  <div class="form-group col-md-4">
											  <label>  الهاتف</label>
											  <input type="tel" required class="form-control"  value="{{Auth::guard('web')->user()->info->phone}}" name="phone" placeholder="الهاتف">
										  </div>
										  <div class="form-group col-md-4">
											  <label> البريد الإلكتروني </label>
											  <input type="email" required class="form-control" value="{{Auth::guard('web')->user()->info->email}}" name="email" placeholder="البريد الالكتروني">
										  </div>
										  <div class="form-group col-md-4">
											  <label> تاريخ الميلاد </label>
											  <input type="date" required class="form-control" name="date"  value="{{Auth::guard('web')->user()->info->birth_date}}">
										  </div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>  المدينة</label>
                                        <select class="form-control" id="country3" name="country_id">
                                            @inject('Countries','App\Models\Country')
                                            @foreach($Countries->where('is_active','active')->get() as $Country)
                                                <option @if(Auth::guard('web')->user()->info->country_id == $Country->id)  selected @endif value="{{$Country->id}}">{{$Country->name}} </option>
                                            @endforeach
                                        </select>
									</div>
                                    @inject('City','App\Models\City')
                                    <div class="form-group col-md-4">
                                        <label>  المدينة</label>
                                        <select class="form-control" id="city3" name="city_id">
                                            @if(Auth::guard('web')->user()->info->city_id)
                                                <option value="{{Auth::guard('web')->user()->info->city_id}}">{{$City->find(Auth::guard('web')->user()->info->city_id)->name}}</option>
                                                @endif

                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
										<label>العنوان بالتفصيل  </label>
										<input type="text" class="form-control" name="address"  value="{{Auth::guard('web')->user()->info->address}}" placeholder="العنوان بالتفصيل">
									</div>

								</div>


						</div>







                    </div>
					 <hr>
					 <div class="row cv-btn">
						<button type="submit" class="btn btn-primary btn-theme float-left" >
							الخطوة التالية
						  </button>

					 </div>
                 </form>

             </section>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $('.dropify').dropify();

        $("#country3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city3').html($data);
                });
            }
        });

    </script>
@endsection
