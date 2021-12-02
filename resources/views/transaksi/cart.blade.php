@extends('layout.xoric')

@section('tempat_konten')
<style>
.myTable {
    width: 100%;
}
</style>
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-md-8">
                <h4 class="page-title mb-1">Cart</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </div>





            <div class="col-md-4">
                <div class="float-right d-none d-md-block">

                </div>
            </div>
        </div>

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('cart'))
                        <h5 class="header-title mb-4">Cart | Customer : {{session('cart')[0]['namacustomer']}}</h5>





                        @endif
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:30%">Jenis Pelayanan</th>
                                    <th style="width:30%">Deskripsi Pelayanan</th>
                                    <th style="width:20%">subtotal</th>
                                    <th style="width:20%">pegawai</th>
                                    <th style="width:20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0; ?>
                                @if(session('cart'))
                                @foreach(session()->get('cart') as $key => $details)
                                <?php $total+=$details['total']; ?>
                                <tr>
                                    <td data-th="jenis">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $details['namapelayanan'] }}</h4>

                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Deskripsi">{{ $details['deskripsipelayanan'] }}
                                    </td>
                                    <td data-th="total">Rp. {{ $details['total'] }}</td>
                                    <td data-th="Pegawai"> {{ $details['pegawai'] }}</td>

                                    <td class="actions" data-th="">
                                        <a href="/deleteitemfromcart/{{$key}}" class="btn btn-danger btn-sm"
                                            onclick="if(!confirm('are you sure want to delete this ?')) return false;"><i
                                                class="mdi mdi-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><a href="{{ url('/') }}" class="btn btn-warning"><i
                                                class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                    <td colspan="2" class="hidden-xs"></td>

                                    <td class="hidden-xs text-center"><strong>Total Rp. {{$total}}</strong></td>

                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        @if(session('cart'))
                        <div class="form-group">
                            <label>Alamat</label>
                            <div>
                                <input class="form-control " type="text" value="{{session('cart')[0]['alamat']}}" id=""
                                    name="" disabled>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>No telp</label>
                            <div>
                                <input class="form-control " type="text" value="{{session('cart')[0]['notelp']}}" id=""
                                    name="" disabled>


                            </div>
                        </div>
                        @endif
                        <form action="{{route('submitcheckout')}}">
                                <div class="col-sm-6">
                                                    <div class="mt-4 mt-sm-0">
                                                        <div class="custom-control custom-checkbox mb-2">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" >
                                                            <label class="custom-control-label" for="customCheck1">Bayar</label>
                                                        </div>
                                                    </div>
                                                </div>
                            <div class="form-group bayar" style="display: none">

                                <label>Jenis Pembayaran</label>
                                <div>
                                    <input type="text" id="jenis_bayar" class="form-control" name="jenis_bayar"
                                        placeholder="Masukan Jenis Pembayaran" />
                                </div>
                            </div>

                            <div class="form-group bayar" style="display: none">
                                <label>Tanggal Pembayaran</label>
                                <div>
                                    <input class="form-control" type="date" value="null" id="tanggal_bayar"
                                        name="tanggal_bayar">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status </label>
                                <div>
                                    <select class="form-control" id="Status" name="Status">
                                        <option value='Dijadwalkan'>Dijadwalkan</option>
                                        <option value='Proses Perbaikan'>Proses Perbaikan</option>
                                        <option value='Belum Bayar'>Belum Bayar</option>
                                        <option value='Lunas'>Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit <i class="fa fa-angle-right"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('tempat_script')
<script>
$(document).ready(function() {
    $('#customCheck1').change(function() {
        if ($(this).is(':checked')) {
           $('.bayar').show();
          
        }
        else{
            $('.bayar').hide();
           
        }
    });


});
</script>
@endsection