<?php

namespace App\Http\Controllers;

use App\Models\specialties;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showDoctors()
    {
        $doctorData = users::select('*')
            ->where([
                ['role', '=', 'doctor'],
            ])
            ->get();

        $doctorSpecialties = specialties::select('*')
            ->where([
                ['available', '=', 0],
            ])
            ->get();

        return view('doctors', ['doctorData' => $doctorData, 'doctorSpecialties' => $doctorSpecialties]);
    }

    public function registerDoctors()
    {
        request()->validate([
            'firstLastName' => 'required|max:254',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:254',
            'worksFrom' => 'required|max:254|integer',
            'worksTo' => 'required|max:254|integer',
            'specialty' => 'required|max:254'
        ]);

        $doctor = new users();
        $doctor->firstLastName = request('firstLastName');
        $doctor->email = request('email');
        $doctor->password = Hash::make(request('password'));
        $doctor->role = 'doctor';
        $doctor->worksFrom = request('worksFrom');
        $doctor->worksTo = request('worksTo');
        $doctor->specialty = request('specialty');
        $doctor->save();

        $specialtyData = specialties::where('specialty', request('specialty'));
        $specialtyData->update(['available' => 1]);

        return redirect('/doctors');

    }

}
