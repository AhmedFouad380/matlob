<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password])) {

            return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;

        }elseif (Auth::guard('company')->attempt(['phone' => $request->phone, 'password' => $request->password])) {

            return redirect('/')->with('messageSuccess', 'تم التسجيل  بنجاح   ');;
        }
            return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
            'id_number' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'type' => 'required',
            'how_register' => 'required',
            'birth_date' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'village_id' => 'required',

        ]);

        $data = new User();
        $data->name=$request->name;
        $data->id_number=$request->id_number;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->type='male';
        $data->how_register=$request->how_register;
        $data->password=Hash::make($request->password);
        $data->birth_date=$request->birth_date;
        $data->is_active=1;
        $data->country_id=$request->country_id;
        $data->city_id=$request->city_id;
        $data->state_id=$request->state_id;
        $data->village_id=$request->village_id;
        $data->save();


        return back()->with('messageSuccess','تم تسجيل الحساب بنجاح برجاء بتسجيل الدخول  ');
    }

    public function userProfile($id = null){
        if($id){
            $data = User::find($id);
        }else{
                $data = User::find(Auth::guard('web')->id());
        }
        return view('front.UserProfile',compact('data'));
    }
}
