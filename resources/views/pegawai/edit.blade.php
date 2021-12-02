
@extends('layout.xoric')

@section('tempat_konten') 
<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Create Pegawai</h4>
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
            
                                            <h4 class="header-title">Edit Pegawai</h4>
                                            
            
                                            <form method="POST" action="{{url('pegawai/'.$pegawai->id)}}">
                                              @csrf
                                              @method("PUT")
            
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <div>
                                                        <input type="text" id="nama" class="form-control" required value="{{$pegawai->namapegawai}}" name="nama"
                                                                placeholder="Masukan Nama"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor Telepon Pegawai</label>
                                                    <div>
                                                        <input type="number" id="nomor" class="form-control" required name="nomor" value="{{$pegawai->nomortelepon}}"
                                                                placeholder="Masukan Nama"/>
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