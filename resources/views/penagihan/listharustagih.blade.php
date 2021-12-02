@extends('layout.xoric')

@section('tempat_konten')
<style>
.highlight {
    background-color: yellow;
}
</style>
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Penagihan</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">List Transaksi yang harus ditagih</li>
                </ol>
            </div>
            <!-- <div class="col-md-8">
                <div class="float-right d-none d-md-block"> -->
                    <!-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                        <button class="btn btn-light btn-rounded" type="button" id="searchBtn">search
                        </button>
                    </form> -->



                <!-- </div>
            </div> -->
        </div>

    </div>

    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
 
</div>

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">List yang sudah melewati masa bayar</h4>


                        <table id="datatable-buttons content" class="table table-striped table-bordered dt-responsive nowrap"
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(session()->get('tagih') as $key => $details)
                                <tr>
                                    <td>{{$details['id']}}</td>
                                    <td>{{$details['nama']}}</td>
                                    <td>{{$details['total']}}</td>
                                    <td>
                                        @if(!empty($details['jenispembayaran']))
                                        {{ $details['jenispembayaran']}}
                                        @else
                                        Belum Bayar
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($details['tanggalbayar']))
                                        {{ $details['tanggalbayar'] }}
                                        @else
                                        Belum Bayar
                                        @endif
                                    </td>

                                    <td>
                                        @if($details['status'] == "Lunas")
                                        <div class="badge badge-soft-success">{{$details['status']}}</div>
                                        @elseif($details['status'] == "Belum Bayar")
                                        <div class="badge badge-soft-danger">{{$details['status']}}</div>
                                        @else
                                        <div class="badge badge-soft-primary">{{$details['status']}}</div>
                                        @endif
                                    </td>
                                    <td>{{$details['tanggalpenjadwalan']}}</td>
                                    <td>

                                        <a href="{{route('transaksi.show', $details['id'])}}" class='btn btn-xs btn-info'>Show
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

    </div>
</div>

<!-- end page title end breadcrumb -->




@endsection

@section('tempat_script')
<script>

</script>
@endsection