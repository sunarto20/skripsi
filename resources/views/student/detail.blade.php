@extends('layouts.main')
@section('title','Detail Data Siswa')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="page-header">
            <h1>
                User Profile Page
            </h1>
        </div><!-- /.page-header -->
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            @if ($student->avatar)
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{{url('storage/'.$student->avatar)}}" width="180px" height="200px" />
                            @else
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{{url('storage/avatars/default.jpg')}}" />
                            @endif

                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="ace-icon fa fa-circle light-green"></i>
                                    &nbsp;
                                    <span class="white"> {{$student->name}} </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Username </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$student->user->username}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nomor Induk  </div>

                            <div class="profile-info-value">
                                <span class="editable" id="city">{{$student->registration_number}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Kelas </div>

                            <div class="profile-info-value">
                                <span class="editable" id="city">{{$student->class->name}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jenis Kelamin </div>

                            <div class="profile-info-value">
                                <span class="editable" id="age">
                                    @if ($student->gender==1)
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> No. Telpon </div>

                            <div class="profile-info-value">
                                <span class="editable" id="signup"> {{$student->phone_number}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Joined </div>

                            <div class="profile-info-value">
                                <span class="editable" id="login"> {{$student->created_at}} </span>
                            </div>
                        </div>
                        @if (auth()->user()->role == 'admin')
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Aksi </div>

                                <div class="profile-info-value">
                                    <a href="{{route('student.index')}}" class="btn btn-sm btn-warning"><span class="editable" id="about">Kambali</span></a>
                                    <a href="{{route('student.edit',['id'=>$student->id])}}"class="btn btn-sm btn-success"><span class="editable" id="about">Edit</span></a>
                                    <a href="  "class="btn btn-sm btn-danger"><span class="editable" id="about">Hapus</span></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="space-20"></div>
        <div class="space-20"></div>
        <div class="widget-box transparent">
            <div class="widget-header widget-header-small">
                <h4 class="widget-title blue smaller">
                    <i class="ace-icon fa fa-rss orange"></i>
                    Histori Peminjaman Barang
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div id="profile-feed-1" class="profile-feed">
                        <table id="example" class="table table-hover table-bordered" width="100%" >
                            <thead>
                                <tr>
                                    <th width="25">#</th>
                                    <th>Nama Barang</th>
                                    <th>Nomor Barang</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$history->item->name}}</td>
                                        <td>{{$history->number_unit}}</td>
                                        <td>{{date('d M Y H:i:s',strtotime($history->transaction_detail[0]['created_at']))}}</td>
                                        <td>
                                            @if ($history->transaction_detail[0]['returned_at']!=null)
                                                <span class="label label-success arrowed arrowed-in-right">
                                                {{date('d M Y H:i:s', strtotime($history->transaction_detail[0]['returned_at']))}}</span>
                                            @else
                                                <span class="label label-danger arrowed-in arrowed-in-right">belum di kembalikan</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
