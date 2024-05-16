<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    @vite('resources/css/app.css')

</head>
<body>

    <div class="min-h-full">

        {{-- navbar start --}}
            <x-navbar></x-navbar>
        {{-- navbar end --}}



        {{-- main start --}}
            <main>
                <div class="mx-auto py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        {{-- main end --}}
    </div>


    <script src="js/script.js"></script>
    
</body>
</html>