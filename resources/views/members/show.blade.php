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

<body class="flex flex-col items-center justify-center w-full h-full bg-blue-200 h-full bg-[#2176AE]">
<div class="flex flex-col justify-center items-center bg-[#fbb13c] border border-black">
        <a href="{{route('members.index')}}"><-- Terug naar teamledenlijst</a>
            <p><img src="{{asset($member->photograph)}}" width="100vw" height="100vh"></p>
            <p>Naam: {{$member->nickname}}</p>
            <p>Achternaam: {{$member->surname}}</p>
            <p>Telefoonnummer: {{$member->phonenumber}}</p>
            <p>Email-address: {{$member->email}}<p>
            <p>Geboren: {{$member->birthday}}</p>
            <p>Address: {{$member->address}}</p>
            <p>Bank: {{$member->bank}}</p>
            <p>Betaal methode: {{$member->payment_method}}</p>
            @if($member->tournament_id != 0)
            <p class="font-bold">Doet mee aan toernooi: {{$tournament->name}}</p>
            @else
            <p class="font-bold">Dit persoon doet nog niet mee aan een toernooi</p>
            @endif

        <p class="font-bold"> Dagen voordat lidmaatschap vergaat: <p class="text-red-500">{{$expired}}</p></p>
</div>
</body>
</html>



