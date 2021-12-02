@extends('layout.xoric')

@section('tempat_konten')

<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">User</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">List User</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="{{route('user.create')}}" class="btn btn-success">
                    + Tambah Data User
                    </a>
                    <br>
@if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif
                    </div>
                
                    <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">List User</h4>
                                          
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                              <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Nama User</th>
                                                <th>Status</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $d)
                                              <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->username}}</td> 
                                                <td>{{$d->namauser}}</td>
                                                <td>{{$d->status}}</td>   
                                                <td>
                                                  <a href="{{url('user/'.$d->id.'/edit')}}" class='btn btn-xs btn-info'>edit</a>
                                                  </td>
                                              </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> 

                    <!-- end page title end breadcrumb -->

                  


@endsection

