@extends('layouts.main')
@section('title','Pindah data Barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Pindah Posisi Barang
            </h1>
        </div><!-- /.page-header -->
        <form action=" {{route('item.change.update',['id'=>$unit->id])}} " method="POST">

            @csrf
            @method('PUT')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  id="inputPassword" value="{{$unit->item->name}}" readonly>
                @error('name')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('numberunit') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Unit Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  id="inputPassword" value="{{$unit->number_unit}}" readonly>
                @error('numberunit')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('numberunit') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Lokasi Awal</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  id="inputPassword" value="{{$unit->room->name}}" readonly>
                @error('numberunit')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="form-group row @error('room') has-error @enderror">
                <label for="room" class="col-sm-2 col-form-label">Pindah ke Lokasi</label>
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