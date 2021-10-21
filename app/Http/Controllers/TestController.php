<?php

namespace App\Http\Controllers;

use App\Models\visits;
use Illuminate\Http\Request;

class TestController extends Controller
{

    function getVisits()
    {
        $availableSlots =  array('8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00');

        $testData = visits::where('date','=',request('date'))->get();

        foreach($testData as $data)
        {
            unset($availableSlots[array_search($data->time, $availableSlots)]);
        }
        return view('test', ['availableSlots' => $availableSlots, 'selectedDate' => request('date')]);
    }
}
