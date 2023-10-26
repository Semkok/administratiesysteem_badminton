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
<a href="{{route('members.index')}}"><-- Terug naar toernooien pagina</a>
<h1 class="text-5xl pb-20 p-3">Voeg een nieuw toernooi toe:</h1>

<div class=" flex flex-row w-1/2 h-full pb-8 bg-[#57b8ff] border border-black ">

    <form class="  flex flex-col w-1/2 h-full p-3" method="POST" action="{{route('tournaments.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="nickname">Naam:</label>
        <input class="border" type="name" name="name">

        <label for="begin_date">Start datum:</label>
        <input class="border" type="date" name="begin_date">

        <label for="end_date">Eind datum:</label>
        <input class="border" type="date" name="end_date">


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
