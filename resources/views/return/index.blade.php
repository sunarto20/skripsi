@extends('layouts.main')
@section('title','Data Pengembalian Barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        @if (session('status'))
        <div class="flashdata" data-flashdata="{{session('status')}}"></div>
        @endif
        <div class="clearfix">
            <div class="pull-right  " style="margin-bottom:8px !important">
                {{-- <a href="" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"> Tambah Data</i>
                </a> --}}
            </div>
        </div>
        <div class="table-header no-margin-top">
            Data Pengembalian Barang
        </div>

        <table id="example" class="table table-hover table-bordered" width="100%">
            <thead>
                <tr>
                    <th width="25">#</th>
                    <th>Nama Barang</th>
                    <th>Nomor Barang</th>
                    <th>Peminjam</th>
                    <th>Kelas</th>
                    <th>Tanggal Kembali</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($returns as $return)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="">{{$return->transaction->unit->item->name}}</a></td>
                    <td>{{$return->transaction->unit->number_unit}}</td>
                    <td><a href="">{{$return->transaction->student->name}}</a></td>
                    <td>{{$return->transaction->student->class->name}}</td>
                    <td>{{ date('d M Y H:i:s',strtotime($return->returned_at)) }}</td>
                    
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

    function deleteData(id) {
        // id.preventDefault();
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
        let url1 = '{{url('
        barang ')}}';
        let url = "{{url('barang')}}" + '/' + id;
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
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: (data) => {
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil di hapus.',
                            'success'
                        ).then((isConfirm) => {
                            if (isConfirm) window.location = url1;
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
    if (data) {
        Swal.fire({
            icon: 'success',
            title: data,
            showConfirmButton: true,
        }).then((isConfirm) => {
            if (isConfirm) window.location.reload;
        })
    }
</script>
@endpush