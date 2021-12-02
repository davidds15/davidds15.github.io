@extends('layout.xoric')

@section('tempat_konten')
<style>
.mybut {
    width: 150%;
}
</style>
<?php $bulan = 0; 
 $curmonth = date('m');
$tgl =now();
 ?>

<script>
var selected = 1;
</script>

<div class="modal fade " id="modal_tambah_Jadwal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content myDiv">

            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> -->
                <h4 class="modal-title">
                    Tambah Jadwal
                </h4>

            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('penjadwalan.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai">
                                @foreach($data_pegawai as $k)
                                <option value='{{$k->id}}''>{{$k->namapegawai}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer</label>
                                                        <div>
                                                        <select class="form-control" id="customer" name="customer">
                                                            @foreach($data_cust as $k)
                                                                <option value=' {{$k->customer->id}}'>
                                    {{$k->customer->namacustomer}} - {{$k->detailcustomer->nomortelepon}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Servis</label>
                        <div>
                            <input class="form-control" type="date" value="2021-05-19" id="Tanggal" name="Tanggal">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h4 class="page-title mb-1">Penjadwalan</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Xoric</a></li>
                    <li class="breadcrumb-item active">Penjadwalan</li>

                </ol>

            </div>
            <div class="">
                <div class="float-right d-none d-md-block">



                    <button class="btn btn-light btn-rounded mybut" type="button" aria-haspopup="true"
                        aria-expanded="false">
                        <a href="#">
                            List Jadwal
                        </a>
                    </button>


                </div>
            </div>
        </div>
        <br>
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4">
                                <h4 class="font-size-14">Create Events</h4>
                                <a href="#modal_tambah_Jadwal" class="btn btn-primary" data-toggle="modal">
                                    + Tambah Data Penjadwalan
                                </a>
                                <div id='external-events'>
                                    <!-- <h4 class="font-size-14">Draggable Events</h4>
                                                        <div class='fc-event'>My Event 1</div>
                                                        <div class='fc-event'>My Event 2</div>
                                                        <div class='fc-event'>My Event 3</div>
                                                        <div class='fc-event'>My Event 4</div>
                                                        <div class='fc-event'>My Event 5</div> -->
                                </div>

                                <!-- checkbox -->
                                <!-- <div class="custom-control custom-checkbox mt-3"> -->
                                <!-- <input type="checkbox" class="custom-control-input" id="drop-remove" data-parsley-multiple="groups" data-parsley-mincheck="2"> -->
                                <!-- <label class="custom-control-label" for="drop-remove">Remove after drop</label> -->
                            </div>


                            &nbsp;
                            <div class="col-lg-6  mr-5"></div>
                            <!-- <div id='calendar' class="col-xl-10 col-lg-9 col-md-8 mt-4 mt-md-0"> -->

                            <div class="form-group col-lg-3 ml-5 filter">
                                <h4 class="font-size-14">Custom Filter</h4>
                                <label>Pilih Bulan Jadwal Pelayanan</label>
                                <div class="row">
                                <form method='POST' action="{{route('Filterbulan')}}">
                                        @csrf
                                        <div class="">
                                            <input class="form-control" type="date" value="<?php echo $tgl?>" id="Tanggal"
                                                name="Tanggal">
                                        </div>

                                        <div id="btnsearch">
                                            <input type="submit" value="Search" id="buttonsearch" style="color:white;"
                                                class="btn btn-success waves-effect waves-light mr-1">

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">List semua Jadwal</h4>


                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>

                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Customer</th>
                                            <th>Nama Pegawai</th>
                                            <th>Nomor Telepon Pegawai</th>
                                            <th>Tanggal Servis</th>
                                            <th>Alamat Customer</th>
                                            <th>Nomor Telepon Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id_jadwal}}</td>
                                            <td>{{$d->namacustomer}}</td>
                                            <td>{{$d->namapegawai}}</td>
                                            <td>

                                                {{ $d->nomorpegawai }}
                                            </td>
                                            <td>

                                                {{ $d->tanggalpenjadwalan }}

                                            </td>
                                            <td>{{$d->alamatcustomer}}</td>
                                            <td>
                                                {{$d->nomorcustomer}}

                                            </td>
                                            <td>
                                            <form method='POST' action="{{url('penjadwalan/'.$d->id_jadwal)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Delete"
                                                                class='btn btn-xs btn-danger'
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

            </div>
            <!-- end row -->

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->

</div>
<!-- end container-fluid -->

<!-- End Page-content -->


<!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © Xoric.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->

@endsection
@section('tempat_script')
<script>
$(document).ready(function() {

    // var calendarEl = document.getElementById('calendar');

    // var calendar = new FullCalendar.Calendar(calendarEl, {
    //     timeZone: 'UTC',
    //     initialView: 'dayGridMonth',
    //     events: '',
    //     editable: true,
    //     selectable: true
    // });

    // calendar.render();

    // $('.dynamicjadwal').on('change', function(e) {
    //     if ($(this).val() != '') {
    //         var select = $(this).attr('id');
    //         var value = $(this).val();
    //         selected = value;
    //         $('#btnsearch').html("");
    //         var items = "<a href='/Filter/" + selected + "' id='buttonsearch ' style='color: white;'" +
    //             "class='btn btn-success waves-effect waves-light mr-1'>" +
    //             "search" +
    //             "</a>";
    //         $('#btnsearch').html(items);
    //     }
    //     console.log("test");
    // });
    // $('.dynamicjadwal').change(function() {
    //     if ($(this).val() != '') {
    //         var select = $(this).attr('id');
    //         var value = $(this).val();

    //         if(value == "12")
    //         {
    //             <?php $bulan = 12;?>
    //         }
    //         else if(value =="11")
    //         {
    //             <?php $bulan = 11;?>
    //         }
    //         else if(value =="10")
    //         {
    //             <?php $bulan = 10;?>
    //         }
    //         else if(value =="9")
    //         {
    //             <?php $bulan = 9;?>
    //         }
    //         else if(value =="8")
    //         {
    //             <?php $bulan = 8;?>
    //         }
    //         else if(value =="7")
    //         {
    //             <?php $bulan = 7;?>
    //         }
    //         else if(value =="6")
    //         {
    //             <?php $bulan = 6;?>
    //         }
    //         else if(value =="5")
    //         {
    //             <?php $bulan = 5;?>
    //         }
    //         else if(value =="4")
    //         {
    //             <?php $bulan = 4;?>
    //         }

    //         else if(value =="3")
    //         {
    //             <?php $bulan = 3;?>
    //         }
    //         else if(value =="2")
    //         {
    //             <?php $bulan = 2;?>
    //         }
    //         else{
    //             <?php $bulan = 1;?>
    //         }
    //         $items = "<a href='/Filter/<?php echo $bulan ?>' id='buttonsearch' style='color:white;'"+
    //                                 "class='btn btn-success waves-effect waves-light mr-1'>"+
    //                                 "search"+
    //                             "</a>";
    //         $('#btnsearch').html(items);
    //     }
    // });

});
</script>
@endsection