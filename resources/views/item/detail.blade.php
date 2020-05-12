@extends('layouts.main')
@section('title','Detail Data Siswa')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="page-header">
            <h1>
                Detail Item Page

            </h1>
        </div><!-- /.page-header -->
        {{-- <div class="hr dotted"></div> --}}

        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{{url('assets/images/avatars/profile-pic.jpg')}}" />
                        </span>
                        <div class="space-4"></div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Produk </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username"> {{$item->name}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Spesifikasi / Keterangan  </div>

                            <div class="profile-info-value">
                                <span class="editable" id="city"> {{$item->spesification}} </span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tanggal di Tambahkan </div>

                            <div class="profile-info-value">
                                <span class="editable" id="login"> {{$item->created_at}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Aksi </div>

                            <div class="profile-info-value">
                                <a href="" class="btn btn-sm btn-warning"><span class="editable" id="about">Kambali</span></a>
                                <a href=""class="btn btn-sm btn-success"><span class="editable" id="about">Edit</span></a>
                                <a href="  "class="btn btn-sm btn-danger"><span class="editable" id="about">Hapus</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-20"></div>
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                        <h4 class="widget-title smaller">
                            <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                            Tabel keberadaan Barang
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <table id="example" class="table table-hover table-bordered" width="100%" >
                                <thead>
                                    <tr>
                                        <th width="25">#</th>
                                        <th>Nomor Barang</th>
                                        <th>Lokasi</th>
                                        <th>Keterangan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->unit as $unit)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$unit->number_unit}}</a></td>
                                            <td>{{$unit->room->name}}</td>
                                            <td><span class="label label-sm label-info arrowed arrowed-righ">Tersedia</span></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- /#home -->
  <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@push('more-js')
<script src="{{url('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{url('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{url('assets/js/jquery.gritter.min.js')}}"></script>
<script src="{{url('assets/js/bootbox.js')}}"></script>
<script src="{{url('assets/js/jquery.easypiechart.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-editable.min.js')}}"></script>
<script src="{{url('assets/js/ace-editable.min.js')}}"></script>
@endpush
