<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Illuminate\Notifications\Notifiable;
use App\department;

class meeting extends Moloquent
{

    //
    use Notifiable;

    protected $connection = 'mongodb';
    
    protected $collection = 'meeting';

    protected $primaryKey = '_id';

    public function department()
    {
        return $this->belongsTo('App\department','dep_id','dep_id');
    }

}
