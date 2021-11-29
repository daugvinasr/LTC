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

        <div class="flex items-center justify-center p-4">

            <div class="p-2">
                <a href="/" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Pagrindinis</a>
            </div>

        @if(session('role') == 'patient')
            <div class="p-2">
                <a href="" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg border-solid">Pacientas {{session('firstLastName')}}</a>
            </div>
            <div class="p-2">
                <a href="/booking" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Užsiregistuoti į vizitą</a>
            </div>
            <div class="p-2">
                <a href="/visitsPatient" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Paciento vizitai</a>
            </div>
            <div class="p-2">
                <a href="/logout" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Atsijungti</a>
            </div>


            @elseif(session('role') == "doctor")

                <div class="p-2">
                    <a href="" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Daktaras {{session('firstLastName')}}</a>
                </div>
                <div class="p-2">
                    <a href="/visitsDoctor" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Būsimi vizitai</a>
                </div>
                <div class="p-2">
                    <a href="/logout" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Atsijungti</a>
                </div>


            @elseif(session('role') == 'admin')

                <div class="p-2">
                    <a href="" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Administratorius {{session('firstLastName')}}</a>
                </div>
                <div class="p-2">
                    <a href="/doctors" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Daktarai</a>
                </div>
                <div class="p-2">
                    <a href="/logout" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Atsijungti</a>
                </div>


            @elseif(session('role') == 'analyst')
                <div class="p-2">
                    <a href="" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Laborantas {{session('firstLastName')}}</a>
                </div>
                <div class="p-2">
                    <a href="/analysis" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Būsimi tyrimai</a>
                </div>
                <div class="p-2">
                    <a href="/logout" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Atsijungti</a>
                </div>

            @else
                <div class="p-2">
                    <a href="/login" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Prisijungti</a>
                </div>
                <div class="p-2">
                    <a href="/register" class="block px-5 py-4 text-white bg-blue-500 shadow-lg rounded-lg">Registuotis</a>
                </div>
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
