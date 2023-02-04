<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class vendorController extends Controller
{
    //
    public function vendor(Request $request){
        $email = Auth::user()->get('email');
        $name = User::select('name')->where('email','=',$email)->value('name');
        // $data = [
        //     'username'=>$name,
        //     'email'=>$email
        // ];
        return view('vendor.vendorDashboard',['data'=>$name]);
        //return view('vendor.vendorDashboard')->with($name)->with($email);
    }
}
