<html lang="en_GB">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Ligų tyrimų centras</title>
</head>

<body>
<div class="bg-blue-300 mb-8 shadow-lg ">
    <div class="container mx-auto">
        <div class="flex items-center justify-center">
            <h1 class="block px-5 py-4 text-white font-bold text-2xl">Ligų tyrimų centras</h1>
        </div>
        <div class="flex items-center justify-center">
            <a href="" class="block px-5 py-4 text-white">Pagrindinis</a>
            <a href="" class="block px-5 py-4 text-white">Prisijunkti</a>
            <a href="" class="block px-5 py-4 text-white">Registuotis vizitui</a>
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
