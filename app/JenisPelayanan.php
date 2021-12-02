<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'jenispelayanans';
    public function categories()
    {
    return $this->belongsToMany('App\Category');
    }
}
