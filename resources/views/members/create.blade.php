<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="flex flex-col">
    <h1>CREATE A NEW MEMBER:</h1>
    <form method="POST" action="{{route('members.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="nickname">Nickname:</label>
        <input type="name" name="nickname">
        <br>
        <label for="name">Name:</label>
        <input type="name" name="name">
        <br>
        <label for="surname">Surname:</label>
        <input type="name" name="surname">
        <br>
        <label for="phonenumber">Phonenumber:</label>
        <input type="name" name="phonenumber">
        <br>
        <label for="email">e-mail:</label>
        <input type="name" name="email">
        <br>
        <label for="photograph">Photograph:</label>

        <input type="file" name="photograph">
        </label>
        <br>
        <label for="birthday">Birthday:</label>
        <input type="name" name="birthday">
        <br>
        <label for="address">Adress:</label>
        <input type="name" name="address">
        <br>
        <label for="bank">Bank:</label>
        <input type="name" name="bank">
        <br>
        <label for="payment_method">Payment method:</label>
        <input type="name" name="payment_method">
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
