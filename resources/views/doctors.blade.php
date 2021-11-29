@extends('layouts.table')

@section('tableNames')
    <th class="px-4 py-3 text-center">el.Paštas</th>
    <th class="px-4 py-3 text-center">Vardas Pavardė</th>
    <th class="px-4 py-3 text-center">Dirba nuo</th>
    <th class="px-4 py-3 text-center">Dirba iki</th>
    <th class="px-4 py-3 text-center">Specialybė</th>
    <th class="px-4 py-3 text-center">ID</th>
@endsection

@section('tableData')
    @foreach($doctorData as $data)
        <tr class="text-gray-700">
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->email}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->firstLastName}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->worksFrom}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->worksTo}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->specialty}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->id_user}}</td>
        </tr>
    @endforeach
@endsection

@section('inputFields')
    <div class="grid place-items-center">
        <div class="w-full max-w-xs">
            <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="flex flex-col justify-center items-center">
                    <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                        Naujo daktaro registravimas
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        el.pašto adresas
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email">
                    @error('email') {{$message}} @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        slaptažodis
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password">
                    @error('password') {{$message}} @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        vardas pavardė
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstLastName" type="text">
                    @error('firstLastName') {{$message}} @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        dirba nuo:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="worksFrom" type="text">
                    @error('worksFrom') {{$message}} @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        dirba iki:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="worksTo" type="text">
                    @error('worksTo') {{$message}} @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        specialybė
                    </label>
                    <select name="specialty">
                        @foreach($doctorSpecialties as $data)
                            <option value="{{$data->specialty}}">{{$data->specialty}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid place-items-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        registruoti
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
