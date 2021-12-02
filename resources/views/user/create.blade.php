
@extends('layout.xoric')

@section('tempat_konten') 
<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Create User</h4>
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
            
                                            <h4 class="header-title">insert User</h4>
                                            
            
                                            <form method="POST" action="{{route('user.store')}}">
                                             @csrf
            
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <div>
                                                        <input type="text" id="username" class="form-control" required name="username"
                                                                placeholder="Masukan Username"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div>
                                                        <input type="password" id="password" class="form-control" required name="password"
                                                                placeholder="Masukan Password"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <div>
                                                        <input type="text" id="nama" class="form-control" required name="nama"
                                                                placeholder="Masukan Nama"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div>
                                                        <input type="text" id="Status" class="form-control" required name="Status"
                                                                placeholder="Masukan Status"/>
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