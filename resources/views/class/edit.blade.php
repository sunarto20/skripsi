@extends('layouts.main')
@section('title','Edit data kelas')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="page-header">
            <h1>
                Edit Data Kelas
            </h1>
        </div><!-- /.page-header -->
        <form action=" {{route('class.update',['id'=>$class->id])}} " method="POST">

            @csrf
            @method('PUT')
            <div class="form-group row @error('name') has-error @enderror">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Kelas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="name" id="inputPassword" value="{{$class->name}}">
                @error('name')
                    <div class="invalid-feedback text-danger">
                        {{$message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="clearfix form-actions">
                <button type="submit" class="btn btn-primary btn-sm mb-2">Ubah</button>
                <button  class="btn btn-danger btn-sm mb-2" onclick="return back()">Kembali</button>
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
