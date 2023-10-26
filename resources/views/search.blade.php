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
<body class="bg-[#2176AE]">
<a class="flex bg-[#fbb13c]" href="{{route('members.index')}}"><--Terug naar index teamleden</a>
<div class="flex flex-col justify-center items-center h-full w-full ">
<div id="searchpart" class="flex flex-col">


<h1 class="text-5xl pb-40 p-5">
    Teamleden zoeken
</h1>


<form action="{{ route('search') }}" method="GET">
    <input class="w-full" type="text" name="query" placeholder="Zoek naar teamleden">
    <button type="submit"></button>
</form>
</div>

    <div id="foundmembers" class="flex p-20 flex-col">

    @foreach ($searchedMembers as $foundMember)
        <div class="flex p-2 pr-4">
        <p>{{ $foundMember->name }}</p>
        <a class="text-green-500" href="{{route('members.show', $foundMember->id )}}">Naar teamgenoot:</a>
        </div>
    @endforeach
</div>

</div>
</body>
</html>
