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

<a href="{{route('members.index')}}">Terug naar teamledenlijst</a>
<div class=" flex bg-red-800 h-full ">
        <table class="bg-blue-400">
        <td><img src="{{asset($member->photograph)}}" width="100vw" height="100vh"></td>
        <td>Naam: {{$member->nickname}}</td>
        <td>Achternaam: {{$member->surname}}</td>
        <td>Telefoonnummer: {{$member->phonenumber}}</td>
        <td>Email-address: {{$member->email}}</td>
        <td>Geboren: {{$member->birthday}}</td>
        <td>Address: {{$member->address}}</td>
        <td>Bank: {{$member->bank}}</td>
        <td>Betaal methode: {{$member->payment_method}}</td>

            @if(!$isExpired)
                <td>Lidmaatschap status: Het team lid zijn abonnement is geldig tot: {{$member->expiration_date}}</td>
            @else
                <td>Lidmaatschap status: Het team lidmaat schap is verstreken van dit teamlid: {{$member->expiration_date}}
            @endif


        </table>
</div>
</body>
</html>



