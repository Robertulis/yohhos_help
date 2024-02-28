<?php

namespace App\Http\Controllers;

use App\Models\audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Owenoj\LaravelGetId3\GetId3;

class audioController extends Controller
{
    public function index(){
        return view('index',[
            'Audios'=>audio::latest()->filters
            (request(['search']))->paginate(8)
        ]);

    }
    public function destroy($id){

        $audio= audio::findOrFail($id);
        $audiopath= public_path($audio->audio);
        if(File::exists($audiopath)?? false){
            File::delete($audiopath);
        }
        $coverpath=public_path($audio->cover);
        if(File::exists($coverpath) ?? false){
            File::delete($coverpath);
        }
        $audio->delete();

        return redirect('/');
    }

    public function store(Request $request){
        $form=$request->validate([
            'audio'=>'required',
        ]);

        $track=GetId3::fromUploadedFile(request()->file('audio'));
        $title=$track->getTitle();
        $artist=$track->getArtist();


        $coverdata= $track->getArtwork();

        $cover="images/".$title.'_'. uniqid().'_cover.jpeg';
        $coverdataDecoded=base64_decode($coverdata);
        $coverpath=public_path($cover);
        file_put_contents($coverpath,$coverdataDecoded);

        $filename='audio/'.$title.'_'. uniqid().'_audio.mp3';
        $request->file('audio')->move(public_path('audio'),$filename);

        audio::create([
            'title'=>$title,
            'artist'=>$artist,
            'cover'=>$cover,
            'audio'=>$filename
        ]);

        return redirect('/');
    }
}
