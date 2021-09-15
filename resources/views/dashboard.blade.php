<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @if(session()->has('success'))
        
        {{session()->get('success')}}
        
    @endif
    
    <span>Welcome {{Auth::user()->firstname}} You have  <b>Time left</b> left before the end of you subscription.</span>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit"> Log out</button>
    </form>
    

    <h2>Add a photo</h2> 
        <p>Form to add a photo must be in another menu</p>
    <h2>My creations</h2>
         <p>Add search, with filters must be in another menu</p>
         <p>You have uploaded {{Auth::user()->creations->count()}} photos</p>
        @foreach(Auth::user()->creations as $image)
            @if($image->image_status == "published")
                <h3>{{$image->image_name}}</h3>
                <img src="{{asset('storage/imagesFull/'.$image->image_name)}}" alt="{{$image->image_name}}">
                <p>Price : {{$image->image_price}}</p>
            @endif
       
        @endforeach

    <h2>My catalogue</h2>
        <p>Add search, with filters must be in another menu</p>
        <p>You have bought {{Auth::user()->imagesOwned->count()}} photos</p>
        @foreach(Auth::user()->imagesOwned as $image)
            <h3>{{$image->image_name}}</h3>
            <img src="{{asset('storage/imagesFull/'.$image->image_name)}}" alt="{{$image->image_name}}">
        @endforeach
</body>
</html>