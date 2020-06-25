@extends('layouts.main')
@section('title','Tambah data barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Tambah Data Barang
            </h1>
        </div><!-- /.page-header -->
        <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group row @error('number_unit') has-error @enderror">
              <label for="inputNomorBarang" class="col-sm-2 col-form-label">Nomor Barang</label>
              <div class="col-sm-3">
              <input type="number" class="form-control"  name="number_unit" id="inputNomorBarang" placeholder="Nomor Barang" value="{{old('number_unit')}}">
                @error('number_unit')

                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>

            <div class="form-group row @error('name') has-error @enderror">
              <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="name" id="" placeholder="Nama Barang" value="{{old('name')}}">
                @error('name')

                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('spesification') has-error @enderror">
                <label for="name" class="col-sm-2 col-form-label">Spesifikasi Barang</label>
                <div class="col-sm-3">
                    <textarea class="form-control" name="spesification" id="exampleFormControlTextarea1" rows="5" placeholder="Deskripsi Barang"></textarea>
                  @error('spesification')

                  <div class="invalid-feedback text-danger">
                      {{$message}}
                  </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row @error('name') has-error @enderror">
                <label for="" class="col-sm-2 col-form-label">Tahun Produksi</label>
                <div class="col-sm-3">
                    <select id="year" name="year" class="form-control js-example-basic-single"></select>
                </div>
            </div>
            <div class="form-group row @error('date_income') has-error @enderror">
                <label for="" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-3">
                  <input type="date" class="form-control"  name="date_income" id="" value="{{old('')}}">
                  @error('date_income')
                  <div class="invalid-feedback text-danger">
                      {{$message}}
                  </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row @error('room') has-error @enderror">
              <label for="room" class="col-sm-2 col-form-label">Lokasi</label>
              <div class="col-sm-3">
                <select class="form-control js-example-basic-single" name="room">
                  <option value="">Pilih Ruangan</option>
                    @foreach ($rooms as $room)
                        <option value="{{$room->id}}" {{old('room')==$room->id?'selected':''}} >{{$room->name}}</option>
                    @endforeach

                  </select>
              </div>
                @error('room')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group row @error('amount') has-error @enderror">
              <label for="room" class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" name="amount" placeholder="Masukkan Jumlah Barang">
              </div>
                @error('amount')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group row  @error('foto') has-error @enderror">
              <label for="phoneNumber" class="col-sm-2 col-form-label">Foto Barang</label>
              <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-sm btn-default btn-file">
                            Browse… <input type="file" name="foto" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control"  readonly>
                </div><br>
                <img id='img-upload' class="img-thumbnail"/>
                @error('foto')

                  <div class="invalid-feedback text-danger">
                      {{$message}}
                  </div>
                @enderror
              </div>
            </div>

            <div class="clearfix form-actions">
                <button type="submit" class="btn btn-primary btn-sm mb-2">Tambah</button>
                <button type="reset" class="btn btn-danger btn-sm mb-2">Hapus</button>
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@push('more-css')
<link href="{{url('assets/css/select2.css')}}" rel="stylesheet" />

<style>
  .btn-file {
    position: relative !important;
    overflow: hidden !important;
}
.btn-file input[type=file] {
    position: absolute !important;
    top: 0 !important;
    right: 0 !important;
    min-width: 100% !important;
    min-height: 100% !important;
    font-size: 100px !important;
    text-align: right !important;
    filter: alpha(opacity=0) !important;
    opacity: 0 !important;
    outline: none !important;
    background: white !important;
    cursor: inherit !important;
    display: block !important;
}

#img-upload{
    width: 100% !important;
    /* height: 100%; */
}
</style>
@endpush

@push('more-js')
<script src="{{url('assets/js/select2.js')}}"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

<script>
  $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		});
	});

    var end = 1900;
    var start = new Date().getFullYear();
    var options = "<option value=''>Pilih Tahun</option>";

    for(var year = start ; year >=end; year--){
    options += "<option value='"+year+"'>"+ year +"</option>";
    }
    document.getElementById("year").innerHTML = options;
</script>
@endpush
