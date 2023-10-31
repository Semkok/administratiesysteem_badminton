<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex w-full h-full flex-col items-center bg-[#2176AE]">
    <a href="{{route('members.index')}}"><-- Terug naar teamleden pagina</a>
    <h1 class="text-5xl pb-20 p-3">Voeg een nieuw teamlid toe:</h1>

    <div class=" flex flex-row w-1/2 h-full pb-8 bg-[#57b8ff] border border-black ">

    <form class="  flex flex-col w-1/2 h-full p-3" method="POST" action="{{route('members.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="nickname">Bijnaam:</label>
        <input class="border" type="name" name="nickname">

        <label for="name">Naam:</label>
        <input class="border" type="name" name="name">

        <label for="surname">Achternaam:</label>
        <input class="border" type="name" name="surname">

        <label for="phonenumber">Telefoonnummer:</label>
        <input class="border" type="name" name="phonenumber">

        <label for="email">e-mail:</label>
        <input class="border" type="name" name="email">

        <label for="photograph">Foto:</label>

        <input class="border" type="file" name="photograph">
        </label>

        <label for="birthday">Geboortedatum:</label>
        <input class="border" type="date" name="birthday">

        <label for="address">Adress:</label>
        <input class="border" type="name" name="address">

        <label for="bank">Bank:</label>
        <input class="border" type="name" name="bank">

        <label for="payment_method">Betaal methode:</label>
        <input class="border" type="name" name="payment_method">

        <label for="expiration_date">Verloopdatum:</label>
        <input class="border" type="date" name="expiration_date">


        <button class="border" type="submit">Submit</button>
    </form>
        <div class=" flex flex-col w-1/3 pb-8">
            @if($errors->any())
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong...
                </div>
                <ul  class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-text-red-700">
                    @foreach($errors->all() as $error)
                        <br>
                        {{$error}}
                    @endforeach
                </ul>

            @endif
        </div>
    </div>
</body>
</html>
