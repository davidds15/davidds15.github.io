<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'transaksis';
    public function Customer(){
        return $this->belongsTo('App\Customer','id_customer');
    }
    
    public function Penjadwalan(){
        return $this->belongsTo('App\Penjadwalan','id_Penjadwalan');
    }
    public function JenisPelayanan() {
        return $this->belongsToMany('App\JenisPelayanan'
                                , 'detailtransaksis'
                                , 'id_transaksi'
                                , 'id_jenispelayanan')->withPivot('id_customer','deskripsipelayanan','subtotal','id_pegawai','detailcustomers_id');
    }

    public function insertdetail($cart)
    {
        $total = 0; 
        foreach($cart as $id_produk =>$details)
        {
            $total += $details['total'];
            $id_pelayananan = $details['jenispelayanan'];
            $this->JenisPelayanan()->attach($id_pelayananan,[
                                        'id_customer'=>$details['id_customer'],
                                        'subtotal'=>$details['total']
                                        ,'deskripsipelayanan'=> $details['deskripsipelayanan']
                                        ,'id_pegawai'=>$details['id_pegawai']
                                        ,'detailcustomers_id'=>$details['id_detailcustomer']
                                        ]);
        }
        return $total;
    }
}
