<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
    @endforeach
    </ul>
    
    <form action="{{route('login')}}" method="Post">
        @csrf
        Email 
        <br> <br>
        <input type="email" name="email" id="" value="{{old('email')}}" required autofocus>
        <br> <br>
        Password 
        <br> <br>
        <input type="password" name="password" id="" required autofocus>
        <br> <br>
        <input type="checkbox" name="rememberMe" id="" value="{{old('rememberMe')}}"> Remember me 
        <br> <br>
        <input type="submit" value="login">
    </form>
</body>
</html>