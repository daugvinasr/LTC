@extends('layouts.clear')

@section('content')
{{--    <div class="grid place-items-center">--}}
{{--        <form action="register" method="POST">--}}
{{--            @csrf--}}
{{--            <div class="p-2">--}}
{{--                <h2 class="mt-6 text-center text-3l font-bold text-gray-900">--}}
{{--                    Prisiregistruokite--}}
{{--                </h2>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <input name="firstLastName" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="vardas pavardė">--}}
{{--                @error('firstLastName') {{$message}} @enderror--}}
{{--                <input name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-m-md focus:outline-none focus:ring-blue-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="el.pašto adresas">--}}
{{--                @error('email') {{$message}} @enderror--}}
{{--                <input name="password" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="slaptažodis">--}}
{{--                @error('password') {{$message}} @enderror--}}
{{--            </div>--}}



{{--            <div class="grid place-items-center p-2">--}}
{{--                <input class="shadow-lg bg-blue-400 rounded-md py-1 px-2 text-white" type="submit" value="Registruotis">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

<div class="grid place-items-center">
    <div class="w-full max-w-xs">
        <form method="POST" autocomplete="off" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    vardas pavardė
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstLastName" type="text">
                @error('firstLastName') {{$message}} @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    el.pašto adresas
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email">
                @error('email') {{$message}} @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    slaptažodis
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password">
                @error('password') {{$message}} @enderror
            </div>
            <div class="grid place-items-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    registruotis
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

