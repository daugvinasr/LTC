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
    @endif


@endsection




