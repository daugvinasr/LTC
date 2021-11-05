@extends('layouts.table')

@section('tableNames')
    <th class="px-4 py-3 text-center">Vizito ID</th>
    <th class="px-4 py-3 text-center">Vizito data</th>
    <th class="px-4 py-3 text-center">Vizito laikas</th>
    <th class="px-4 py-3 text-center">Ar pacientas reikalauja tyrimu</th>
    <th class="px-4 py-3 text-center">Daktaras</th>
    <th class="px-4 py-3 text-center">Pacientas</th>
    <th class="px-4 py-3 text-center">Tyrimo būsena</th>
    <th class="px-4 py-3 text-center">Komentarai</th>

@endsection

@section('tableData')
    @foreach($analysisData as $data)
        <tr class="text-gray-700">
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->id_visit}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->visitDate }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->visitTime }}:00</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->analysisRequestedByPatient == '1' ? 'Taip' : 'Ne' }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->doctorIdToText->firstLastName}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->patientIdToText->firstLastName}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ ($data->analysisStatus == 'notStarted' ? 'Nepradėta' : ($data->analysisStatus == 'inLabaratory' ? 'Laboratorijoje' : 'Išsiųsta gydytojui')) }}
                <br>
                <a href="/analysis/{{$data->id_visit}}" class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    ➡️
                </a>
            </td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">
                <a href="/comments/{{$data->id_visit}}/{{$data->patientIdToText->id_user}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{$commentCount = \App\Models\comments::select('*')->where([['fk_visit','=',$data->id_visit]])->count()}}
                </a>
            </td>
        </tr>
    @endforeach
@endsection

{{--@section('inputFields')--}}
{{--    <div class="grid place-items-center">--}}
{{--        <div class="w-full max-w-xs">--}}
{{--            <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">--}}
{{--                @csrf--}}
{{--                <div class="flex flex-col justify-center items-center">--}}
{{--                    <label class=" text-center text-gray-700 text-xl font-bold mb-2">--}}
{{--                        Naujo daktaro registravimas--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        el.pašto adresas--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email">--}}
{{--                    @error('email') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        slaptažodis--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password">--}}
{{--                    @error('password') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        vardas pavardė--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstLastName" type="text">--}}
{{--                    @error('firstLastName') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        dirba nuo:--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="worksFrom" type="text">--}}
{{--                    @error('worksFrom') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        dirba iki:--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="worksTo" type="text">--}}
{{--                    @error('worksTo') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                        specialybė--}}
{{--                    </label>--}}
{{--                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="specialty" type="text">--}}
{{--                    @error('specialty') {{$message}} @enderror--}}
{{--                </div>--}}
{{--                <div class="grid place-items-center">--}}
{{--                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">--}}
{{--                        registruoti--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
