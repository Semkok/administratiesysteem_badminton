<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#2176AE]">

<div id="header" class="flex space-x-40 justify-center items-center p-5">
    <a class="font-bold" href="{{route('tournaments.create')}}">Voeg nieuwe toernooien toe ++</a>
    <h1 class="text-5xl">Teamleden lijst:</h1>
    <a href="{{route('members.index')}}">Ga naar de teamleden pagina --></a>

</div>

<div class="flex flex-col bg-[#fe6847] text-[#000000]">

    <div class="flex bg-[#57b8ff] flex-row justify-center border border-black">
        <div class="flex flex-col mx-auto pb-10 w4/5 bg-[#57b8ff]">
            @if($totalTournaments == 0)
                <p>Er zijn op dit moment geen toernooien, voeg er een toe.</p>

            @elseif($totalTournaments == 1)
                <p>Er is in totaal: {{$totalTournaments}} Toernooi. </p>

            @else
                <p>Er zijn in totaal: {{$totalTournaments}} Toernooien. </p>
            @endif

            @if(session()->has('message'))
                <p>{{session()->get('message')}}</p>

            @endif
        </div>
        <div class="flex flex-col mx-auto  pb-10 w4/5 bg-[#57b8ff]">
            {{$tournaments->links()}}

        </div>

    </div>
    <div class="flex w-full h-full overflow-y-auto">
        <div class="flex flex-row flex-wrap w-full h-1/2 ">


            @foreach ( $tournaments as $value)
                <div class="flex flex-row p-10 bg-[#fe6847] justify-center w-1/4 h-1/4 overflow-y-auto">
                    <div class="flex flex-col items-center border border-black bg-[#fbb13c] ">


                        <p>Naam: {{$value->name}}</p>
                        <p>Start-datum: {{$value->begin_date}}</p>
                        <p>Eind-datum: {{$value->end_date}}</p>
                        <div class="flex flex-col border border-black bg-[#B66D0D]">
                            <a href="{{route('tournaments.show', $value->id )}}">Naar toernooi:</a>
                            <a href="{{route('tournaments.edit', $value->id )}}">Bewerk toernooi-informatie:</a></td>

                            <form action="{{route('tournaments.destroy', $value->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Verwijder toernooi
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
