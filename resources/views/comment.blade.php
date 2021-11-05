@extends('layouts.clear')

@section('content')

    @if(!$commentsData->isEmpty())
        <p class="text-center text-gray-700 font-bold px-2 text-xl">Pacientas {{$commentsData[0]->patientIdToText->firstLastName}}</p>
        @foreach($commentsData as $data)
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{$data->staffIdToText->specialty}} {{$data->staffIdToText->firstLastName}}</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <label>
                        <textarea readonly class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$data->message}}</textarea>
                    </label>
                    <div class="px-3 py-3 flex flex-row-reverse">
                        <p class="text-gray-700 px-2 text-l">{{$data->createdAt}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-700 font-bold px-2 text-xl">Šitam pacientui nėra komentarų</p>
    @endif

    @if(session('role')!="patient")
        <form method="POST" class="flex flex-wrap -mx-3 mb-6">
            @csrf
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <label>
                    <textarea name="textarea" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                </label>
                <div class="px-3 py-3 flex flex-row-reverse">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        komentuoti
                    </button>
                </div>
            </div>
        </form>
    @endif


@endsection




