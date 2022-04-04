<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = array('id');


    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );

    
    // Profile Modelに関連付けを行う
    public function updates()
    {
        return $this->hasMany('App\Profile');

    }
}