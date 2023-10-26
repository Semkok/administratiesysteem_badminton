<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body style="background-image: url('images/badmintonfront.jpg');  " class="bg-contain w-screen h-screen bg-cover">


    <div class="flex items-center justify-start w-full h-full flex-col space-y-20">
        <div id="actionbox" class="flex w-2/4 h-1/4 items-center justify-center text-5xl text-white">
            <h1>
                Administratiesysteem badminton
            </h1>
        </div>
            <div id="actionbox" class="flex w-1/3 h-1/3 justify-center items-center">
            @if (Route::has('login'))

                    <div class="flex w-1/2">
                        <a class="bg-white" href="{{ route('login') }}">Inloggen</a>
                    </div>
                    <div class="flex w-1/2 justify-end">
                        @if (Route::has('register'))
                            <a class="bg-white" href="{{ route('register') }}">Registreren</a>
                        @endif
                    </div>

            @endif
            </div>
    </div>
    </body>
</html>
