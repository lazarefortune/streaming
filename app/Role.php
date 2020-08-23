<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    // protected $connection = 'common_database';

    public function users()
    {
      return $this->belongsToMany('App\User');
    }
}
