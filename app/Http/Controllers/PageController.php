<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    #fn to render the homepage
    public function homePage(){
        return view('homePage');
    }

    #fn to render loginpage
    public function loginPage(){
        return view('Auth.login');
    }

    #fn to process the login request
    public function logIn(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $cred=$request->only('email','password');
        if(Auth::attempt($cred)){
            return redirect(route('homepage'));
        }
        toastr()->error('hello');
        return redirect(route('loginpage'))->with('errors',"Invalid Credentials");
    }

    #fn to render registerpage
    public function registerPage(){
        return view('Auth.register');
    }

    #fn to process the register request
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'role'=>'required',
            'password'=>'required'
        ]);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['role']=$request->role;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        if(!$user){
            return redirect(route('registerpage'))->with('errors',"Registration Failed, try again");
        }
        return redirect(route('loginpage'));
    }

    public function logout(){
        Session()->flush();
        Auth::logout();
        return redirect(route('homepage'));
    }
}
