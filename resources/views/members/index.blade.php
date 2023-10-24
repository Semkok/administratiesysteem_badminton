<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col bg-blue-300">
<a href="{{route('members.create')}}">Voeg nieuwe teamleden toe:</a>
<a href="{{route('tournaments.index')}}">Ga naar de toernooien pagina</a>
<h1>Teamleden lijst:</h1>



<!--voor meerdere casussen voor de hoeveelheid teamleden-->
@if($totalMembers == 0)
    <p>Er zijn op dit moment geen teamleden, voeg er een toe</p>

@elseif($totalMembers == 1)
    <p>Er is in totaal: {{$totalMembers}} Teamlid </p>

@else
    <p>Er zijn in totaal: {{$totalMembers}} Teamleden </p>
@endif

@if(session()->has('message'))
    <p>{{session()->get('message')}}</p>

@endif
<div class="mx-auto pb-10 w4/5">
    {{$members->links()}}
</div>
<table>

    @foreach ( $members as $value)
        <div class="flex w-full ">
            <tr class="flex flex-col p-5 bg-gray-500">
                <td><img src="{{asset($value->photograph)}}" width="100vw" height="100vh"></td>
                {{--            <td>toernooi:<a class="text-orange-300" href=""> {{$value->tournament->name}}</a></td>--}}
                <td>Naam: {{$value->name}}</td>
                <td>Bijnaam: {{$value->nickname}}</td>
                <td>Achternaam: {{$value->surname}}</td>
                <td>Telefoonnummer: {{$value->phonenumber}}</td>
                <td>Email-address: {{$value->email}}</td>
                <td>Geboren: {{$value->birthday}}</td>
                <td><a href="{{route('members.show', $value->id )}}">Naar teamgenoot:</a></td>
                <td><a class="text-green-500" href="{{route('members.edit', $value->id )}}">Bewerk teamgenoot informatie:</a></td>
                <td>
                    <form action="{{route('members.destroy', $value->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
        </div>
    @endforeach


</table>
</body>
</html>
