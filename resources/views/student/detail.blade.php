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
        {{-- <div class="hr dotted"></div> --}}
                @foreach ($student as $item)
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{{url('assets/images/avatars/profile-pic.jpg')}}" />
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="ace-icon fa fa-circle light-green"></i>
                                    &nbsp;
                                    <span class="white"> {{$item->name}} </span>
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
                                <span class="editable" id="username">{{$item->user->username}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nomor Induk  </div>

                            <div class="profile-info-value">
                                <span class="editable" id="city">{{$item->registration_number}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Kelas </div>

                            <div class="profile-info-value">
                                <span class="editable" id="city">{{$item->class->name}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jenis Kelamin </div>

                            <div class="profile-info-value">
                                <span class="editable" id="age">
                                    @if ($item->gender==1)
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
                                <span class="editable" id="signup"> {{$item->phone_number}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Joined </div>

                            <div class="profile-info-value">
                                <span class="editable" id="login"> {{$item->created_at}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Aksi </div>

                            <div class="profile-info-value">
                                <a href="{{route('student.index')}}" class="btn btn-sm btn-warning"><span class="editable" id="about">Kambali</span></a>
                                <a href=""class="btn btn-sm btn-success"><span class="editable" id="about">Edit</span></a>
                                <a href="  "class="btn btn-sm btn-danger"><span class="editable" id="about">Hapus</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                @endforeach
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
