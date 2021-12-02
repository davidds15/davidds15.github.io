<?php

namespace App\Http\Controllers;
use App\kontakcustomer;
use App\Penjadwalan;
use App\JenisPelayanan;
use App\Transaksi;
use App\Pegawai;
use App\DetailTransaksi;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=DB::table('transaksis as t')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->select('t.id','c.namacustomer','t.total','t.jenispembayaran','t.tanggal','ps.tanggalpenjadwalan','t.status')
        ->get(); 
        return view('transaksi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
       
       
            $data_alamat=null;
            $data_cust=kontakcustomer::All();
            $data_jadwal = DB::table('penjadwalans as p')
            ->join('pegawaiserviss as pp', 'pp.id', '=', 'p.id_pegawai')
            ->join('customers as c', 'c.id', '=', 'p.customers_id')
            ->whereNotIn('p.id', DB::table('transaksis')->pluck('id_penjadwalan'))
            ->select('p.id','p.id_pegawai','p.customers_id','c.namacustomer','pp.namapegawai','pp.nomortelepon','p.tanggalpenjadwalan')
            ->get(); 
            $data_pelayanan = JenisPelayanan::All();
            $data_pegawai = Pegawai::All();
           
             return view('transaksi.create',compact('data_cust','data_jadwal','data_pelayanan','data_pegawai','data_alamat'));
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = [];
        $i = $request->get('jumlahtambahan');
        for($j = 0; $j <= $i; $j++)
        {
        $idcust = $request->get('customer_id');
        $data = DB::table('customers as c')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->where('c.id','=',$idcust)
        ->get();  
        
        $idpel = $request->get('jenis_pel_'.$j);
        $datapelayanan = DB::table('jenispelayanans')
        ->where('id','=',$idpel)
        ->get(); 
      
        $idpeg = $request->get('pegawai_id');
        $datapegawai = DB::table('pegawaiserviss')
        ->where('id','=',$idpeg)
        ->get(); 
          
        $cart[$j]=[
            'id_customer'=> $request->get('customer_id'),
            'total'=>$request->get('total_'.$j),
            'id_penjadwalan'=>$request->get('jadwal'),
            'jenispelayanan'=>$request->get('jenis_pel_'.$j),
            'id_pegawai'=>$request->get('pegawai_id'),
            'deskripsipelayanan'=>$request->get('Deskripsi_'.$j),
            'id_detailcustomer'=>$request->get('alamat_id'),
            'namacustomer'=>$data[0]->namacustomer,
            'pegawai'=>$datapegawai[0]->namapegawai,
            'namapelayanan'=>$datapelayanan[0]->namajenispelayanan,
            'alamat'=>$data[0]->alamatcustomer,
            'notelp'=>$data[0]->nomortelepon,
        ]; 
     }   
        $t = new Transaksi;
        $t->status="Belum Bayar";
        $t->jenispembayaran=$request->get('jenis_bayar');
        $t->tanggal=$request->get('tanggal_bayar');
        $t->id_customer=$request->get('customer_id');
        $t->id_penjadwalan=$request->get('jadwal');
        $t->save();
        $total_harga = $t->insertdetail($cart);
        $t->total=$total_harga;
        $t->save();
    return redirect()->route('transaksi.index')->with('status',' data transaksi berhasil dicatat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {

        $id = $transaksi->id;
        $data = DB::table('transaksis as t')
        ->join('detailtransaksis as d', 'd.id_transaksi', '=', 't.id')
        ->join('penjadwalans as p', 'p.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->join('jenispelayanans as j', 'j.id', '=', 'd.id_jenispelayanan')
        ->join('pegawaiserviss as pg', 'pg.id', '=', 'd.id_pegawai')
        ->where('t.id','=',$id)
        ->orderBy('p.tanggalpenjadwalan', 'desc')
        ->select('d.detailcustomers_id','d.id as iddetail','t.id_customer','pg.namapegawai','j.namajenispelayanan','c.namacustomer','t.id','t.status','t.total','t.jenispembayaran', 't.tanggal','d.id_jenispelayanan','d.id_customer','d.deskripsipelayanan','d.subtotal','d.id_pegawai','p.tanggalpenjadwalan')
        ->get(); 
        $idcust = $data[0]->detailcustomers_id;
        $data_customer = DB::table('customers as c')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->where('d.id','=',$idcust)
        ->get(); 
        return view('transaksi.detailtransaksi',compact('data','data_customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
        
        $id = $transaksi->id;
        $data = DB::table('transaksis as t')
        ->join('detailtransaksis as d', 'd.id_transaksi', '=', 't.id')
        ->join('penjadwalans as p', 'p.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->join('jenispelayanans as j', 'j.id', '=', 'd.id_jenispelayanan')
        ->join('pegawaiserviss as pg', 'pg.id', '=', 'd.id_pegawai')
        ->where('t.id','=',$id)
        ->orderBy('p.tanggalpenjadwalan', 'desc')
        
        ->select('d.detailcustomers_id','t.id_customer','pg.namapegawai','j.namajenispelayanan','c.namacustomer','t.id','t.status','t.total','t.jenispembayaran', 't.tanggal','d.id_jenispelayanan','d.id_customer','d.deskripsipelayanan','d.subtotal','d.id_pegawai','p.tanggalpenjadwalan','p.id as id_penjadwalan','d.id as id_detail')
   
        ->get(); 
        $idcust = $data[0]->detailcustomers_id;
        $data_customer = DB::table('customers as c')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->where('d.id','=',$idcust)
        ->get(); 
        $data_cust=kontakcustomer::All();
        $data_alamat = DB::table('customers as c')
            ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
            ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
            ->where('c.id','=',$idcust)
            ->get(); 
            $data_pelayanan = JenisPelayanan::All();
            $data_pegawai = Pegawai::All();
            $data_jadwal = DB::table('penjadwalans as p')
            ->join('pegawaiserviss as pp', 'pp.id', '=', 'p.id_pegawai')
            ->join('customers as c', 'c.id', '=', 'p.customers_id')
            ->where('c.id','=',$idcust)
            // ->whereNotIn('p.id', DB::table('transaksis')->pluck('id_penjadwalan'))
            ->select('p.id','p.id_pegawai','p.customers_id','c.namacustomer','pp.namapegawai','pp.nomortelepon','p.tanggalpenjadwalan')
            ->get(); 
      
            $data_jadwal_semua =  DB::table('penjadwalans as p')
            ->join('pegawaiserviss as pp', 'pp.id', '=', 'p.id_pegawai')
            ->join('customers as c', 'c.id', '=', 'p.customers_id')
            ->whereNotIn('p.id', DB::table('transaksis')->pluck('id_penjadwalan'))
            ->select('p.id','p.id_pegawai','p.customers_id','c.namacustomer','pp.namapegawai','pp.nomortelepon','p.tanggalpenjadwalan')
            ->get(); 
        return view('transaksi.edit',compact('data','data_customer','data_cust','data_alamat','data_pelayanan','data_pegawai','data_jadwal','data_jadwal_semua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        
        $t =Transaksi::find($transaksi->id);
        $t->status=$request->get('Status');
        $t->jenispembayaran=$request->get('jenis_bayar');
        $t->tanggal=$request->get('tanggal_bayar');
        $t->id_customer=$request->get('customer_id');
        $t->id_penjadwalan=$request->get('jadwal');
        $data_detail = DB::table('detailtransaksis as d')
        ->where('d.id_transaksi','=',$t->id)
        ->get(); 
        $total = 0;
        $count = $request->get('totaldata');
        foreach($data_detail as $i){
            $td = DetailTransaksi::find($i->id);
            $td->id_jenispelayanan=$request->get('jenis_pel'.$i->id);
            $td->id_transaksi=$t->id;
            $td->id_customer=$request->get('customer_id');
            $td->deskripsipelayanan=$request->get('Deskripsi'.$i->id);
            $td->subtotal=$request->get('total'.$i->id);
            $total += $request->get('total'.$i->id);
            $td->id_pegawai=$request->get('pegawai_id');
            $td->detailcustomers_id=$request->get('alamat');
            $td->save(); 
         
           
        }
        $t->total = $total;
        $t->save();
        return redirect()->route('transaksi.index')->with('status','Edit data transaksi id: '.$t->id.' berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
    public function cart()
    {
        // $cart =  session()->get('cart');
        // dd($cart);
        return view('transaksi.cart');
    }
    // public function addToCart(Request $request)
    // {
    //     $id = 0;
    //     $cart = session()->get('cart');
    //     while(isset($cart[$id]))
    //     {
    //         $id+=1;
    //     }
    //     if(!isset($cart[$id]))
    //     {
    //         $idcust = $request->get('Customer');
    //         $data = DB::table('customers as c')
    //         ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
    //         ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
    //         ->where('c.id','=',$idcust)
    //         ->get();  
            
    //         $idpel = $request->get('jenis_pel');
    //         $datapelayanan = DB::table('jenispelayanans')
    //         ->where('id','=',$idpel)
    //         ->get(); 
    //         $idpeg = $request->get('pegawai');
    //         $datapegawai = DB::table('pegawaiserviss')
    //         ->where('id','=',$idpeg)
    //         ->get(); 
    //         $cart[$id]=[
    //             'id_customer'=> $request->get('Customer'),
    //             'total'=>$request->get('total'),
    //             'id_penjadwalan'=>$request->get('jadwal'),
    //             'jenispelayanan'=>$request->get('jenis_pel'),
    //             'id_pegawai'=>$request->get('pegawai'),
    //             'deskripsipelayanan'=>$request->get('Deskripsi'),
    //             'id_detailcustomer'=>$request->get('alamat'),
    //             'namacustomer'=>$data[0]->namacustomer,
    //             'pegawai'=>$datapegawai[0]->namapegawai,
    //             'namapelayanan'=>$datapelayanan[0]->namajenispelayanan,
    //             'alamat'=>$data[0]->alamatcustomer,
    //             'notelp'=>$data[0]->nomortelepon,
    //         ];
    //     }
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('status','transaksi berhasil ditambahkan');
    // }

    // public function submitcheckout(Request $request)
    // {

    //     $cart=session()->get('cart');
    //     $t = new Transaksi;
    //     $t->status=$request->get('Status');
    //     $t->jenispembayaran=$request->get('jenis_bayar');
    //     $t->tanggal=$request->get('tanggal_bayar');
    //     $t->id_customer=$cart[0]['id_customer'];
    //     $t->id_penjadwalan=$cart[0]['id_penjadwalan'];
    //     $t->save();
    //     $total_harga = $t->insertdetail($cart);
    //     $t->total=$total_harga;
    //     $t->save();
    //     session()->forget('cart');
    //     return redirect('/');

    // }
    // public function deleteitemfromcart($id )
    // {
    //     $cart = session()->get('cart');
    //     unset($cart[$id]);
    //     session()->put('cart', $cart);
    //     return redirect('cart');
    // }
    // public function deletecart( )
    // {
        
    //     session()->forget('cart');
    //     return redirect('/home');
    // }

    public function laporanpenagihan()
    {
        session()->forget('tagih');
        $tagih = session()->get('tagih');
        $data=DB::table('transaksis as t')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->where('t.status','=','Belum Bayar')
        ->select('t.id','c.namacustomer','t.total','t.jenispembayaran','t.tanggal','ps.tanggalpenjadwalan','t.status')
        ->get(); 
        
        $i = 0;
        foreach($data as $d)
        {
            $tanggalskrng = Carbon::now();
            $tgl = $tanggalskrng->toDateString();
            
            $tanggalpenagihan = $d->tanggalpenjadwalan;
            $tanggalpenagihan = Carbon::parse($tanggalpenagihan)->addDays(7);
            $tgltagih = $tanggalpenagihan->toDateString();
            
            if($tgl >= $tgltagih)
            {
                $tagih[$i]=[
                    'id'=> $d->id,
                    'nama'=>$d->namacustomer,
                    'total'=>$d->total,
                    'jenispembayaran'=>$d->jenispembayaran,
                    'tanggal'=>$d->tanggal,
                    'tanggalpenjadwalan'=>$d->tanggalpenjadwalan,
                    'status'=>$d->status
                ];
            }
            $i++;
            
        }
        session()->put('tagih',$tagih);
        // dd($tagih);
        
        return view('penagihan.penagihan',compact('data'));
    }
    public function alamat(Request $request)
    {
        $select = $request->get('value');
       
        $dependent = $request->get('dependent');
        $data_alamat = DB::table('customers as c')
            ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
            ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
            ->where('c.id','=',$select)
            ->get(); 
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        
        foreach($data_alamat as $row)
        {
        $output .= '<option value="'.$row->id.'">'.$row->alamatcustomer.' - '.$row->nomortelepon.'</option>';
        }
        echo $output;
    }
    public function lockdata(Request $request)
    {
        $return = [];
        $select = $request->get('value');
        //customer
        $data_customer = DB::table('customers as c')
            ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
            ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
            ->join('penjadwalans as p', 'p.customers_id','=','c.id')
            ->where('p.id','=',$select)
            ->get();     
        // dd($data_customer);
        foreach($data_customer as $row)
        {
        $output = '<option value="'.$row->id_customer.'">'.$row->namacustomer.'</option>';
        $hidden =  '<input class="form-control" type="number" value="'.$row->id_customer.'" id="customer_id" name="customer_id" hidden>';
        }
        $return[0] = [
            'output'=> $output,
            'hidden'=> $hidden,
        ];
        //pegawai
        $data_pegawai = DB::table('pegawaiserviss as ps')
            ->join('penjadwalans as p', 'p.id_pegawai','=','ps.id')
            ->where('p.id','=',$select)
            ->select('ps.id','ps.namapegawai')
            ->get();     

        foreach($data_pegawai as $row)
        {
        $output2 = '<option value="'.$row->id.'">'.$row->namapegawai.'</option>';
        $hidden2 =  '<input class="form-control" type="number" value="'.$row->id.'" id="pegawai_id" name="pegawai_id" hidden>';
        }
        $return[1] = [
            'output'=> $output2,
            'hidden'=> $hidden2,
        ];

        $dependent3 = "alamat";
        $data_alamat = DB::table('customers as c')
            ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
            ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
            ->join('penjadwalans as p', 'p.customers_id','=','c.id')
            ->where('p.id','=',$select)
            ->get(); 
        $output3 = '<option value="">Select '.ucfirst($dependent3).'</option>';
        
        foreach($data_alamat as $row)
        {
        $output3 .= '<option value="'.$row->id_detailcustomer.'">'.$row->alamatcustomer.' - '.$row->nomortelepon.'</option>';
        $hidden3 =  '<input class="form-control" type="number" value="'.$row->id_detailcustomer.'" id="alamat_id" name="alamat_id" hidden>';
        }
        $return[2] = [
            'output'=> $output3,
            'hidden'=> $hidden3,
        ];

       
        // echo $output;
        // echo $output2;
        echo json_encode($return);
    }
    public function showlisttagih()
    {
        return view('penagihan.listharustagih');
    }

    public function pengerjaan()
    {
     
        $data=DB::table('penjadwalans as p')
        ->join('pegawaiserviss as ps', 'ps.id', '=', 'p.id_pegawai')
        ->join('customers as c', 'c.id', '=', 'p.customers_id')
        ->join('kontak_customers as k', 'k.id_customer', '=', 'c.id')
        ->join('detailcustomers as d', 'd.id', '=', 'k.id_detailcustomer')
        ->join('transaksis as t', 't.id_penjadwalan', '=', 'p.id')
        ->where('t.status','=','Belum Bayar')
        ->orwhere('t.status','=','Proses Perbaikan')
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
                    'nomortelepon_pegawai'=>$d->nomortelepon,
                    'tanggalservis'=>$d->tanggalpenjadwalan,
                    'alamat'=>$d->alamatcustomer,
                 
                ];
            }
            $i++;
            
        }
        
        return view('pengerjaan.index',compact('datapengerjaan','i'));

    }

    public function laporanBulanan()
    {
        $data=DB::table('transaksis as t')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->whereMonth('tanggalpenjadwalan','=',Carbon::now()->month)
        ->where('status','=','Lunas')
        
        ->select('t.id','c.namacustomer','t.total','t.jenispembayaran','t.tanggal','ps.tanggalpenjadwalan','t.status')
        ->get(); 

        $data_transaksi_detail=DB::table('transaksis as t')
        ->join('detailtransaksis as dt', 'dt.id_transaksi', '=', 't.id')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->join('jenispelayanans as j','j.id','=','dt.id_jenispelayanan')
        ->whereMonth('tanggalpenjadwalan','=',Carbon::now()->month)
        
        ->select('t.id','j.namajenispelayanan')
        ->get(); 
  
        $data_pelayanan=DB::table('jenispelayanans')
        ->get();

        $listpelayanan =[];
        $count = 0;
        $countterbanyak =0;
        $nama_pelayanan="";
        $terbanyak ="";
        $i=0;
        
        foreach($data_pelayanan as $d)
        {   
            $count=0;
            $nama_pelayanan="";
            foreach($data_transaksi_detail as $dtd)
            {
               if($d->namajenispelayanan == $dtd->namajenispelayanan){
                   $count +=1 ;
                   $nama_pelayanan = $dtd->namajenispelayanan;
               }    
            }
            $listpelayanan[$i]=[
                'count'=>$count,
                'nama_pelayanan'=>$nama_pelayanan
            ];
            if($countterbanyak < $count)
            {
                $countterbanyak = $count;
                $terbanyak = $nama_pelayanan;
            }
            $i++;
        }
       $datapemasukan=DB::table('transaksis as t')
       ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->whereMonth('tanggalpenjadwalan','=',Carbon::now()->month)
        ->where('t.status','=','Lunas')
        ->get(); 
        
        $total= 0;
        foreach($datapemasukan as $d )
        {
            $total+= $d->total;
        }

        $datapengeluaran=DB::table('pengeluaran')
         ->whereMonth('tanggal','=',Carbon::now()->month)
       
        ->get(); 
        $total_pengeluaran= 0;
        foreach($datapengeluaran as $d )
        {
            $total_pengeluaran+= $d->jumlah;
        }
        return view('report.index',compact('data','countterbanyak','terbanyak','listpelayanan','total','total_pengeluaran'));
    }

    public function Lunas($id)
    {   
        $tanggalskrng = Carbon::now();
        $tgl = $tanggalskrng->toDateString();
        $t =Transaksi::find($id);
        $t->status="Lunas";
        $t->tanggal=$tgl;
        $t->jenispembayaran="Cash";
        $t->save();
        return redirect()->route('transaksi.index')->with('status','Status transaksi id: '.$t->id.' berhasil Diubah');
    }
    public function belumBayar($id)
    {
        $tanggalskrng = Carbon::now();
        $tgl = $tanggalskrng->toDateString();
        $t =Transaksi::find($id);
        $t->status="Belum Bayar";
        $t->tanggal=$tgl;
        $t->save();
        return redirect()->route('transaksi.index')->with('status','Status transaksi id: '.$t->id.' berhasil Diubah');
    }
    public function laporanbulanlain(Request $request)
    {
        $tgl = $request->get('Tanggal');
        $tahun = Carbon::createFromFormat('Y-m-d', $tgl)->year;
        $bulan = Carbon::createFromFormat('Y-m-d', $tgl)->month;
        $data=DB::table('transaksis as t')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->whereMonth('tanggal','=',$bulan)
        ->whereYear('tanggal','=',$tahun)
        ->select('t.id','c.namacustomer','t.total','t.jenispembayaran','t.tanggal','ps.tanggalpenjadwalan','t.status')
        ->get(); 

        $data_transaksi_detail=DB::table('transaksis as t')
        ->join('detailtransaksis as dt', 'dt.id_transaksi', '=', 't.id')
        ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->join('customers as c', 'c.id', '=', 't.id_customer')
        ->join('jenispelayanans as j','j.id','=','dt.id_jenispelayanan')
        ->whereMonth('tanggal','=',$bulan)
        ->whereYear('tanggal','=',$tahun)
        ->select('t.id','j.namajenispelayanan')
        ->get(); 
  
        $data_pelayanan=DB::table('jenispelayanans')
        ->get();

        $listpelayanan =[];
        $count = 0;
        $countterbanyak =0;
        $nama_pelayanan="";
        $terbanyak ="";
        $i=0;
        
        foreach($data_pelayanan as $d)
        {   
            $count=0;
            $nama_pelayanan="";
            foreach($data_transaksi_detail as $dtd)
            {
               if($d->namajenispelayanan == $dtd->namajenispelayanan){
                   $count +=1 ;
                   $nama_pelayanan = $dtd->namajenispelayanan;
               }    
            }
            $listpelayanan[$i]=[
                'count'=>$count,
                'nama_pelayanan'=>$nama_pelayanan
            ];
            if($countterbanyak < $count)
            {
                $countterbanyak = $count;
                $terbanyak = $nama_pelayanan;
            }
            $i++;
        }
       $datapemasukan=DB::table('transaksis as t')
       ->join('penjadwalans as ps', 'ps.id', '=', 't.id_penjadwalan')
        ->whereMonth('tanggal','=',$bulan)
        ->whereYear('tanggal','=',$tahun)
        ->get(); 
        
        $total= 0;
        foreach($datapemasukan as $d )
        {
            $total+= $d->total;
        }

        $datapengeluaran=DB::table('pengeluaran')
         ->whereMonth('tanggal','=',$bulan)
         ->whereYear('tanggal','=',$tahun)
       
        ->get(); 
        $total_pengeluaran= 0;
        foreach($datapengeluaran as $d )
        {
            $total_pengeluaran+= $d->jumlah;
        }
        // dd($data);
        return view('report.index',compact('data','countterbanyak','terbanyak','listpelayanan','total','total_pengeluaran'));
    }
    
}
