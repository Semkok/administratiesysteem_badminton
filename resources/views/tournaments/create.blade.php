<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col">
    <h1>Voeg een nieuw toernooi toe:</h1>
    <a href="{{route('tournaments.index')}}">Terug naar toernooien pagina</a>


    <div class="pb-8">
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



    <form class="border" method="POST" action="{{route('tournaments.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input class="border" type="name" name="name">
        <br>
        <label for="begin_date">Start datum:</label>
        <input class="border" type="date" name="begin_date">
        <br>
        <label for="end_date">Eind datum:</label>
        <input class="border" type="date" name="end_date">
        <br>
        <button class="border" type="submit">Submit</button>
    </form>
</body>
</html>
