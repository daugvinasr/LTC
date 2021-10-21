@extends('layouts.clear')

@section('content')

    <div class="grid place-items-center">
        <form action="test" method="POST">
            @csrf
            <div class="p-2">
                <label class="grid place-items-center" for="name">Data</label>
                <p></p>
                @if($availableSlots!=null)
                    <input class="shadow-lg bg-gray-100 px-5" type="date" name="date" value="{{$selectedDate}}">
                @else
                    <input class="shadow-lg bg-gray-100 px-5" type="date" name="date" value="{{date('Y-m-d')}}">
                @endif
            </div>
            <div class="grid place-items-center p-2">
                <input class="shadow-lg bg-blue-200 rounded-full py-1 px-2 " type="submit" value="Tikrinti">
            </div>
        </form>
    </div>

    @if($availableSlots!=null)
        <div class="container mx-auto">
            <h1 class="grid place-items-center">Laisvi laikai</h1>
            <div class="flex items-center justify-center p-2">
                @foreach($availableSlots as $data)
                    <div class="px-2">
                        <h1 class="shadow-lg bg-blue-200 rounded-full py-1 px-5">{{$data}}</h1>
                    </div>
                @endforeach
            </div>
        </div>

    @endif


@endsection
