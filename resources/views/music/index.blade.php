<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio List</title>
    
</head>
<body>
    
    <x-header>

    </x-header>

    @include('partials._search')


    <section>
        <h1>Playlists </h1>

        <div class="Audio">
            @foreach($Playlists as $playlist)
                <div class="container">
                   
                        <a href="{{url('/playlist/' . $playlist->playlist_id)}}"> 
                            <div class="title">{{$playlist->name}}</div>
                            <img src="{{url($playlist->img)}}" alt="">
                        </a>
                </div>
            @endforeach
        </div>
        
    </section>

    <h1>Audio List</h1>
    <div class="Audio">
        @foreach($Audios as $audio)
            <div class="container">
                <div class="title">{{$audio->title}}</div>
                <img src="{{ asset($audio->cover) }}" alt="">
                <div>{{$audio->artist}}</div>
                <audio src="{{url($audio->src)}}" controls class="audio"></audio>
            </div>
        @endforeach
    </div>
    



    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var audioElements = document.querySelectorAll(".audio");

            audioElements.forEach(function (audio) {
                audio.addEventListener("play", function () {
                    pauseOtherAudios(audio);
                });
            });

            function pauseOtherAudios(currentAudio) {
                audioElements.forEach(function (audio) {
                    if (audio !== currentAudio && !audio.paused) {
                        audio.pause();
                    }
                });
            }
        });
    </script>
</body>
</html>
