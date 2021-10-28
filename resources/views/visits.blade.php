@extends('layouts.table')

@section('tableNames')
    <th class="px-4 py-3 text-center">Ar aktyvus</th>
    <th class="px-4 py-3 text-center">Registracijos data</th>
    <th class="px-4 py-3 text-center">Vizito data</th>
    <th class="px-4 py-3 text-center">Ar pacientas reikalauja tyrimu</th>
    <th class="px-4 py-3 text-center">Tyrimo būsena</th>
    <th class="px-4 py-3 text-center">Vizito ID</th>
    <th class="px-4 py-3 text-center">Pasirinktas daktaras</th>
    <th class="px-4 py-3 text-center">Pacientas</th>


@endsection

@section('tableData')
    @foreach($visitsData as $data)
        <tr class="text-gray-700">
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->isActive == '1' ? 'Taip' : 'Ne' }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->registrationDate }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->visitDate }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->analysisRequestedByPatient == '1' ? 'Taip' : 'Ne' }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ ($data->analysisStatus == 'notStarted' ? 'Nepradėta' : ($data->analysisStatus == 'inLabaratory' ? 'Laboratorijoje' : 'Išsiųsta gydytojui')) }}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->id_visit}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->doctorIdToText->firstLastName}}</td>
            <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $data->patientIdToText->firstLastName}}</td>
        </tr>
    @endforeach
@endsection




