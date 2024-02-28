<?php

namespace App\Models;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class audio extends Model
{
    use HasFactory;
    protected $fillable = ['playlist_id','title','artist','src', 'cover','time'];



    public function scopeFilter($query, array $filters){

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('artist', 'like', '%' . request('search') . '%');
            
            
        }
    }

    // public function playlist(){
    //     return $this->belongsTo(Playlist::class, 'playlist_id');
    // }

}
