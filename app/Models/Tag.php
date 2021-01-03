<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    //Renvoi les tags des photos
    public function photos(){
        return $this->belongsToMany(Photo::class)->using(PhotoTag::class)->withPivot("id")->withTimestamps();
    } 
}
