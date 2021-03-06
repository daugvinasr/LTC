@extends('layouts.table')

@section('tableNames')
    @if($visitsData->isEmpty())

    @else
        <th class="px-4 py-3 text-center">Vizito ID</th>
        <th class="px-4 py-3 text-center">Registracijos data</th>
        <th class="px-4 py-3 text-center">Vizito data</th>
        <th class="px-4 py-3 text-center">Laikas</th>
        <th class="px-4 py-3 text-center">Ar pacientas reikalauja tyrimu</th>
        <th class="px-4 py-3 text-center">Tyrimo būsena</th>
        <th class="px-4 py-3 text-center">Daktaras</th>
        <th class="px-4 py-3 text-center">Komentarai</th>
        <th class="px-4 py-3 text-center">Veiksmai</th>
    @endif
@endsection

@section('tableData')
    @if($visitsData->isEmpty())
        <p class="text-center text-gray-700 font-bold px-2 text-xl">Nėra vizitų</p>
    @else
        @foreach($visitsData as $data)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->id_visit}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->registrationDate }}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->visitDate}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->visitTime}}:00</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->analysisRequestedByPatient == '1' ? 'Taip' : 'Ne' }}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ ($data->analysisStatus == 'notStarted' ? 'Nepradėta' : ($data->analysisStatus == 'inLabaratory' ? 'Laboratorijoje' : 'Išsiųsta gydytojui')) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->doctorIdToText->firstLastName}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">
                    <a href="/comments/{{$data->id_visit}}/{{$data->patientIdToText->id_user}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{$commentCount = \App\Models\comments::select('*')->where([['fk_visit','=',$data->id_visit]])->count()}}
                    </a>
                </td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">
                    <a href="/deleteVisit/{{$data->id_visit}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        ❌
                    </a>
                </td>
            </tr>
        @endforeach
    @endif

@endsection




