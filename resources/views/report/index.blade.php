@extends('layout.xoric')

@section('tempat_konten')
<?php $bulan = 0; 
 $curmonth = date('m');
 $tgl = now();
 ?>

<script>
var selected = 1;
</script>
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
                
                                <h4 class="font-size-14" style="color:white;">Custom Filter</h4>
                                <label style="color:white;">Pilih Bulan dan Tahun Pengeluaran</label>
                                <div class="row">
                                    <form method='POST' action="{{route('filterLaporan')}}">
                                        @csrf
                                        <div class="">
                                            <input class="form-control" type="date" value="<?php echo $tgl?>" id="Tanggal"
                                                name="Tanggal">
                                        </div>

                                        <div id="btnsearch">
                                            <input type="submit" value="Search" id="buttonsearch" style="color:white;"
                                                class="btn btn-success waves-effect waves-light mr-1">

                                        </div>
                                    </form>
                                </div>
                           
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="alert alert-success">
        Jenis Pelayanan yang sering dipesan bulan ini : <b>{{$terbanyak}}</b> dengan pesananan sebanyak <b>{{$countterbanyak}}</b> 
    </div>
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
                                @if(!empty($d->tanggalbayar))
                                {{ $d->tanggalbayar }}
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

        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Jenis Pelayanan yang paling sering dipesan bulan ini</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Pelayanan</th>
                            <th>Total Pemesanan </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                   
                        @foreach($listpelayanan as $pelayanan)
                       
                        <tr>
                        @if($pelayanan['nama_pelayanan'] == ""|| $pelayanan['nama_pelayanan'] == null)
                            <td>-</td>
                        @else
                            <td>{{$pelayanan['nama_pelayanan']}}</td>
                        @endif
                            <td>{{$pelayanan['count']}}</td>
                            
                            
                        </tr>
                        @endforeach
                    
                    </tbody>
                    
                </table>
            </div>
        </div>

        <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Monthy sale Report</h5>
                                            <div class="media">
                                                <div class="media-body">
                                                <div class='row'>
                                                    <p class="text-muted mb-2">&nbsp Pendapatan bulan ini</p> &emsp; &emsp; &emsp; &emsp; &emsp;
                                                    <p class="text-muted mb-2">&nbsp Pengeluaaran bulan ini</p>
                                                </div>
                                                    <div class='row'>
                                                    <h4>&nbsp Rp {{$total}}</h4> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;

                                                    
                                                    <h4>&nbsp Rp {{$total_pengeluaran}}</h4> 
                                                    </div>
                                                </div>
                                                <div dir="ltr" class="ml-2">
                                                    <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                                    data-fgColor="#3051d3" value="100" data-skin="tron" data-angleOffset="56"
                                                    data-readOnly=true data-thickness=".17" />
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
    </div> <!-- end col -->
</div>

<!-- end page title end breadcrumb -->


@endsection
@section('tempat_script')
<script>
$(document).ready(function() {

   
    $('#datatable-buttons').DataTable();
    // $('.dynamicjadwal').on('change', function(e) {
    //     if ($(this).val() != '') {
    //         var select = $(this).attr('id');
    //         var value = $(this).val();
    //         selected = value;
    //         $('#btnsearch').html("");
    //         var items = "<a href='/Laporan/" + selected + "' id='buttonsearch ' style='color: white;'" +
    //             "class='btn btn-success waves-effect waves-light mr-1'>" +
    //             "search" +
    //             "</a>";
    //         $('#btnsearch').html(items);
    //     }
    //     console.log("test");
    });
    

});
</script>

@endsection