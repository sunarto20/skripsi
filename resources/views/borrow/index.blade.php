@extends('layouts.main')
@section('title','Data Peminjaman Barang')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        @if (session('status'))
            <div class="flashdata" data-flashdata="{{session('status')}}"></div>
        @endif

        <div class="clearfix">
            <div class="pull-right  "style="margin-bottom:8px !important">
                <a href="{{route('borrow.create')}}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"> Tambah Data</i>
                </a>
            </div>
        </div>

        <div class="table-header no-margin-top">
            Data Peminjaman Barang
        </div>

            <table id="example" class="table table-hover table-bordered" width="100%" >
                <thead>
                    <tr>
                        <th width="25">#</th>
                        <th>Nama Barang</th>
                        <th>Nomor Barang</th>
                        <th>Peminjam</th>
                        <th>Kelas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th width="10">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $borrow)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('item.detail',['id'=>$borrow->unit->item->id])}}">{{$borrow->unit->item->name}}</a></td>
                            <td>{{$borrow->unit->number_unit}}</td>
                            <td><a href="{{route('student.detail',['id'=>$borrow->student->id])}}">{{$borrow->student->name}}</a></td>
                            <td>{{$borrow->student->class->name}}</td>
                            <td>{{ date('d M Y H:i:s',strtotime($borrow->status_pinjam)) }}</td>
                            <td>
                                @if ($borrow->status_return != null)
                                <span class="label label-success arrowed arrowed-in-right">{{date('d M Y H:i:s',strtotime($borrow->status_return))}}</span>
                                @else
                                    <span class="label label-danger arrowed-in arrowed-in-right">belum di kembalikan</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-left">
                                    <a class="yellow" href=" {{route('borrow.detail',['id'=>$borrow->id])}} ">
                                        <i class="ace-icon fa fa-eye "></i>
                                    </a>
                                    <a class="red tombol-hapus"  onclick="deleteData('{{$borrow->id}}')"><i class="ace-icon fa fa-trash"></i>
                                    </a>
                                    @if ($borrow->status_return == null)
                                        <a class="green" onclick="returnItem('{{$borrow->id}}')" ><span class="tooltip-success" data-rel="tooltip" data-placement="bottom" title="kembalikan barang"><i class="fa fa-undo"></i></span></i></a>
                                    @endif
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
        let url1= '{{url('pinjam')}}';
        let url = "{{url('pinjam')}}"+'/'+id;
        Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda akan menghapus data ini!"+id,
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

    function returnItem(id){
        let csrf_token =$('meta[name="csrf-token"]').attr('content');
        let url1= '{{url('pinjam')}}';
        let url = "{{url('kembali')}}"+'/'+id;
        Swal.fire({
            title: 'Anda akan mengembalikan barang ini',
            text: "Pastikan barang yang anda terima sudah sesuai",
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
                    data: {'_method':'PUT', '_token':csrf_token},
                    success: (data)=>{
                        Swal.fire(
                            'Berhasil',
                            'Data berhasil di dikembalikan.',
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

    jQuery(function($){
        $('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
    })
</script>
@endpush
