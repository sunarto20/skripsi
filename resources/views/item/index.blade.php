@extends('layouts.main')
@section('title','Data Barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        @if (session('status'))
            <div class="flashdata" data-flashdata="{{session('status')}}"></div>
        @endif
            <div class="clearfix">
                <div class="pull-right  "style="margin-bottom:8px !important">
                    <a href="{{route('item.create')}}" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"> Tambah Data</i>
                    </a>
                </div>
            </div>
            <div class="table-header no-margin-top">
                Data Barang
            </div>

            <table id="example" class="table table-hover table-bordered" width="100%" >
                <thead>
                    <tr>
                        <th width="25">#</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Jumlah</th>
                        <th width="10">Aksi</th>
                    </tr>
                </thead>
                <tbody>
@foreach ($items as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td><a href="{{route('item.detail',['id'=>$item->id])}}">{{$item->name}}</a></td>
        <td>{{$item->spesification}}</td>
        <td>{{$item->unit_count}}</td>
        <td>
            <div class="text-center">
                <a class="green" href=" {{route('item.edit',['id'=>$item->id])}} ">
                    <i class="ace-icon fa fa-pencil "></i>
                </a>
                <a class="red tombol-hapus"  onclick="deleteData('{{$item->id}}')"><i class="ace-icon fa fa-trash"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>

        </div>
    </div>
<!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@push('more-js')
<script src="{{url('assets/js/sweetalert2.all.min.js')}}"></script>
<script>
    // Deleted Data

    function deleteData(id){
        // id.preventDefault();
        let csrf_token =$('meta[name="csrf-token"]').attr('content');
        let url1= '{{url('siswa')}}';
        let url = "{{url('siswa')}}"+'/'+id;
        Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url,
                    type:"POST",
                    data: {'_method':'DELETE', '_token':csrf_token},
                    success: (data)=>{
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil di hapus.',
                            'success'
                        ).then((isConfirm) => {
                            if(isConfirm) window.location = url1;
                        });
                    },

                });
            }
        });
    }



</script>
<script>
    // updated and added ruangan
    const data = $('.flashdata').data('flashdata');
    if(data){
        Swal.fire({
            icon: 'success',
            title: data,
            showConfirmButton: true,
        }).then((isConfirm)=>{
            if (isConfirm) window.location.reload;
        })
    }
</script>
@endpush
