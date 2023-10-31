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
<a href="{{route('tournaments.index')}}">Terug naar toernooienlijst</a>
<body class="flex flex-col items-center justify-center w-full h-full bg-blue-200 h-full bg-[#2176AE]">
<div class="flex flex-col justify-center items-center bg-[#fbb13c] border border-black p-5">
        <p>Naam: {{$tournament->name}}</p>
        <p>Start-datum: {{$tournament->begin_date}}</p>
        <p>Eind-datum: {{$tournament->end_date}}</p>
        <a class="font-bold" href="{{route('addMembers.display', $tournament->id)}}">Voeg teamleden toe aan dit toernooi.</a>

        <p>De volgende teamleden zijn aan gemeld voor dit toernooi:</p>
        @foreach($membersInTournament as $tournamentMember)
            {{$tournamentMember->name}}
            <form action="{{route('deleteMemberTournament', $tournamentMember->id)}}" method="POST">
                @csrf

                <button class="text-red-500" type="submit">
                    Verwijder teamlid van het toernooi.
                </button>
            </form>
        @endforeach

</div>


</body>
</html>



