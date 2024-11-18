<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    //! Change this.
    protected $fillable = [
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function summary()
    {
        return $this->belongsTo(Summary::class);
    }

}
