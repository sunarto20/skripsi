@extends('layouts.main')
@section('title','Tambah data siswa')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Tambah Data Siswa
            </h1>
        </div><!-- /.page-header -->
        <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputNama" class="col-sm-2 col-form-label">Nama Siswa</label>
              <div class="col-sm-3">
              <input type="text" class="form-control"  name="name" id="inputNama" placeholder="Nama Siswa" value="{{old('name')}}">
                @error('name')

                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>
            
            <div class="form-group row @error('registration_number') has-error @enderror">
              <label for="registration_number" class="col-sm-2 col-form-label">Nomor Induk</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="registration_number" id="registration_number" placeholder="Nomor Induk Siswa" value="{{old('registration_number')}}">
                @error('registration_number')

                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('class') has-error @enderror">
              <label for="inputClass" class="col-sm-2 col-form-label">Nama Kelas</label>
              <div class="col-sm-3">
                <select class="form-control js-example-basic-single" name="class">
                  <option value="">Pilih Kelas</option>  
                    @foreach ($classes as $class)
                        <option value="{{$class->id}}" {{old('class')==$class->id?'selected':''}} >{{$class->name}}</option>
                    @endforeach
                    
                  </select>
              </div>
                @error('class')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div></div>
            <div class="form-group row @error('gender') has-error @enderror">
                <label for="inputClass" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" @if(old('gender')=="1") checked @endif>
                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                    <input class="form-check-input" style="margin-left:2em !important" type="radio" name="gender" id="inlineRadio2" value="2" @if(old('gender')=="2") checked @endif>
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
                @error('gender')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group row @error('phoneNumber') has-error @enderror">
              <label for="phoneNumber" class="col-sm-2 col-form-label">Nomor Telepon</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="phoneNumber" id="phoneNumber" placeholder="Nomor Telepon"value="{{old('phoneNumber')}}">
                @error('phoneNumber')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row  @error('avatar') has-error @enderror">
              <label for="phoneNumber" class="col-sm-2 col-form-label">Foto Siswa</label>
              <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-sm btn-default btn-file">
                            Browse… <input type="file" name="avatar" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control"  readonly>
                </div><br>
                <img id='img-upload' class="img-thumbnail"/>
                @error('avatar')

            <div class="invalid-feedback text-danger">
                {{$message}}
            </div>
            @enderror
              </div>
            </div>
            <div class="clearfix form-actions">
                <button type="submit" class="btn  btn-primary btn-sm mb-2">Tambah</button>
                <button type="reset" class="btn btn-danger btn-sm mb-2">Hapus</button>
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
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
</script>


@endpush
