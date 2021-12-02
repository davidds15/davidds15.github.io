<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontakcustomer extends Model
{
    //
    protected $table = 'kontak_customers';
    public $timestamps = false;
    public function Customer(){
        return $this->belongsTo('App\Customer','id_customer');
    }
    public function DetailCustomer(){
        return $this->belongsTo('App\DetailCustomer','id_detailcustomer');
    }

}
