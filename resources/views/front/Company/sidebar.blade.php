<div class="col-md-2">
    <ul class="company-data">
       <a href="{{url('Profile')}}"><li @if(Request::segment(1) == 'Profile') class="blue gray first-li" @endif >حساب الشركة</li></a>
        <a href="{{url('Company-jobs')}}"> <li @if(Request::segment(1) == 'Company-jobs') class="blue gray " @endif >الوظائف</li></a>
        <a href="{{url('Reports')}}">  <li  @if(Request::segment(1) == 'Reports') class="blue gray " @endif >التقارير</li></a>
        <li>الحسابات</li>
        <a href="{{url('Complaints')}}">  <li  @if(Request::segment(1) == 'Complaints') class="blue gray " @endif  >الشكاوي</li></a>
    </ul>
</div>
