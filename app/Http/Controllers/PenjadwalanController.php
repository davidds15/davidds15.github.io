<?php

namespace App\Http\Controllers;

use App\Penjadwalan;
use Illuminate\Http\Request;
use DB;
use App\kontakcustomer;
use App\Pegawai;
use Carbon\Carbon; 
class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgl="";
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();
        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->get(); 
        $datapengerjaan = [];
        $i = 0;
        foreach($data as $d)
        {
            $tanggalskrng = Carbon::now();
            $tgl = $tanggalskrng->toDateString();
            
            $tanggalpenagihan = $d->tanggalpenjadwalan;
            $tanggalpenagihan = Carbon::parse($tanggalpenagihan);
            $tgltagih = $tanggalpenagihan->toDateString();
            
            if($tgl == $tgltagih)
            {
                $datapengerjaan[$i]=[
                    'id'=> $d->id,
                    'nama_customer'=>$d->namacustomer,
                    'nama_pegawai'=>$d->namapegawai,
                    'nomortelepon_pegawai'=>$d->nomorpegawai,
                    'tanggalservis'=>$d->tanggalpenjadwalan,
                    'alamat'=>$d->alamatcustomer,
                    'nomor_customer'=>$d->nomorcustomer
                ];
            }
            $i++;
           
        }
        

        return view('penjadwalan.index',compact('tgl','data_cust','data_jadwal','data_pegawai','datapengerjaan','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=new Penjadwalan();
        $data->id_pegawai=$request->get('pegawai');
        $data->tanggalpenjadwalan=$request->get('Tanggal');
        $data->customers_id=$request->get('customer');
        $data->save();
     
        return redirect()->route('listjadwal')->with('status','Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjadwalan $penjadwalan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjadwalan $penjadwalan)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjadwalan $penjadwalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjadwalan $penjadwalan)
    {
        //
        try{
            $penjadwalan->delete();
            return redirect()->route('penjadwalan.index')->with('status','Data penjadwalan berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('penjadwalan.index')->with('error',$msg);
        }
    }

    public function pengerjaanbesok()
    {
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();
        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        // ->join('transaksis as t', 't.id_penjadwalan', '=', 'p.id')
        // ->where('t.status','=','Belum Bayar')
        // ->orwhere('t.status','=','Proses Perbaikan')
        ->get(); 
        
        $datapengerjaan = [];
        $i = 0;
        foreach($data as $d)
        {
            $tanggalskrng = Carbon::now()->addDays(1);
            $tgl = $tanggalskrng->toDateString();
            
            $tanggalpenagihan = $d->tanggalpenjadwalan;
            $tanggalpenagihan = Carbon::parse($tanggalpenagihan);
            $tgltagih = $tanggalpenagihan->toDateString();
            
            if($tgl == $tgltagih)
            {
                $datapengerjaan[$i]=[
                    'id'=> $d->id,
                    'nama_customer'=>$d->namacustomer,
                    'nama_pegawai'=>$d->namapegawai,
                    'nomortelepon_pegawai'=>$d->nomortelepon,
                    'tanggalservis'=>$d->tanggalpenjadwalan,
                    'alamat'=>$d->alamatcustomer,
                    'nomor_customer'=>$d->nomorcustomer
                 
                ];
            }
            $i++;
            
        }
        
        return view('penjadwalan.index',compact('tgl','data_cust','data_jadwal','data_pegawai','datapengerjaan','i'));

    }

    public function pengerjaankemarin()
    {
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();
        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        // ->join('transaksis as t', 't.id_penjadwalan', '=', 'p.id')
        // ->where('t.status','=','Belum Bayar')
        // ->orwhere('t.status','=','Proses Perbaikan')
        ->select('*','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->get(); 
        
        $datapengerjaan = [];
        $i = 0;
        foreach($data as $d)
        {
            $tanggalskrng = Carbon::now()->addDays(-1);
            $tgl = $tanggalskrng->toDateString();
            
            $tanggalpenagihan = $d->tanggalpenjadwalan;
            $tanggalpenagihan = Carbon::parse($tanggalpenagihan);
            $tgltagih = $tanggalpenagihan->toDateString();
            
            if($tgl == $tgltagih)
            {
                $datapengerjaan[$i]=[
                    'id'=> $d->id,
                    'nama_customer'=>$d->namacustomer,
                    'nama_pegawai'=>$d->namapegawai,
                    'nomortelepon_pegawai'=>$d->nomortelepon,
                    'tanggalservis'=>$d->tanggalpenjadwalan,
                    'alamat'=>$d->alamatcustomer,
                    'nomor_customer'=>$d->nomorcustomer
                 
                ];
            }
            $i++;
            
        }
        
        return view('penjadwalan.index',compact('tgl','data_cust','data_jadwal','data_pegawai','datapengerjaan','i'));

    }
    public function showsemua()
    {
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();

        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','p.id as id_jadwal','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->get(); 
       
        return view('penjadwalan.listjadwal',compact('data','data_cust','data_pegawai'));
    }

    public function jadwalbulanlain($bulan)
    {
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();

        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->whereMonth('p.tanggalpenjadwalan',$bulan)
        ->get(); 
       
        return view('penjadwalan.listjadwal',compact('data','data_cust','data_pegawai'));
    }

    public function Filtertanggal(Request $request)
    {
      
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();

        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->get(); 
        $datapengerjaan = [];
        $i = 0;
        foreach($data as $d)
        {
            $tgl = $request->get('Tanggal');
            $tanggaltransaksi = $d->tanggalpenjadwalan;
            $tanggaltransaksi = Carbon::parse($tanggaltransaksi);
            $tgltransaksi = $tanggaltransaksi->toDateString();
            if($tgl == $tgltransaksi)
            {
                $datapengerjaan[$i]=[
                    'id'=> $d->id,
                    'nama_customer'=>$d->namacustomer,
                    'nama_pegawai'=>$d->namapegawai,
                    'nomortelepon_pegawai'=>$d->nomorpegawai,
                    'tanggalservis'=>$d->tanggalpenjadwalan,
                    'alamat'=>$d->alamatcustomer,
                    'nomor_customer'=>$d->nomorcustomer
                ];
            }
            $i++;
           
        }
        return view('penjadwalan.index',compact('tgl','data_cust','data_jadwal','data_pegawai','datapengerjaan','i'));    
    }
    public function Filterbulan(Request $request)
    {
        $tgl = $request->get('Tanggal');
        $filter = strtotime($tgl);
        $month=date("m",$filter);
        $year=date("Y",$filter);
       
        $data_cust=kontakcustomer::All();
        $data_jadwal = Penjadwalan::All();
        $data_pegawai = Pegawai::All();

        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->select('*','p.id as id_jadwal','d.nomortelepon as nomorcustomer','ps.nomortelepon as nomorpegawai')
        ->whereMonth('p.tanggalpenjadwalan',$month)
        ->whereYear('p.tanggalpenjadwalan',$year)
        ->get(); 
        
        $datapengerjaan = [];
        $i = 0;
        // foreach($data as $d)
        // {
            
        //     $tanggaltransaksi = $d->tanggalpenjadwalan;
        //     $tanggaltransaksi = Carbon::parse($tanggaltransaksi);
        //     $tgltransaksi = $tanggaltransaksi->toDateString();
            
        //     if($tgl == $tgltransaksi)
        //     {
        //         $datapengerjaan[$i]=[
        //             'id'=> $d->id,
        //             'nama_customer'=>$d->namacustomer,
        //             'nama_pegawai'=>$d->namapegawai,
        //             'nomortelepon_pegawai'=>$d->nomorpegawai,
        //             'tanggalservis'=>$d->tanggalpenjadwalan,
        //             'alamat'=>$d->alamatcustomer,
        //             'nomor_customer'=>$d->nomorcustomer
        //         ];
        //     }
        //     $i++;
           
        // }
        return view('penjadwalan.listjadwal',compact('data','data_cust','data_pegawai'));  
    }
}
