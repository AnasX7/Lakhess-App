<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Folder extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }


    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
