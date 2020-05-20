@extends('layouts.main')
@section('title','Data Barang Keluar')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        @if (session('status'))
            <div class="flashdata" data-flashdata="{{session('status')}}"></div>
        @endif
            <div class="clearfix">
                <div class="pull-right  "style="margin-bottom:8px !important">
                    <a href="{{route('exit.create')}}" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"> Tambah Data</i>
                    </a>
                </div>
            </div>
            <div class="table-header no-margin-top">
                Data Barang Keluar
            </div>

            <table id="example" class="table table-hover table-bordered" width="100%" >
                <thead>
                    <tr>
                        <th width="25">#</th>
                        <th>Nama Barang</th>
                        <th>Nomor Barang</th>
                        <th>Spesifikasi</th>
                        <th>Catatan</th>
                        <th>Tanggal Keluar</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exits as $exit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('item.detail',['id'=>$exit->item->id])}}">{{$exit->item->name}}</a></td>
                            <td>{{$exit->number_unit}}</td>
                            <td>{{$exit->item->spesification}}</td>
                            @foreach ($exit->transaction_detail as $item)
                            @if ($item->status == 'exit')
                            <td>{{$item->notes}}</td>
                            @endif
                            @endforeach
                            <td>{{$exit->created_at}}</td>

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
        let url1= '{{url('barang')}}';
        let url = "{{url('barang')}}"+'/'+id;
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
