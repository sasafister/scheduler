<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'title',
        'time',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');

    }

}
