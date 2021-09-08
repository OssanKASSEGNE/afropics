<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    @if(session()->has('success'))
        <span>{{session()->get('success')}}</span>
    @endif
    <ul>
        @if($errors->any())
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        @endif
    </ul>
   
    <form action="{{route('bo.users.store')}}" method="Post">
        @csrf
        firstname
        <br>
        <input type="name" name="firstname" value="{{old('firstname')}}">
        <br>
        lastname
        <br>
        <input type="name" name="lastname" value="{{old('lastname')}}">
        <br>
        email
        <br>
        <input type="email" name="email" value="{{old('email')}}">
        <br>
        password
        <br>
        <input type="password" name="password" >
        <input type="submit" value="create">
    </form>
</body>
</html>