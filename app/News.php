<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
}
