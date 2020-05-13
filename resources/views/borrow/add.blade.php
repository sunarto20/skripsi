@extends('layouts.main')
@section('title','Tambah peminjaman barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Tambah Peminjaman Barang
            </h1>
        </div><!-- /.page-header -->
        <form action="{{route('borrow.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group row @error('room') has-error @enderror">
                <label for="room" class="col-sm-2 col-form-label">Nomor Unit Barang</label>
                <div class="col-sm-3">
                  <select class="form-control js-example-basic-single" name="number_unit">
                    <option value="">Pilih Nomor barang</option>  
                      @foreach ($units as $unit)
                          <option value="{{$unit->id}}" {{old('number_unit')==$unit->id?'selected':''}} >{{$unit->number_unit}}</option>
                      @endforeach
                      
                    </select>
                </div>
                  @error('room')
                  <div class="invalid-feedback text-danger">
                      {{$message}}
                  </div>
                  @enderror
              </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  id="" disabled>
              </div>
            </div>
            <div class="form-group row ">
                <label for="name" class="col-sm-2 col-form-label">Spesifikasi Barang</label>
                <div class="col-sm-3">
                    <textarea class="form-control"  rows="5" disabled></textarea>
                </div>
            </div>
            <div class="form-group row @error('registration_number') has-error @enderror">
              <label for="room" class="col-sm-2 col-form-label">Peminjam</label>
              <div class="col-sm-3">
                <select class="form-control js-example-basic-single" name="registration_number">
                  <option value="">Pilih NIS</option>  
                    @foreach ($students as $student)
                        <option value="{{$student->id}}" {{old('registration_number')==$student->id?'selected':''}} >{{$student->registration_number}}</option>
                    @endforeach
                    
                  </select>
              </div>
                @error('registration_number')
                <div class="invalid-feedback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama Peminjam</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control"  id="" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control"  id="" disabled>
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
@endpush

@push('more-js')
<script src="{{url('assets/js/select2.js')}}"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endpush
