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
<a href="{{route('tournaments.create')}}">Voeg nieuwe toernooien toe:</a>
<a href="{{route('members.index')}}">Ga naar de teamleden pagina</a>
<h1>Toernooien lijst:</h1>

<!--voor meerdere casussen voor de hoeveelheid teamleden-->
@if($totalTournaments == 0)
    <p>Er zijn op dit moment geen toernooien, voeg er een toe</p>

@elseif($totalTournaments == 1)
    <p>Er is in totaal: {{$totalTournaments}} Toernooi </p>

@else
    <p>Er zijn in totaal: {{$totalTournaments}} Toernooien </p>
@endif

@if(session()->has('message'))
    <p>{{session()->get('message')}}</p>

@endif
<div class="mx-auto pb-10 w4/5">
    {{$tournaments->links()}}
</div>
<table>

    @foreach ( $tournaments as $value)
        <div class="flex w-full ">
            <tr class="flex flex-col p-5 bg-gray-500">

                <td>Naam: {{$value->name}}</td>

                <td><a href="{{route('tournaments.show', $value->id )}}">Naar toernooi:</a></td>
                <td><a class="text-green-500" href="{{route('tournaments.edit', $value->id )}}">Bewerk toernooi-informatie:</a></td>
                <td>
                    <form action="{{route('tournaments.destroy', $value->id)}}" method="POST">
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
