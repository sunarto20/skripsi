<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang</title>
    <style>
        table{
            margin-top: 12rem;
            border-collapse: collapse;
            width: 100%
        }
        table,th{
            margin: 3px 3px;
            border: 1px solid black;
        }
        table,tr,td{
            border: 1px solid black;
            padding: 2px 2px;
        }

        .titleReport{
            margin : 10px 0px;
            text-align: center;
            font-weight: bold;
            font-size: 20px
        }

        h2{
            font-size: 20px
        }
        .text-header{
            margin:0 0
        }

        h2,h4,h3,h6{
            margin:0px 0px
        }

        h6{
            font-weight: normal
        }

        table.titi-mangsa{
            border:0
        }

        table.titi-mangsa  tr  td{
            border:0
        }


    </style>
</head>
<body>

    <table style="border: none">
        <tr style="border: none">
            <td width="50px" style="border: none;text-align: center">
                <img src="{{base_path() }}/public/assets/images/jabar.png" width="100px">

            </td>
            <td style="border: none; text-align: center">
<div class="text-header">
                <h4>PEMERINTAH DAERAH PROVINSI JAWA BARAT <br>
                DINAS PENDIDIKAN</h4>
                <h3>CABANG DINAS PENDIDIKAN WILAYAH X</h3>
                <h2>SEKOLAH MENENGAH KEJURUAN NEGERI 1 CIREBON </h2>
                <h6>Alamat : Jl. Perjuangan By. Pass Sunyaragi Telp. (0231)480202 Cirebon 45132 <br>
                Website : http://www.smkn1-cirebon.sch.id E-mail : info@smkn1-cirebon.sch.id</h6>
            </div></td>
        </tr>
    </table>

<div style="width: 100%;text-align:center">
{{-- {{'tes'}} --}}

</div>
<hr>

<div class="titleReport">
    Laporan Data Keadaan Barang <br>
    Tanggal : @if ($start == null)
                {{'Semua Tanggal'}}
    @elseif(tgl_id($start) == tgl_id($end))
                {{tgl_id($start)}}
    @else
            {{tgl_id($start)}} s.d {{tgl_id($end)}}
    @endif


</div>

<table>
    <tr>
        <th width="10%">No</th>
        <th width="50%">Nomor Barang</th>
        <th width="30%">Lokasi</th>
        <th width="30%">Tangal Tambah</th>
        <th width="20%">Keterangan</th>
    </tr>
    @foreach ($item as $tes)
        <tr>
            <td  colspan="5" style="font-weight: bold;background-color: #d3d3d3">{{strtoupper( $tes->name ) }}</td>
        </tr>
            @foreach ($tes->unit as $item)
            <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->number_unit}}</td>
                    <td>{{$item->room->name}}</td>
                    <td>{{ tgl_id($item->created_at) }}</td>
                    <td>{{$item->status}}</td>
                </tr>
            @endforeach
    @endforeach
</table>
<br>
<table class="titi-mangsa">
    <tr>
        <td width="10%"></td>
        <td width="50%"></td>
        <td width="30%"></td>
        <td width="50%" colspan="2">Cirebon, {{tgl_id(date('d M Y'))}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td ></td>
        <td  colspan="2">Kepala Bengkel/Ketua Jurusan</td>
    </tr>
    <tr>
        <td height="30" ></td>
        <td ></td>
        <td ></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td ></td>
        <td ></td>
        <td ></td>
        <td  colspan="2">...................................................</td>
    </tr>
    <tr>
        <td ></td>
        <td ></td>
        <td ></td>
        <td  colspan="2">NIP. </td>
    </tr>
</table>

</body>
</html>



