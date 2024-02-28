<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $playlist->name }} Playlist</title>
    <style>
        .audio {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .container {
            width: 23%; /* Adjust as needed */
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .title {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        audio {
            width: 100%;
        }
    </style>
</head>
<body>
    <x-header>

    </x-header>    

    <h1>{{ $playlist->name }} Playlist</h1>
    
    <div class="audio">
    @foreach ($Audios as $audio )
        @if ($audio->playlist_id == $playlist->playlist_id)
            <div class="container">
                <div class="title">{{$audio->title}}</div>
                <img src="{{url($audio->cover)}}" alt="">
                <div>{{$audio->artist}}</div>
                <audio src="{{url($audio->src)}}" controls class="audio"></audio>
            </div>
        @endif
    @endforeach
    </div>
</body>
</html>
