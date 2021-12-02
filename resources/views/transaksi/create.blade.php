@extends('layout.xoric')

@section('tempat_konten')
<style>
.myText {
    color: white;

}
</style>

<script>
   var count = 0;
    
    function tambahtransaksi(){
        count++;
       $('#jumlahtambahan').val(count);
        var countbaru = count;
        var counttambah=countbaru+1;
        var items =
        
        "<div class='form-group transaksi"+countbaru+"'>"+
        "<label>Jenis Pelayanan "+counttambah+"</label>"+
                        "<div>"+
                            "<select class='form-control' id='jenis_pel_"+countbaru+"' name='jenis_pel_"+countbaru+"'>"+
                                "@foreach($data_pelayanan as $k)"+
                                "<option value='{{$k->id}}'>{{$k->namajenispelayanan}}</option>"+
                                "@endforeach"+
                            "</select>"+
                        "</div>"+
                    "</div>"+
                    "<div class='form-group transaksi"+countbaru+"'>"+
                        "<label>Deskripsi Pelayanan "+counttambah+"</label>"+
                        "<div>"+

                            "<textarea class='form-control' value='' id='Deskripsi_"+countbaru+"' name='Deskripsi_"+countbaru+"'>"+"</textarea>"+
                        "</div>"+
                    "</div>"+


                    "<div class='form-group transaksi"+countbaru+"'>"+
                        "<label>Subtotal Pembayaran "+counttambah+"</label>"+
                        "<div>"+
                        "<input class='form-control' type='number' value='0' id='total_"+countbaru+"' name='total_"+countbaru+"'>"+
                        "</div>"+
                    "</div>";
        
        $('.tambahan').append(items);
    }
    function deletetransaksi(){
        $("div").remove(".transaksi"+count);
        if(count > 0)
        {
            count--;
        }
      
       $('#jumlahtambahan').val(count);     
       
    }



</script>

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Create Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                    <li class="breadcrumb-item active">Tambah Transaksi</li>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">insert Transaksi Baru</h4>

         
                <form method="POST" action="{{route('transaksi.store')}}">
                @csrf
                     <div class="form-group">
                        <label>Jadwal Pelayanan</label>                    
                        <div>
                            <div class="">
                                <select class="form-control dynamicjadwal" id="jadwal" name="jadwal"  data-dependent1="customer"  data-dependent2="pegawai" data-dependent3="alamat">
                                <option value=''>select Jadwal</option>    
                                @foreach($data_jadwal as $s)
                                    <option value='{{$s->id}}'>{{$s->tanggalpenjadwalan}} - {{$s->namapegawai}} |
                                        customer : {{$s->namacustomer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Customer</label>               
                        <div>
                            <select class="form-control dynamic" id="customer" name="customer" data-dependent="alamat" disabled>
                             <option value=''>select Jadwal</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="customer_id" name="customer_id" hidden>
                        </div>
                    </div>

                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Alamat dan Nomor telepon Pelanggan</label>
                        <div>
                            <select class="form-control" id="alamat" name="alamat">
                                <option value=''>select name</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="alamat_id" name="alamat_id" hidden>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai" disabled>
                                <option value=''>select Jadwal</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="pegawai_id" name="pegawai_id" hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <div>
                            <select class="form-control" id="jenis_pel_0" name="jenis_pel_0">
                                @foreach($data_pelayanan as $k)
                                <option value='{{$k->id}}'>{{$k->namajenispelayanan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pelayanan</label>
                        <div>

                            <textarea class="form-control" value="" id="Deskripsi_0" name="Deskripsi_0"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Subtotal Pembayaran</label>
                        <div>
                            <input class="form-control" type="number" value="0" id="total_0" name="total_0">
                        </div>
                    </div>
                
                    <!-- untuk tambah transaksi -->
                    <div class="form-group tambahan">
                        
                    </div>


                
                    <a onClick='tambahtransaksi()' id="buttontambah" style="color:white;" class="btn btn-success waves-effect waves-light mr-1">
                                + tambah transaksi
</a>   
<a onClick='deletetransaksi()' id="buttondelete" style="color:white;" class="btn btn-danger waves-effect waves-light mr-1">
                                - delete transaksi
</a>   
                
                    <div class="form-group">
                            
                            <div>
                                <input class="form-control " type="text" value="0" id="jumlahtambahan"
                                    name="jumlahtambahan" hidden>

                            </div>
                        </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                          
                            <button type="reset" class="btn btn-secondary waves-effect">
                                <a href="/" class="myText">Cancel</a>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

</div>

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