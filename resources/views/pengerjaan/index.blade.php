@extends('layout.xoric')

@section('tempat_konten')

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Pengerjaan</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pengerjaan Hari ini</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                </div>
            </div>
        </div>

    </div>
    <a href="{{route('transaksi.create')}}" class="btn btn-success">
        + Tambah Data Transaksi
    </a>
    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <br>
    <div class="alert alert-success">
        Data Pengerjaan Pada Hari Ini
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Pengerjaan</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                
                        <tr>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>Nama Pegawai</th>
                            <th>Nomor Telepon Pegawai</th>
                            <th>Tanggal Servis</th>
                            <th>Alamat Customer</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                   

                        @foreach($datapengerjaan as $data => $d)
                        <tr>
                            <td>{{$d['id']}}</td>
                            <td>{{$d['nama_customer']}}</td>
                            <td>{{$d['nama_pegawai']}}</td>
                            <td>
          
                                {{ $d['nomortelepon_pegawai'] }}
                            </td>
                            <td>
       
                                {{ $d['tanggalservis'] }}
                           
                            </td>
                            <td>{{$d['alamat']}}</td>
                            <td>
                                
                            
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<!-- end page title end breadcrumb -->




@endsection