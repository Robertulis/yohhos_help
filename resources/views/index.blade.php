<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('partrials._search')

    <div>
        <form action="/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="audio" id="">
            <button type="submit">Add</button>
        
        </form>
    </div>
    <div>
        @foreach($Audios as $audio)
        <h5>{{$audio->title}}</h5>
        <img src="{{$audio->cover}}" alt="">
        <p>{{ $audio->artist}}</p>
        <audio src="{{url($audio->audio)}}" controls></audio>
        <form action="/audio/{{$audio->id}}" method="POST" >
            @csrf
            @method('DELETE')
            <button type="submit"> Delete</button>
        </form>
        @endforeach
    </div>
</body>
</html>