<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }
    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('adminPage');
            } elseif ($user->role == 'teacher') {
                return redirect()->route('teacherPage');
            } else {
                return redirect()->route('studentPage');
            }
        }
        return redirect(route('login'))->with("error","Введено не вірні дані");
    }
    function registrationPost(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'surname' => 'required',
        ]);

        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        $data['surname'] = $request->surname;
        $data['role'] = $request->role;
        $data['student_group'] = $request->student_group;
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error","Введено не вірні дані");
        }
        return redirect(route('login'))->with("success","Реєстрація успішна, Увійдіть в систему");
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
