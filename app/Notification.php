<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use App\Meeting;

class Notification extends Model
{
    //
    // protected $connection = 'mongodb';
    
    // protected $collection = 'notifications';

    protected $primaryKey = '_id';

    public function meeting()
    {
       return $this->hasOne('App\Meeting','_id','meeting_id');
    }
    
}