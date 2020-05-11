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
        <form action="{{route('student.store')}}" method="POST">
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('more-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endpush
