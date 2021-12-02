<?php

namespace App\Http\Controllers;

use App\JenisPelayanan;
use Illuminate\Http\Request;
use DB;
class JenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::select(DB::raw("SELECT * 
        FROM jenispelayanans"));
       
        return view('pelayanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelayanan.create');
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
        $data=new JenisPelayanan();
        $data->namajenispelayanan=$request->get('nama_pel');
        $data->save();
        return redirect()->route('jenisPelayanan.index')->with('status','Jenis Pelayanan berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisPelayanan  $jenisPelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPelayanan $jenisPelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisPelayanan  $jenisPelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPelayanan $jenisPelayanan)
    {
        //
        $data = JenisPelayanan::where('id', $jenisPelayanan->id)->first();
       
        return view('pelayanan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisPelayanan  $jenisPelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPelayanan $jenisPelayanan)
    {
        //
        $data = JenisPelayanan::find($jenisPelayanan->id);
        $data->namajenispelayanan=$request->get('nama_pel');
        
         $data->save();
         return redirect()->route('jenisPelayanan.index')->with('status','Jenis Pelayanan berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisPelayanan  $jenisPelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPelayanan $jenisPelayanan)
    {
        //
           // $this->authorize('delete-permission',$product);
           try{
            $jenisPelayanan->delete();
            return redirect()->route('jenisPelayanan.index')->with('status','Data user berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('jenisPelayanan.index')->with('error',$msg);
        }
    }
}
