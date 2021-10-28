<?php

namespace App\Http\Controllers;

use App\Models\visits;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function showVisits()
    {
        $visitsData = visits::select('*')
            ->where([
                ['fk_doctor','=',session('id_user')],
            ])
            ->get();

        return view('visits', ['visitsData' => $visitsData]);
    }
}
