<?php

namespace App\Http\Controllers;

use App\pegawai;
use Illuminate\Http\Request;
use DB;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = pegawai::all();
        
       
        return view('pegawai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pegawai.create');
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
        $data=new pegawai();
        $data->namapegawai=$request->get('nama');
        $data->nomortelepon=$request->get('nomor');
        $data->save();
        return redirect()->route('pegawai.index')->with('status','Pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(pegawai $pegawai)
    {
        //
        
      
        $pegawai = pegawai::where('id', $pegawai->id)->first();
       
         return view('pegawai.edit',compact('pegawai'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pegawai $pegawai)
    {
        //
        $data = pegawai::find($pegawai->id);
        $data->namapegawai=$request->get('nama');
        $data->nomortelepon=$request->get('nomor');
         $data->save();
         return redirect()->route('pegawai.index')->with('status','Data Pegawai berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        //
          // $this->authorize('delete-permission',$product);
          try{
            $pegawai->delete();
            return redirect()->route('pegawai.index')->with('status','Data pegawai berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('pegawai.index')->with('error',$msg);
        }
    }
}
