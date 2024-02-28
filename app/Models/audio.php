<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audio extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'artist',
        'cover',
        'audio',

    ];
    
    public function scopeFilters($query, array $filters){
        if($filters['search'] ?? false){
        $query->where('title','like','%'.request('search').'%')->orWhere(
            'artist','like','%'. request('search').'%');
        }
    }
}
