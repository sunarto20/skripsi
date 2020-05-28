@extends('layouts.main')
@section('title','Edit data Barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Edit Data Barang
            </h1>
        </div><!-- /.page-header -->
        <form action=" {{route('item.update',['id'=>$item->id])}} " method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="name" id="inputPassword" value="{{$item->name}}">
                @error('name')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Spesifikasi Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="spesification" id="inputPassword" value="{{$item->spesification}}">
                @error('name')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group row  @error('foto') has-error @enderror">
                <label for="phoneNumber" class="col-sm-2 col-form-label">Foto Barang</label>
                <div class="col-sm-3">
                  <div class="input-group">
                      <span class="input-group-btn">
                          <span class="btn btn-sm btn-default btn-file">
                          Browse… <input type="file" name="foto"  id="imgInp">
                          </span>
                      </span>
                      <input type="text" class="form-control" readonly>
                  </div><br>
                  <img id='img-upload' src="{{url('/storage/'.$item->foto)}}" class="img-thumbnail"/>
                  @error('foto')
  
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
              </div>

            <div class="clearfix form-actions">
                <button type="submit" class="btn btn-primary btn-sm mb-2">Ubah</button>
                {{-- <button type="reset" class="btn btn-danger btn-sm mb-2">Hapus</button> --}}
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@push('more-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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