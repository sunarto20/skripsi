@extends('layouts.main')
@section('title','Data ruangan')
@section('content')


<div class="page-header">
    <h1>
        Laporan Data Barang
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-6">
        <!-- PAGE CONTENT BEGINS -->
        <div class="space-20"></div>
        <div class="widget-box">
            <div class="widget-body">
                <div class="widget-main">
                    <hr />
                    <label for="id-date-range-picker-1">Masukkan Rentang Tanggal</label>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                        <form action="{{route('report.item')}}" method="post">
                            @csrf
                                <input class="form-control" type="text" name="date" id="id-date-range-picker-1" />
                            </div>
                            <div class="space-8"></div>
                            <button type="submit" class="btn btn-primary btn-sm">Cetak berdasarkan tanggal</button>
                            <a href="" class="btn btn-sm btn-success">Cetak Semua Data</a>
                        </form>
                    </div>
                    </div>
                    <hr />
                </div>
            </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@push('more-css')
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datepicker3.min.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-timepicker.min.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/daterangepicker.min.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-colorpicker.min.css')}}" />
@endpush

@push('more-js')
<script src="{{url('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('assets/js/moment.min.js')}}"></script>
<script src="{{url('assets/js/daterangepicker.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{url('assets/js/promise_polyfill.js')}}"></script> --}}

<script>
    $('.date-picker').datepicker({
					autoclose: true,
                    todayHighlight: true,

				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});


				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',

					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});

</script>
<script src="{{url('assets/js/myScript.js')}}"></script>
@endpush
