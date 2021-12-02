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
                    <li class="breadcrumb-item active">List Transaksi yang belum lunas</li>
                </ol>
            </div>
            <div class="col-md-8">
                <div class="float-right d-none d-md-block">
                    <!-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                        <button class="btn btn-light btn-rounded" type="button" id="searchBtn">search
                        </button>
                    </form> -->



                </div>
            </div>
        </div>

    </div>

    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <br>
    <?php $total=0; ?>
    @if(session('tagih'))
    @foreach(session()->get('tagih') as $key => $details)
    <?php $total++ ?>

    @endforeach
    <div class="alert alert-danger">
        <a href="{{route('transaksi.showlisttagih')}}"> total ada {{$total}} pelanggan yang harus ditagih </a>
    </div>
    <!-- @foreach(session()->get('tagih') as $key => $details)
    <div class="alert alert-primary">
        Customer : {{$details['nama']}} belum membayar tagihan
    </div>

    @endforeach -->
    @endif
</div>

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">List Transaksi</h4>


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
            </div> <!-- end col -->
        </div>

    </div>
</div>

<!-- end page title end breadcrumb -->




@endsection

@section('tempat_script')
<script>
function highlight(element, string, search, originalString) {
    if (search.length > 0) {
        var regex = new RegExp(search, "g");
        newString = string.replace(regex, "<span class='highlight'" + search + "</span>");
        elemen.innerHTML = newString;
    } else {
        element.innerHtml= originalString;
    }

}
var content = $("#content").val();
var searchInput = $("#searchInput").val();
var searchBtn = $("#searchBtn").val();
var originalContent = content.innerText;

$("#searchBtn").click(function () {
    highlight(content,content.innerText,searchInput.value,originalContent);
})
</script>
@endsection