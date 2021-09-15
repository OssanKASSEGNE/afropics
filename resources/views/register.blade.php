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
    
    <form action="{{route('register')}}" method="Post">
        @csrf
        Email
        <br> <br>
        <input type="email" name="email" id="" value="{{old('email')}}" required autofocus>
        <br> <br>
        firstname 
        <br> <br>
        <input type="text" name="firstname" id="" value="{{old('firstname')}}" required autofocus>
        <br> <br>
        lastname 
        <br> <br>
        <input type="text" name="lasstname" id="" value="{{old('lastname')}}" required autofocus>
        <br> <br>
        Password
         <br> <br>
        <input type="password" name="password" id="" required autofocus>
        <br> <br>
       Confirm password
       <br> <br>
       <input type="password" name="confirm_password" id="" required autofocus>
        <br> <br>
        <input type="submit" value="register">
    </form>
</body>
</html>
