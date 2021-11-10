<?php

namespace App\Http\Controllers;

use App\Models\visits;
use App\Models\users;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function showVisitsForDoctor()
    {
        $visitsData = visits::select('*')
            ->where([
                ['fk_doctor', '=', session('id_user')],
            ])
            ->get();

        return view('visitsDoctor', ['visitsData' => $visitsData]);
    }

    public function showVisitsForAnalyst()
    {
        $analysisData = visits::select('*')
            ->where([
                ['analysisRequestedByPatient', '=', 1],
                ['analysisStatus', '=', 'notStarted'],
            ])
            ->orWhere([
                ['analysisRequestedByPatient', '=', 1],
                ['analysisStatus', '=', 'inLabaratory'],
            ])
            ->get();

        return view('analysis', ['analysisData' => $analysisData]);
    }

    public function analysisForward($id_visit)
    {
        $visitData = visits::where('id_visit', $id_visit);
        $temp = $visitData->get();

        if ($temp[0]->analysisStatus == 'notStarted')
        {
            $visitData->update(['analysisStatus' => 'inLabaratory']);
        }
        elseif ($temp[0]->analysisStatus == 'inLabaratory')
        {
            $visitData->update(['analysisStatus' => 'sentToDoctor']);
        }

        return redirect('/analysis');
    }

    public function showVisitsForPatient()
    {
        $visitsData = visits::select('*')
            ->where([
                ['fk_patient', '=', session('id_user')],
            ])
            ->get();

        return view('visitsPatient', ['visitsData' => $visitsData]);
    }

    public function bookings()
    {
        if (request('date')==null)
        {
            $doctorData = users::select('*')
                ->where([
                    ['role', '=', 'doctor'],
                ])
                ->get();

            return view('booking',['doctorData' => $doctorData]);
        }
        else
        {
            $doctorData = users::select('*')
                ->where([
                    ['role', '=', 'doctor'],
                    ['id_user', '!=', request('selectedDoctor')],
                ])
                ->get();

            $selectedDoctorData = users::select('*')
                ->where([
                    ['role', '=', 'doctor'],
                    ['id_user', '=', request('selectedDoctor')],
                ])
                ->get();

            $timeTable = [
                '0' => 0, '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0, '18' => 0, '19' => 0, '20' => 0, '21' => 0, '22' => 0, '23' => 0, '24' => 0
            ];

            for ($x = $selectedDoctorData[0]->worksFrom; $x <= $selectedDoctorData[0]->worksTo; $x++) {
                $timeTable[$x]=1;
            }

            $visitsCurrentDay = visits::select('*')
                ->where([
                    ['visitDate', '=', request('date')],
                    ['fk_doctor', '=', request('selectedDoctor')],
                ])
                ->get();

            foreach ($visitsCurrentDay as $data)
            {
                $timeTable[$data->visitTime]=2;
            }

            return view('booking',['doctorData' => $doctorData,'selectedDoctorData' => $selectedDoctorData,'timeTable' => $timeTable]);
        }

    }

}
