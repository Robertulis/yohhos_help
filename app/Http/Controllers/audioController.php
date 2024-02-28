<?php

namespace App\Http\Controllers;

use App\Models\audio;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Storage;


class audioController extends Controller
{
    public function index(){
        return view('music.index',[
            'Playlists'=>Playlist::all(),

            'Audios'=>audio::latest()->filter
            (request(['search']))->paginate(8)  
        ]);
    }

    public function show($playlist_id)
    {
    
        $playlist = Playlist::where('playlist_id', $playlist_id)->firstOrFail();
        
        return view('music.show', ['playlist' => $playlist,
        'Audios'=>audio::all()
        ]);
    }
    

    public function create(){
        return view('music.create',[
            'Playlists'=>Playlist::all()
        ]);
        }

    public function store(Request $request){
        $form = $request->validate([
            
            // 'title'=>'required',
            // 'artist'=>'required',
            'src'=> 'required',
            //'cover'=>'required',
            'playlist_select' => 'exists:playlists,playlist_id',
            
        ]);
        
        $playlist = $request->playlist_select;
        

        $track = GetId3::fromUploadedFile(request()->file('src'));
        $time = $track->getPlaytime();
        $title = $track->getTitle();
        $artist = $track->getArtist();
        $coverData = $track->getArtwork();
        
        
        if (!empty($coverData)) {
            $coverDatadecoded=base64_decode($coverData);
            $cover = 'images/' . uniqid() . ' _cover.jpeg';
            $coverPath = public_path($cover);
            file_put_contents($coverPath, $coverDatadecoded);
        }

        $fileName = 'audio/' . $title . '.' . 'mp3';
        $request->file('src')->move(public_path('audio'), $fileName);

        

        // $cover = 'images/' . $request->title . '.' . 'jpg';
        // $request->file('cover')->move(public_path('images'), $cover);

        
        audio::create([
            'playlist_id'=>$playlist,
            'title' => $title,
            'artist' => $artist,
            'src' => $fileName,
            'cover'=>$cover,
            'time'=>$time,
        ]);
        return redirect('/');
   }
}
