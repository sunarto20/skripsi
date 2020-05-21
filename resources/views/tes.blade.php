<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    </style>
</head>
<body>


<div style="width: 100%;text-align:center">
{{-- <img src="{{asset('assets/images/jabar.png')}}" alt="" srcset=""> --}}
{{-- {{'tes'}} --}}

        PEMERINTAH DAERAH PROVINSI JAWA BARAT <br>

    DINAS PENDIDIKAN<br>
    CABANG DINAS PENDIDIKAN WILAYAH X <br> SEKOLAH MENENGAH KEJURUAN NEGERI 1 CIREBON <br>
    Alamat : Jl. Perjuangan By. Pass Sunyaragi Telp. (0231)480202 Cirebon 45132 <br>
    Website : http://www.smkn1-cirebon.sch.id E-mail : info@smkn1-cirebon.sch.id
</div>
<hr>

<div class="titleReport">
    Laporan Data Keadaan Barang <br>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nomor Barang</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
    </tr>
    <?php foreach ($item as $tes) : ?>
        <tr>
            <td colspan="4" style="font-weight: bold"><?= strtoupper( $tes->name ) ?></td>
        </tr>
            <?php $no = 1; foreach ($tes->unit as $item) : ?>
                <tr>
                    <td><?= $no++ ?></td>

                    <td><?= $item->number_unit ?></td>
                    <td><?= $item->room->name ?></td>
                    <td><?= $item->status ?></td>
                </tr>
            <?php endforeach ?>
    <?php endforeach ?>
</table>

</body>
</html>



