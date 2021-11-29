@extends('layouts.clear')

@section('content')
    <div class="grid place-items-center">
        <div class="w-full max-w-xs">
            <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        el.pašto adresas
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        slaptažodis
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password">

                </div>

                <div class="grid place-items-center p-2">
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                </div>

                <div class="grid place-items-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        prisijungti
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

