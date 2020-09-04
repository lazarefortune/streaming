<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    //
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
