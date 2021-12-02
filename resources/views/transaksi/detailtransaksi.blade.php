@extends('layout.xoric')

@section('tempat_konten')

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Detail Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Detail Transaksi</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">

                    <button class="btn btn-light btn-rounded " type="button">
                        <a href="/transaksi">Back</a>

                    </button>


                </div>
            </div>
        </div>

    </div>
    <a href="{{route('transaksi.edit',$data[0]->id)}}" class="btn btn-warning">
        + Edit Data Transaksi
    </a>
    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>Total</th>
                            <th>Jenis Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal Pengerjaan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data[0]->id}}</td>
                            <td>{{$data[0]->namacustomer}}</td>
                            <td>{{$data[0]->total}}</td>
                            <td>
                                @if(!empty($data[0]->jenispembayaran))
                                {{ $data[0]->jenispembayaran }}
                                @else
                                Belum Bayar
                                @endif
                            </td>
                            <td>
                                @if(!empty($data[0]->tanggal))
                                {{ $data[0]->tanggal }}
                                @else
                                Belum Bayar
                                @endif
                            </td>

                            <td>
                                @if($data[0]->status == "Lunas")
                                <div class="badge badge-soft-success">{{$data[0]->status}}</div>
                                @elseif($data[0]->status == "Belum Bayar")
                                <div class="badge badge-soft-danger">{{$data[0]->status}}</div>
                                @else
                                <div class="badge badge-soft-primary">{{$data[0]->status}} </div>
                                @endif
                            </td>
                            <td>
                                {{$data[0]->tanggalpenjadwalan}}
                            </td>
                            <td>
                                @if($data[0]->status == "Belum Bayar")
                                <form method='POST' action="{{url('Lunas/'.$data[0]->id)}}">
                                @csrf
                                <input type="submit" value="Lunas" class='btn btn-xs btn-success'
                                onclick="if(!confirm('apakah yakin transaksi sudah lunas ?')) return false;">
                                </form>
                               
                                
                                @elseif($data[0]->status == "Dijadwalkan")
                                
                                <form method='POST' action="{{url('Lunas/'.$data[0]->id)}}">
                                @csrf
                                <input type="submit" value="Lunas" class='btn btn-xs btn-success'
                                onclick="if(!confirm('apakah yakin transaksi sudah lunas ?')) return false;">
                                </form>
                                
                                <form method='POST' action="{{url('belumBayar/'.$data[0]->id)}}">
                                @csrf
                                <input type="submit" value="Belum Bayar" class='btn btn-xs btn-danger'
                                onclick="if(!confirm('apakah yakin proses perbaikan sudah selesai ?')) return false;">
                                </form>
                               
                                
                                
                                @else
                                
                                <a> </a>
                                
                                @endif

                            </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Alamat</th>
                            <th>No Telp.</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data_customer[0]->alamatcustomer}}</td>
                            <td>{{$data_customer[0]->nomortelepon}}</td>



                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Detail Transaksi</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>

                            <th>Nama Pelayanan</th>
                            <th>Deskripsi </th>
                            <th>Pegawai</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody> @foreach($data as $d)
                        <tr>
                            <td>{{$d->namajenispelayanan}}</td>
                            <td>{{$d->deskripsipelayanan}}</td>
                            <td>{{$d->namapegawai}}</td>
                            <td>{{$d->subtotal}}</td>
                            <td>

                                <!-- <a href="{{route('detailTransaksi.edit', $d->id)}}" class='btn btn-xs btn-info'>Edit -->
                                </a>
                                <form method='POST' action="{{url('detailTransaksi/'.$d->iddetail)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class='btn btn-xs btn-danger'
                                        onclick="if(!confirm('are you sure to delete this record ?')) return false;">
                                </form>
                            </td>



                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>



@endsection