<html lang="en_GB">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Ligų tyrimų centras</title>
</head>

<body>
<div class="bg-blue-300 mb-8 shadow-lg">
    <div class="container mx-auto">
        <div class="flex items-center justify-center">
            <h1 class="block px-5 py-4 text-white font-bold text-2xl">Ligų tyrimų centras</h1>
        </div>

        <div class="flex items-center justify-center">

            <a href="/" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Pagrindinis</a>
            <a href="/login" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Prisijunkti</a>
            <a href="/register" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Registuotis</a>
            <a href="/visitsDoctor" class="block px-5 py-4 text-white bg-blue-600 shadow-lg rounded-lg">Būsimi vizitai</a>
            <a href="/visitsPatient" class="block px-5 py-4 text-white bg-blue-600 shadow-lg rounded-lg">Paciento vizitai</a>
            <a href="/analysis" class="block px-5 py-4 text-white bg-blue-600 shadow-lg rounded-lg">Būsimi tyrimai</a>
            <a href="/doctors" class="block px-5 py-4 text-white bg-blue-600 shadow-lg rounded-lg">Daktarai</a>


        @if(session('role') == 'patient')
                <a href="" class="block px-5 py-4 text-white bg-blue-400 shadow-lg rounded-lg">Pacientas {{session('firstLastName')}}</a>
                <a href="/logout" class="block px-5 py-4 text-white bg-blue-200 shadow-lg rounded-lg">Atsijungti</a>

            @elseif(session('role') == "doctor")
                <a href="" class="block px-5 py-4 text-white bg-blue-400 shadow-lg rounded-lg">Daktaras {{session('firstLastName')}}</a>
                <a href="/logout" class="block px-5 py-4 text-white bg-blue-200 shadow-lg rounded-lg">Atsijungti</a>

            @elseif(session('role') == 'admin')
                <a href="" class="block px-5 py-4 text-white bg-blue-400 shadow-lg rounded-lg">Administratorius {{session('firstLastName')}}</a>
                <a href="/logout" class="block px-5 py-4 text-white bg-blue-200 shadow-lg rounded-lg">Atsijungti</a>

            @elseif(session('role') == 'analyst')
                <a href="" class="block px-5 py-4 text-white bg-blue-400 shadow-lg rounded-lg">Laborantas {{session('firstLastName')}}</a>
                <a href="/logout" class="block px-5 py-4 text-white bg-blue-200 shadow-lg rounded-lg">Atsijungti</a>
            @endif

        </div>
    </div>
</div>

<section class="container mx-auto p-6 rounded-10">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg px-2 py-2">
        @yield('content')
    </div>
</section>
</body>

</html>
