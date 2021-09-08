<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User show</title>
</head>
<body>
    <ul>
        <li>{{$user->firstname}}</li>
        <li>{{$user->lastname}}</li>
        <li>{{$user->email}}</li>
    </ul>
    <a href="{{route('bo.users.edit',['user' => $user])}}">Modify</a>
</body>
</html>