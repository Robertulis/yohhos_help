<?php

namespace App\Models;

use App\Models\audio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img'];

    // public function audio(){
    //     return $this->hasMany(audio::class, 'id');
    // }

}
