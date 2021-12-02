<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    //
    protected $table = 'pegawaiserviss';
    public $timestamps = false;
    public function penjadwalan()
    {
                // model Product   nama field di products
        return $this->hasMany('App\Penjadwalan', 'id_pegawai', 'idpegawaiservis');
        
    }
}
