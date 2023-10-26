<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
    @vite('resources/css/app.css')
</head>
<body>
<div id="header" class="flex bg-[#2176AE] space-x-40 justify-center items-center p-5">
    <a href="/">Terug naar home</a>
    <a href="{{route('dashboard')}}">Account</a>
    <a class="font-bold" href="{{route('members.create')}}">Voeg nieuwe teamleden toe ++</a>
    <h1 class="text-5xl">Teamleden lijst:</h1>
    <a href="{{route('tournaments.index')}}">Ga naar de toernooien pagina --></a>

</div>

<div class="flex flex-col bg-[#fe6847] text-[#000000]">

<div class="flex bg-[#57b8ff] flex-row justify-center border border-black">
    <div class="flex flex-col mx-auto pb-10 w4/5 bg-[#57b8ff]">
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
    </div>
    <div class="flex flex-col mx-auto  pb-10 w4/5 bg-[#57b8ff]">
        {{$members->links()}}

    </div>
    <div class="flex flex-col mx-auto pb-10 w4/5 bg-[#57b8ff]">
    <a href="{{route('search')}}">Zoek teamleden &#x1F50D;</a>
    </div>
</div>
    <div class="flex w-full h-full overflow-y-auto">
    <div class="flex flex-row flex-wrap w-full h-1/2 ">


    @foreach ( $members as $value)
        <div class="flex flex-row p-10 bg-[#fe6847] justify-center w-1/4 h-1/4 overflow-y-auto">
                <div class="flex flex-col items-center border border-black bg-[#fbb13c] ">

                <img class="border border-black" src="{{asset($value->photograph)}}" width="100vw" height="100vh">
                {{--            <td>toernooi:<a class="text-orange-300" href=""> {{$value->tournament->name}}</a></td>--}}
                <p>Naam: {{$value->name}}</p>
                <p>Bijnaam: {{$value->nickname}}</p>
                <p>Achternaam: {{$value->surname}}</p>
                <p>Telefoonnummer: {{$value->phonenumber}}</p>
                <p>Email-address: {{$value->email}}</p>
                <p>Geboren: {{$value->birthday}}</p>
                    <div class="flex flex-col border border-black bg-[#B66D0D]">
                        <a href="{{route('members.show', $value->id )}}">Naar teamgenoot:</a>
                        <a href="{{route('members.edit', $value->id )}}">Bewerk teamgenoot informatie:</a></td>

                    <form action="{{route('members.destroy', $value->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            Delete
                        </button>
                    </form>
                    </div>
                </div>
        </div>
    @endforeach
    </div>
    </div>
</div>
</body>
</html>
