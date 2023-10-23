<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col">
    <h1>Voeg een nieuw teamlid toe:</h1>
    <a href="{{route('members.index')}}">Terug naar teamleden pagina</a>
    <div class="pb-8">
        @if($errors->any())
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Something went wrong...
            </div>
            <ul  class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-text-red-700">
                @foreach($errors->all() as $error)
                    <br>
                    {{$error}}
                @endforeach
            </ul>

        @endif
    </div>
    <form class="border" method="POST" action="{{route('members.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="nickname">Nickname:</label>
        <input class="border" type="name" name="nickname">
        <br>
        <label for="name">Name:</label>
        <input class="border" type="name" name="name">
        <br>
        <label for="surname">Surname:</label>
        <input class="border" type="name" name="surname">
        <br>
        <label for="phonenumber">Phonenumber:</label>
        <input class="border" type="name" name="phonenumber">
        <br>
        <label for="email">e-mail:</label>
        <input class="border" type="name" name="email">
        <br>
        <label for="photograph">Photograph:</label>

        <input class="border" type="file" name="photograph">
        </label>
        <br>
        <label for="birthday">Birthday:</label>
        <input class="border" type="date" name="birthday">
        <br>
        <label for="address">Adress:</label>
        <input class="border" type="name" name="address">
        <br>
        <label for="bank">Bank:</label>
        <input class="border" type="name" name="bank">
        <br>
        <label for="payment_method">Payment method:</label>
        <input class="border" type="name" name="payment_method">
        <br>
        <label for="expiration_date">Verloopdatum:</label>
        <input class="border" type="date" name="expiration_date">
        <br>

        <button class="border" type="submit">Submit</button>
    </form>
</body>
</html>
