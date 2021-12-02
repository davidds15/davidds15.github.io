@extends('layout.xoric')

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


                <form method="POST" action="{{url('pengeluaran/'.$data->id)}}">
                @csrf
                @method("PUT")

                    <div class="form-group bayar">
                        <label>Tanggal </label>
                        <div>
                            <input class="form-control" type="date" value="{{$data->tanggal}}" id="Tanggal" name="Tanggal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <div>
                            <input type="number" id="Jumlah" class="form-control" required name="Jumlah"
                                placeholder="Masukan Nama" value="{{$data->jumlah}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div>

                            <textarea class="form-control" value="" id="Keterangan" name="Keterangan" >{{$data->keterangan}}</textarea>
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