<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adit user</title>
</head>
<body>
    <h1>User modify</h1>
    @if(session()->has('success'))
        <span>{{session()->get('success')}}</span>
    @else
        <span>{{session()->get('fail')}}</span>
    @endif
    <ul>
        @if($errors->any())
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        @endif
    </ul>
   
    <form action="{{route('bo.users.update',['user' => $user])}}" method="Post">
        @csrf
        @method('PUT')
        firstname
        <br>
        <input type="name" name="firstname" value="{{$user->firstname}}" required>
        <br>
        lastname
        <br>
        <input type="name" name="lastname" value="{{$user->lastname}}" required>
        <br>
        email
        <br>
        <input type="email" name="email" value="{{$user->email}}" required>
        <br>
        password
        <br>
        <input type="password" name="password" value="{{$user->password}}">
        <input type="submit" value="Modify">
    </form>
</body>
</html>