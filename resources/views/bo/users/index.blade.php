<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Users</h1>
    <ul>    
        @forelse ($users as $user)
            <a href="{{route('bo.users.show',['user' => $user])}}"><li>{{$user->firstname}} {{$user->lastname}}</li></a>  
        @empty
            <p>No Users</p>
        @endforelse
    </ul>
</body>
</html>