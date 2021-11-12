@extends('layouts.clear')

@section('content')

    @if(request('date')==null)
        <form method="POST">
            @csrf
            <div class="grid place-items-center">

                <select name="selectedDoctor">
                    @foreach($doctorData as $data)
                        <option name="selectedDoctor" value={{$data->id_user}}>{{$data->firstLastName}}</option>
                    @endforeach
                </select>
                <br>
                <input type="date" id="date" name="date">
                <br>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    ieškoti laiko
                </button>
            </div>
        </form>
    @else
        <form method="POST">
            @csrf
            <div class="grid place-items-center">
                <select name="selectedDoctor">
                    <option name="selectedDoctor" value={{$selectedDoctorData[0]->id_user}}>{{$selectedDoctorData[0]->firstLastName}}</option>
                    @foreach($doctorData as $data)
                        <option name="selectedDoctor" value={{$data->id_user}}>{{$data->firstLastName}}</option>
                    @endforeach
                </select>
                <br>
                <input type="date" id="date" name="date" value="{{request('date')}}">
                <br>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    ieškoti laiko
                </button>
            </div>
        </form>




        <form method="POST">
            @csrf
            <div class="grid place-items-center">
                <h1 class="py-5">Laisvi laikai:</h1>
                <div class="flex flex-col">
                    <div class="grid place-items-center">
                        <select name="selectedTime" id="selectedTime">
                            <option value="notchosen">Pasirinkitę jums tinkamą laiką</option>
                        @for ($x = 0; $x < 24; $x++)
                                @if($timeTable[$x] == 1)
                                    <option value="{{$x}}">{{$x}}:00</option>
                                @endif
                            @endfor
                        </select>
                    </div>

                    <div class="py-4">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" name="selectedAnalysis" value="YES" class="form-checkbox h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700">Ar jūms reikalingi tyrimai?</span>
                        </label>
                    </div>

                    <input class="hidden" name="selectedDoctor" type="text" value="{{$selectedDoctorData[0]->id_user}}">
                    <input class="hidden" name="patientDate" type="text" value="{{request('date')}}">


                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        registruotis
                    </button>


                </div>
            </div>
        </form>




    @endif


@endsection




