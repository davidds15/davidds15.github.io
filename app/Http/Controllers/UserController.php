<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=User::All();
       
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    
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
        $data=new User();
        $data->username=$request->get('username');
        $data->password=$request->Hash::make(get('password'));
        $data->namauser=$request->get('nama');
        $data->status=$request->get('Status');
        $data->save();
        return redirect()->route('user.index')->with('status','User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $data = user::where('id', $user->id)->first();
       
        return view('user.edit',compact('data'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $data = user::find($user->id);
        $data->username=$request->get('username');
        $data->password=Hash::make($request->get('password'));
        $data->namauser=$request->get('nama');
        $data->status=$request->get('status');
        
         $data->save();
         return redirect()->route('user.index')->with('status','Data user berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        // $this->authorize('delete-permission',$product);
        try{
            $user->delete();
            return redirect()->route('user.index')->with('status','Data user berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('user.index')->with('error',$msg);
        }
    }
}
