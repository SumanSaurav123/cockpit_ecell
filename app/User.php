<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    // protected $connection = 'mongodb';
    
    // protected $collection = 'users';

    protected $primaryKey = '_id';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_id','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsTo('App\Roles','role_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department','dep_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Posts','user_id','user_id');
    }

    public function is_admin()
    {
        if($this->roles->role_name == "CEO")
            return true;
        else
            return false;
    }
}
