<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use App\user;

class Roles extends Model
{
    //
    // protected $connection = 'mongodb';
    
    // protected $collection = 'role';

    protected $primaryKey = 'role_id';


    // public function users()
    // {
    //     return $this->belongsToMany('App\user','role_user','user_id','role_id');
    // }
}
