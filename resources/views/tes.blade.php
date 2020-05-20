<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nomor Barang</td>
            <td>Lokasi</td>
            <td>Keterangan</td>
        </tr>
        @foreach ($item as $tes)

        <tr>
            <td colspan="4">{{$tes->name}}</td>
        </tr>
        <tr>
@foreach ($tes->unit as $item)
<td>{{$loop->iteration}}</td>

<td>{{$item->number_unit}}</td>
<td>{{$item->room->name}}</td>
<td>{{$item->status}}</td>
        </tr>
        @endforeach
        @endforeach
    </table>
</body>
</html>
