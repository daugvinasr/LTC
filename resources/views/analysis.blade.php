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
