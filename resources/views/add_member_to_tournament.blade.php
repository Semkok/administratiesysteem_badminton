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
<body class="bg-[#2176AE] ">
<a href="{{route('tournaments.show', $tournament->id )}}"><-- Terug naar toernooi</a>
<h1 class="text-3xl">
   Teamleden beschikbaar voor toevoeging:
</h1>
<div class="flex w-full h-full justify-center">
<div class="flex flex-col bg-[#fbb13c] w-1/5 border border-black">
    <div class="flex flex-col mx-auto  pb-10 w4/5 bg-[#57b8ff]">
        {{$members->links()}}

    </div>
@foreach($members as $member)
    {{$member->name}}
    <form method="POST" action="{{route('addMemberToTournament', $tournament->id)}}">
        @csrf

        <button type="submit" value="{{$member->id}}" name="member_id">voeg teamlid toe aan het toernooi</button>
    </form>
@endforeach
</div>
</div>
</body>
</html>
