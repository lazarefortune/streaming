<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // protected $connection = 'common_database';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'contact', 'email', 'password', 'google_id','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();
        if(is_null($check)){
            return static::create($input);
        }
        return $check;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
      return $this->belongsToMany('App\Role');
    }

    public function isAdmin()
    {
      //vérifie si l'utilisateur est admin
      return $this->roles()->where('name', 'admin')->first();
    }

    public function hasAnyRole(array $roles)
    {

      return $this->roles()->whereIn('name', $roles)->first();
    }

    public function streamings()
    {
        return $this->hasMany('App\Streaming');
    }



}
