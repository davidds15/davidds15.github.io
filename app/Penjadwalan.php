<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    //
    protected $table = 'penjadwalans';
    public $timestamps = false;
    public function Customer(){
        return $this->belongsTo('App\Customer','id_customer');
    }
    
    public function PegawaiServis(){
        return $this->belongsTo('App\pegawai','id_pegawai');
    }
}
