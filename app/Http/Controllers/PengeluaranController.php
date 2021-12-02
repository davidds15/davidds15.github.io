<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use DB;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Pengeluaran::All();
       
        return view('pengeluaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pengeluaran.create');
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
        $i = $request->get('jumlahtambahan');
        for($j = 0; $j <= $i; $j++)
        {
            $data=new Pengeluaran();
            $data->keterangan=$request->get('Keterangan_'.$j);
            $data->tanggal=$request->get('Tanggal_0');
            $data->jumlah=$request->get('Jumlah_'.$j);
            $data->save();
        }

        return redirect()->route('pengeluaran.index')->with('status','pengeluaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
        $data = Pengeluaran::where('id', $pengeluaran->id)->first();
       
         return view('pengeluaran.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
        $data = Pengeluaran::find($pengeluaran->id);
        $data->keterangan=$request->get('Keterangan');
        $data->tanggal=$request->get('Tanggal');
        $data->jumlah=$request->get('Jumlah');
        $data->save();
         return redirect()->route('pengeluaran.index')->with('status','pengeluaran berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
        try{
            $pengeluaran->delete();
            return redirect()->route('pengeluaran.index')->with('status','Data pengeluaran berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('pengeluaran.index')->with('error',$msg);
        }
    }
    public function Filtertanggal(Request $request)
    {
      
        // $data_cust=kontakcustomer::All();
        // $data_jadwal = Penjadwalan::All();
        // $data_pegawai = Pegawai::All();
        $tgl = $request->get('Tanggal');
        $tahun = Carbon::createFromFormat('Y-m-d', $tgl)->year;
        $bulan = Carbon::createFromFormat('Y-m-d', $tgl)->month;
        $data=DB::table('pengeluaran as p')
        ->whereMonth('tanggal','=',$bulan)
        ->whereYear('tanggal','=',$tahun)
        ->get(); 
       
    
        return view('pengeluaran.index',compact('data'));    
    }
}
