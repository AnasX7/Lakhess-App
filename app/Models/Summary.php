<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    // 
     public function user (){
        return $this->belongsTo(User::class);

    }


    public function folder (){
        return $this->belongsTo(Folder::class);

    }


    public function favorites (){
        return $this->morphMany(Favorite::class, 'favoritable');

    }
}
