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

        <div class="grid place-items-center">
            <h1 class="py-5">Laisvi laikai:</h1>
            <div class="flex flex-row">
                @for ($x = 0; $x < 24; $x++)
                    @if($timeTable[$x] == 1)
                        <div class="px-2 py-2">
                            <a href="/" class="block w-16 h-8 py-1 text-white bg-blue-500 shadow-lg rounded-lg text-center">{{$x}}:00</a>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

    @endif


@endsection




