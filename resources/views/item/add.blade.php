@extends('layouts.main')
@section('title','Tambah data siswa')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Tambah Data Barang
            </h1>
        </div><!-- /.page-header -->
        <form action="{{route('item.store')}}" method="POST">
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
                <input type="text" class="form-control"  name="name" id="" placeholder="Nama Barang" value="{{old('')}}">
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
                    <textarea class="form-control" name="spesification" id="exampleFormControlTextarea1" rows="5"></textarea>
                  @error('spesification')
  
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
                <input type="number" class="form-control" name="amount">
              </div>
                @error('amount')
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
