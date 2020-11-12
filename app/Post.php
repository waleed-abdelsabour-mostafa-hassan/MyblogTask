<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    // protected $table='ma-table';

    //primary key
    //public $primary key='Ay_ISM_COLUMN';

    //timestamp disable
    //public timestamps=false;
    protected $fillable=['title','body','slug','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
