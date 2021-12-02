@extends('layout.xoric')

@section('tempat_konten')

<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Customer</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Insert Customer</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="{{route('customer.create')}}" class="btn btn-success">
                    + Tambah Data Customer
                    </a>
                    <br>
                    <br>
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
                                                <th>Nama Customer</th>
                                                <th>Alamat</th>
                                                <th>No. Telp</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                              </tr>
                                            </thead>
            
            
                                            <tbody>
                                              @foreach($data as $d)
                                                <tr>
                                                  <td>{{$d->id}}</td>
                                                  <td>{{$d->namacustomer}}</td>
                                                  <td>{{$d->alamatcustomer}}</td>
                                                  <td>{{$d->nomortelepon}}</td>
                                                  <td>
                                                  <a href="{{url('customer/'.$d->id.'/edit')}}" class='btn btn-xs btn-info'>edit</a>
                                                  </td>
                                                  <td>                                                   
                                                    <form method='POST' action="{{url('customer/'.$d->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class='btn btn-xs btn-danger'
                                                    onclick="if(!confirm('are you sure to delete this record ?')) return false;">
                                                    </form>
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