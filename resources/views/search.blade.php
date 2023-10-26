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
<body>
<a href="{{route('members.index')}}">Terug naar index teamleden</a>
<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Zoek naar teamleden">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach ($searchedMembers as $foundMember)
        <li>{{ $foundMember->name }}</li>
        <a class="text-green-500" href="{{route('members.show', $foundMember->id )}}">Naar teamgenoot:</a>
    @endforeach
</ul>
</body>
</html>
