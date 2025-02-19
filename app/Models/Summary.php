<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    // 
    protected $fillable = [
        'title',
        'content',
        'folder_id',
        'user_id',
        'favorite',
    ];

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
}
