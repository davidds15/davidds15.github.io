<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    public $timestamps = false;
    public function detailCustomer(){
        return $this->belongsTo('App\DetailCustomer','id_detailcustomer');
    }
}
