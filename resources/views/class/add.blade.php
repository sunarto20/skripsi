@extends('layouts.main')
@section('title','Tambah data kelas')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Tambah Data Kelas
            </h1>
        </div><!-- /.page-header -->
    <form action="{{route('class.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Kelas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="name" id="inputPassword" placeholder="Nama Kelas">
                @error('name')

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
