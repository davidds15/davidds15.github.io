<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCustomer extends Model
{
    //
    protected $table = 'detailcustomers';
    public $timestamps = false;
    public function customer(){
        return $this->hasMany('App\Customer','id_detailcustomer','iddetailcustomer');
    }
}
