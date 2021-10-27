@extends('layouts.clear')

@section('content')
    <div class="grid place-items-center">
        <form action="login" method="POST">
            @csrf
            <div class="p-2">
                <h2 class="mt-6 text-center text-3l font-bold text-gray-900">
                    Prisijunkite
                </h2>
            </div>

            <div>
                <input name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="el.pašto adresas">
                @error('email') {{$message}} @enderror
                <input name="password" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="slaptažodis">
                @error('password') {{$message}} @enderror
            </div>

            @if(session('loginFail'))
                <div class="space-y-1 text-sm">
                    <p class="text-red-700 leading-tight">{{session('loginFail')}}</p>
                </div>
            @endif

            <div class="grid place-items-center p-2">
                <input class="shadow-lg bg-blue-400 rounded-md py-1 px-2 text-white" type="submit" value="Prisijungti">
            </div>
        </form>
    </div>
@endsection

