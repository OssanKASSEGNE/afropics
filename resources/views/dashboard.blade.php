<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <input type="search" name="search" id="">
            <li>Home</li>
            <li>Our bundle</li>
            <li>My creations</li>
            <li>My catalogue</li>
            <li>About us</li>
            <li>My account (logo user)</li>
            <p>Dropdown with user settings, transactions history,</p> => settings RU user info
            <p>Remaining credits : {{$user->subscription->remaining_credit}}</p>
        </ul>
    </nav>
    @if(session()->has('success'))
        
        {{session()->get('success')}}
        
    @endif
    
    <span>Welcome {{$user->firstname}} Your subscription ends in <b>{{Carbon\Carbon::now()->diffForHumans($user->subscription->subscription_date_end)}}</b> </span>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit"> Log out</button>
    </form>
    

    <h2>Sbmit a photo</h2> 
        <p>Form to add a photo must be in another menu</p>
    <h2>My creations</h2>
         <p>Add search, with filters must be in another menu</p>
         <p>You have uploaded {{$user->creations->count()}} photos</p>
        @foreach($user->creations as $image)
            @if($image->image_status == "published")
                <h3>{{$image->image_name}}</h3>
                <img src="{{asset('storage/imagesFull/'.$image->image_name)}}" alt="{{$image->image_name}}">
                <p>Price : {{$image->image_price}}</p>
            @endif
       
        @endforeach

    <h2>My catalogue</h2>
        <p>Add search, with filters must be in another menu</p>
        <p>You have bought {{$user->imagesOwned->count()}} photos</p>
        @foreach($user->imagesOwned as $image)
            <h3>{{$image->image_name}}</h3>
            <img src="{{asset('storage/imagesFull/'.$image->image_name)}}" alt="{{$image->image_name}}">
        @endforeach
</body>
</html>