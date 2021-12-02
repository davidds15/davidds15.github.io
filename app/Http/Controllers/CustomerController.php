<?php

namespace App\Http\Controllers;

use App\Customer;
use App\kontakcustomer;
use Illuminate\Http\Request;
use App\DetailCustomer;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$data = Customer::All();
        $data=DB::select(DB::raw("SELECT * 
        FROM customers inner join kontak_customers 
        on customers.id = kontak_customers.id_customer
        inner join detailcustomers on detailcustomers.id = kontak_customers.id_detailcustomer"));
       
        return view('customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data_detail = new DetailCustomer();
        $data_detail->alamatcustomer=$request->get('alamat');
        $data_detail->nomortelepon=$request->get('nomor');
        $data_detail->save();
        $id = DetailCustomer::orderBy('id','desc')->first();
        $data= new Customer();
        $data->namacustomer=$request->get('nama');
        $data->save();
        $id_data = Customer::orderBy('id','desc')->first();
        $data_koneksi = new kontakcustomer();
        $data_koneksi->id_customer = $id_data->id;
        $data_koneksi->id_detailcustomer = $id->id;
        $data_koneksi->save();
        return redirect()->route('customer.index')->with('status','Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $data=$customer;
      
        $kontak = kontakcustomer::where('id_customer', $customer->id)->first();
        $id_detail = DetailCustomer::find($kontak->id_detailcustomer);
        
         return view('customer.edit',compact('data','id_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {

        $id_data = DB::table('customers as c')
        ->join('kontak_customers as k', 'c.id', '=', 'k.id_customer')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->where('c.namacustomer','=',$customer->namacustomer)
        ->get(); 
        $data_detail = DetailCustomer::find($id_data[0]->id_detailcustomer);
        $data_detail->alamatcustomer=$request->get('alamat_cus');
        $data_detail->nomortelepon=$request->get('nomor_cus');
        $data_detail->save();
        $data = Customer::find($id_data[0]->id_customer);
        $data->namacustomer=$request->get('nama_cus');
         $data->save();
        return redirect()->route('customer.index')->with('status','Customer berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
          // $this->authorize('delete-permission',$product);
          try{
            $customer->delete();
            return redirect()->route('customer.index')->with('status','Data customer berhasil di hapus');
        }catch (\PDOException $e){
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('customer.index')->with('error',$msg);
        }
        
    }
}
