<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function searchQuiz(string $search)
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
