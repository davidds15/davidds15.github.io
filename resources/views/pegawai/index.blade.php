@extends('layout.xoric')

@section('tempat_konten')

<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Pegawai</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Insert Pegawai</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="{{route('pegawai.create')}}" class="btn btn-success">
                      
                    + Tambah Data Pegawai
                    </a>
                    <br>
                      @if(session('status'))
                      <br>
                      <div class="alert alert-success">
                        {{session('status')}}
                      </div>
                      @endif
                    </div>
                
                    <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">List Customer</h4>
                                          
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                              <tr>
                                                <th>ID</th>
                                                <th>Nama Pegawai</th>
                                                <th>Nomor Telepon</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $d)
                                              <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->namapegawai}}</td>
                                                <td>{{$d->nomortelepon}}</td>
                                                <td>
                                                  <a href="{{url('pegawai/'.$d->id.'/edit')}}" class='btn btn-xs btn-info'>edit</a>
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

@section('tempat_css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />     

@endsection

@section('tempat_js')
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>




@endsection