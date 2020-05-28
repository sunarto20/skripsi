@extends('layouts.main')
@section('title','Edit data ruangan')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Edit Data Ruangan
            </h1>
        </div><!-- /.page-header -->
        <form action=" {{route('room.update',['id'=>$room->id])}} " method="POST">

            @csrf
            @method('PUT')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Ruangan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="name" id="inputPassword" value="{{$room->name}}">
                @error('name')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="clearfix form-actions">
                <button type="submit" class="btn btn-primary btn-sm mb-2">Ubah</button>
                {{-- <button onclick="window.history.back" class="btn btn-danger btn-sm mb-2">Kembali</button> --}}
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
