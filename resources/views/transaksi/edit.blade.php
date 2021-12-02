@extends('layout.xoric')

@section('tempat_konten')
<style>
.myText {
    color: white;
}
</style>

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Create Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Validation</li>
                </ol>
                <br>
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">

                </div>
            </div>
        </div>

    </div>
</div>
<form method="POST" action="{{url('transaksi/'.$data[0]->id)}}">
    @csrf
    @method("PUT")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Transaksi </h4>

                    <div class="form-group">
                        <label>Jadwal Pelayanan</label>
                        <div>
                            <div class="">
                                <select class="form-control dynamicjadwal" id="jadwal" name="jadwal"
                                    data-dependent1="customer" data-dependent2="pegawai" data-dependent3="alamat">
                                    <option value=''>select Jadwal</option>
                                    @foreach($data_jadwal as $s)
                                    @if($data[0]->id_penjadwalan == $s->id)
                                    <option value='{{$s->id}}' selected>{{$s->tanggalpenjadwalan}} - {{$s->namapegawai}}
                                        |
                                        customer : {{$s->namacustomer}}</option>
                                    @endif
                                    @endforeach

                                    @foreach($data_jadwal_semua as $sm)

                                    <option value='{{$sm->id}}'>{{$sm->tanggalpenjadwalan}} - {{$sm->namapegawai}}
                                        |
                                        customer : {{$sm->namacustomer}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Customer</label>
                        <div>
                            <select class="form-control dynamic" id="customer" name="customer" data-dependent="alamat"
                                disabled>
                                @foreach($data_customer as $c)

                                <option value='{{$c->id_customer}}' selected>{{$c->namacustomer}}</option>

                           
                            </select>
                            <input class="form-control" type="number" value="{{$c->id_customer}}" id="customer_id" name="customer_id"
                                hidden>     @endforeach
                        </div>
                    </div>

                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Alamat dan Nomor telepon Pelanggan</label>
                        <div>
                            <select class="form-control" id="alamat" name="alamat">
                            @foreach($data_alamat as $c)
                            <option value='{{$c->id_detailcustomer}}' selected>{{$c->alamatcustomer}} - {{$c->nomortelepon}}</option>
                            </select>
                            <input class="form-control" type="number" value="{{$c->id_detailcustomer}}" id="alamat_id" name="alamat_id" hidden>
                            @endforeach
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai" disabled>
                            @foreach($data_pegawai as $p)
                                @if($data[0]->id_pegawai == $p->id)
                                <option value='{{$p->id}}' selected>{{$p->namapegawai}} </option>
                            </select>
                            <input class="form-control" type="number" value="{{$c->id}}" id="pegawai_id" name="pegawai_id"
                                hidden>
                                @endif
                                @endforeach
                        </div>
                    </div>

                    <div class="form-group bayar">
                    
                        <label>Jenis Pembayaran</label>
                        <div>
                            <input type="text" id="jenis_bayar" class="form-control" name="jenis_bayar" value='{{$data[0]->jenispembayaran}}'
                                placeholder="Masukan Jenis Pembayaran" />
                        </div>
                    </div>

                    <div class="form-group bayar">
                        <label>Tanggal Pembayaran</label>
                        <div>
                            <input class="form-control" type="date" value="{{$data[0]->tanggal}}" id="tanggal_bayar"
                                name="tanggal_bayar">
                        </div>
                    </div>

                                
                    <div class="form-group">
                        <label>Status </label>
                        <div>
                            <select class="form-control" id="Status" name="Status">
                            @if($data[0]->status == "Lunas")
                                <option value='Dijadwalkan'>Dijadwalkan</option>
                                <option value='Belum Bayar'>Belum Bayar</option>
                                <option value='Lunas' selected>Lunas</option>
                            @elseif($data[0]->status == "Belum Bayar")
                            <option value='Dijadwalkan'>Dijadwalkan</option>
                                <option value='Belum Bayar' selected>Belum Bayar</option>
                                <option value='Lunas' >Lunas</option>
                            @else
                            <option value='Dijadwalkan'selected>Dijadwalkan</option>
                            <option value='Belum Bayar' >Belum Bayar</option>
                            <option value='Lunas' >Lunas</option>
                            @endif
                            
                            </select>

                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <?php $count=0;?>
    @foreach($data as $d)
    <?php $count+=1;?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h2>Data {{$count}}</h2>
                <div class="card-body">
                    <div class="form-group" style="display: none">
                        <label>ID data</label>
                        <div>
                            <input class="form-control" type="number" value="{{$count}}" id="id{{$d->id_detail}}"
                                name="id{{$d->id_detail}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <div>
                            <select class="form-control" id="jenis_pel{{$d->id_detail}}"
                                name="jenis_pel{{$d->id_detail}}">
                                @foreach($data_pelayanan as $k)
                                @if($d->id_jenispelayanan==$k->id)
                                <option value='{{$k->id}}' selected>{{$k->namajenispelayanan}}</option>
                                @else
                                <option value='{{$k->id}}'>{{$k->namajenispelayanan}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pelayanan</label>
                        <div>

                            <textarea class="form-control" id="Deskripsi{{$d->id_detail}}"
                                name="Deskripsi{{$d->id_detail}}">{{$d->deskripsipelayanan}}</textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Subtotal</label>
                        <div>
                            <input class="form-control" type="number" value="{{$d->subtotal}}"
                                id="total{{$d->id_detail}}" name="total{{$d->id_detail}}">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    @endforeach
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: none">
                        <label>total data</label>
                        <div>
                            <input class="form-control" type="number" value="{{$count}}" id="totaldata"
                                name="totaldata">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                            <!-- <a href="{{url('add-to-cart/')}}" class="btn btn-primary" role="button">Add to cart</a>  -->
                            <button type="reset" class="btn btn-secondary waves-effect">
                                <a href="/" class="myText">Cancel</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</form>
@endsection
@section('tempat_script')
<script>
$(document).ready(function() {
    // function tambahtransaksi(){
    //     
    //     var items =
    //     "<div class='form-group'>"+
    //     "<label>Jenis Pelayanan</label>"+
    //                     "<div>"+
    //                         "<select class='form-control' id='jenis_pel_' name='jenis_pel_'>"+
    //                             "@foreach($data_pelayanan as $k)"+
    //                             "<option value='{{$k->id}}'>{{$k->namajenispelayanan}}</option>"+
    //                             "@endforeach"+
    //                         "</select>"+
    //                     "</div>"+
    //                 "</div>"+
    //                 "<div class='form-group'>"+
    //                     "<label>Deskripsi Pelayanan</label>"+
    //                     "<div>"+

    //                         "<textarea class='form-control' value='' id='Deskripsi_' name='Deskripsi_'>"
    //                         "</textarea>"+
    //                     "</div>"+
    //                 "</div>";
        
    //     $('.tambahan').append(items);
    // }
    // $('.dynamicjadwal').change(function() {
    //     if ($(this).val() != '') {
    //         var select = $('.dynamic').attr('id');
    //         var value = $('.dynamic').val();
    //         var dependent = $('#Customer').data('dependent');
    //         var _token = $('input[name="_token"]').val();
    //         $.ajax({
    //             url: "{{route('transaksi.alamat')}}",
    //             method: "POST",
    //             data: {
    //                 select: select,
    //                 value: value,
    //                 _token: _token,
    //                 dependent: dependent
    //             },
    //             success: function(result) {
    //                 $('#' + dependent).html(result);
    //                 console.log(result);
    //             }
    //         })
    //     }
    // });

    $('.dynamicjadwal').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr('id');
            var value = $(this).val();
            var dependent1 = $(this).data('dependent1');
            var dependent2 = $(this).data('dependent2');
            var dependent3 = $(this).data('dependent3');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('transaksi.lockdata')}}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                 
                },
                success: function(result) {
                    var json = $.parseJSON(result);
                    $('#' + dependent1).html(json[0].output);
                     $('#' + dependent2).html(json[1].output);
                     $('#' + dependent3).html(json[2].output);

                     $('#customer_id').html(json[0].hidden);
                     $('#pegawai_id').html(json[1].hidden);
                     $('#alamat_id').html(json[2].hidden);
                    console.log(json[1].output);
                    
                }
            })
        }
    });
    
   

});
</script>
@endsection