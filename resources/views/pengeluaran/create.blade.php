@extends('layout.xoric')

<script>
   var count = 0;
    
    function tambahtransaksi(){
        count++;
       $('#jumlahtambahan').val(count);
        var countbaru = count;
        var counttambah=countbaru+1;
        var items =
        
                    '<div class="form-group">'
                    +'<label>Jumlah '+counttambah+'</label>'
                        +'<div>'
                        +"<input type='number' id='Jumlah_'"+countbaru+"' class='form-control' required name='Jumlah_"+countbaru+"'"
                            +"placeholder='Masukan Jumlah Pengeluaran "+counttambah+"' />"
                                +"</div>"
                        +'</div>'
                    +'<div class="form-group">'
                    +'<label>Keterangan '+counttambah+'</label>'
                        +'<div>'

                        +'<textarea class="form-control" value="" id="Keterangan_'+countbaru+'" name="Keterangan_'+countbaru+'" placeholder="Tambahkan Keterangan Pengeluaran" ></textarea>'
                        +'</div>'
                    +'</div>';
        
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

@section('tempat_konten')
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Create Pengeluaran</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Validation</li>
                </ol>
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

                <h4 class="header-title">insert Pengeluaran</h4>


                <form method="POST" action="{{route('pengeluaran.store')}}">
                    @csrf

                    <div class="form-group bayar">
                        <label>Tanggal </label>
                        <div>
                            <input class="form-control" type="date" value="null" id="Tanggal_0" name="Tanggal_0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <div>
                            <input type="number" id="Jumlah_0" class="form-control" required name="Jumlah_0"
                                placeholder="Masukan Jumlah Pengeluaran" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div>

                            <textarea class="form-control" value="" id="Keterangan_0" name="Keterangan_0" placeholder="Tambahkan Keterangan Pengeluaran" ></textarea>
                        </div>
                    </div>

                                        <!-- untuk tambah transaksi -->
                                        <div class="form-group tambahan">
                        
                        </div>
    
    
                    
                        <a onClick='tambahtransaksi()' id="buttontambah" style="color:white;" class="btn btn-success waves-effect waves-light mr-1">
                                    + Tambah Pengeluaran
    </a>   
    <a onClick='deletetransaksi()' id="buttondelete" style="color:white;" class="btn btn-danger waves-effect waves-light mr-1">
                                    - Delete Pengeluaran
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
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

</div>

@endsection