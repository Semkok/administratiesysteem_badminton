<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col items-center bg-blue-200 h-full">

<a href="{{route('tournaments.index')}}">Terug naar toernooienlijst</a>
<div class="w-full h-full flex-row">
    <div class=" flex bg-blue-500 flex-col w-1/2">
        <p>Naam: {{$tournament->name}}</p>
        <p>Start datum: {{$tournament->begin_date}}</p>
        <p>Eind datum: {{$tournament->end_date}}</p>
    </div>
    <div class=" flex bg-blue-500 flex-col w-1/2 ">
        <a href="{{route('addMembers.display', $tournament->id)}}">Voeg teamleden toe:</a>
    </div>
    <div class=" flex bg-blue-500 flex-col w-1/2 ">
        <p>De volgende teamleden zijn aan gemeld voor dit toernooi:</p>
        @foreach($membersInTournament as $tournamentMember)
            {{$tournamentMember->name}} <p class="text-red-500">Verwijderen uit toernooi</p>
        @endforeach
    </div>
</div>


</body>
</html>



