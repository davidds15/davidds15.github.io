@extends('layout.xoric')

@section('tempat_konten')
<!-- <script>

    $('#datatable').DataTable();
    
   


</script> -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Riwayat Transaksi</li>
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
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Riwayat Transaksi</h4>


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
                            <th>Detail</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->namacustomer}}</td>
                            <td>{{$d->total}}</td>
                            <td>
                                @if(!empty($d->jenispembayaran))
                                {{ $d->jenispembayaran }}
                                @else
                                Belum Bayar
                                @endif
                            </td>
                            <td>
                                @if(!empty($d->tanggal))
                                {{ $d->tanggal }}
                                @else
                                Belum Bayar
                                @endif
                            </td>

                            <td>
                                @if($d->status == "Lunas")
                                <div class="badge badge-soft-success">{{$d->status}}</div>
                                @elseif($d->status == "Belum Bayar")
                                <div class="badge badge-soft-danger">{{$d->status}}</div>
                                @else
                                <div class="badge badge-soft-primary">{{$d->status}}</div>
                                @endif
                            </td>
                            <td>{{$d->tanggalpenjadwalan}}</td>
                            <td>
                                
                                <a href="{{route('transaksi.show', $d->id)}}" class='btn btn-xs btn-info'>Show
                                    detail</a>
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
@section('tempat_script')
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
    
   

});
</script>
@endsection
