<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col">
<a href="{{route('members.create')}}">Create member</a>
<h1>Member list:</h1>
<table>
@foreach ( $member as $value)
<div class="flex w-full">
        <tr class="flex flex-col p-5 bg-gray-500">
            <td><img src="{{$value->photograph}}" width="100vw" height="100vh"></td>
            <td>Naam: {{$value->nickname}}</td>
            <td>Achternaam: {{$value->surname}}</td>
            <td>Telefoonnummer: {{$value->phonenumber}}</td>
            <td>Email-address: {{$value->email}}</td>
            <td>Geboren: {{$value->birthday}}</td>
            <td>Address: {{$value->address}}</td>
            <td>Bank: {{$value->bank}}</td>
            <td>Betaal methode: {{$value->payment_method}}</td>
        </tr>
</div>
@endforeach
</table>
</body>
</html>
