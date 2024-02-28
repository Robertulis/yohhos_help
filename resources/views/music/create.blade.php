<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Form</title>

    <style>
        
        
        form {
            max-width: 400px;
            margin: 50px auto;
            background-color:grey;
            padding: 20px;
            border-radius: 8px;
            
        }

        div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid white;
            border-radius: 4px;
        }

        button {
            background-color: green;
            color:white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        
    </style>
</head>
<body>

    <x-header>

    </x-header>
    <form method="POST" action="/music" enctype="multipart/form-data">
        @csrf
        {{-- <div>
            <label>Title</label>
            <input type="text" name="title">
            @error('title')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Artist</label>
            <input type="text" name="artist">
            @error('artist')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div> --}}
        <div>
            <label>Song</label>
            <input name="src" type="file">
            @error('src')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        {{-- <div>
            <label>Cover image</label>
            <input name="cover" type="file">
            @error('cover')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div> --}}
        <select name="playlist_select">
            
            @foreach ($Playlists as $playlist)
                <option value="{{$playlist->playlist_id}}">{{$playlist->name}}</option>
            @endforeach
        </select>
        
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
