<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        request()->validate([
            'email' => 'required|max:254',
            'password' => 'required|max:254'
        ]);

        $data = users::select('*')->where([['email','=',request('email')]])->get();

        if(Hash::check(request('password'), $data[0]->password))
        {
            Session::put('id_user',$data[0]->id_user);
            Session::put('firstLastName',$data[0]->firstLastName);
            Session::put('role',$data[0]->role);
            return redirect('/');
        }
        else
        {
            return back()->with('loginFail', 'Įvesti neteisingi duomenys.');
        }
    }

    public function showRegister()
    {
        return view('register');
    }

    public function registerPatient()
    {
        request()->validate([
            'firstLastName' => 'required|max:254',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:254'
        ]);

        $patient = new users();
        $patient->firstLastName = request('firstLastName');
        $patient->email = request('email');
        $patient->password = Hash::make(request('password'));
        $patient->role = 'patient';
        $patient->save();

        return redirect('/login');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

}
