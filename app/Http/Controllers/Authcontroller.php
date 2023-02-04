<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Auth;


class Authcontroller extends Controller
{

    public function loadlogin(){
        return view('login');
    }

    public function loadRegister(){
        return view('Register');
    }

    //this is a workshop practice

    public function workshop(){
        return view('workshop');
    }

    public function workshop2(){
        return view('workshop2');
    }

    public function userRegister(Request $request){
        
        $request->validate([
            'name'=>'string|required|min:2',
            'email'=>'string|email|required|max:100|unique:users',   
            'password'=>'string|required|confirmed|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','You have been registered successfully');
    }

    public function userLogin(Request $request){

        $request->validate([
            'email'=>'string|required|email',
            'password'=>'string|required'
        ]);

        $userCredential = $request -> only('email','password');

        if(Auth::attempt($userCredential)){

                if(Auth::user()->is_admin == 1){
                    $email = $request->only('email');
                    $name = User::select('name')->where('email','=',$email)->value('name');
                    return view('admin.adminDashboard',['name'=>$name]);
                }
                else{
                $email = $request->only('email');
                $name = User::select('name')->where('email','=',$email)->value('name');
                return view('user.userDashboard',['name'=>$name]);
                }
        }
        else{
                return back()->with('error','user email or password is incorrect');
        }
    }

    public function logout(Request $request){
        
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function homepage(){
        return view('homepage');
    }

    public function header(){
        return view('header_footer');
    }
}
