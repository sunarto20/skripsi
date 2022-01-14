<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Peminjaman Barang</title>
    <style>
        table {
            margin-top: 12rem;
            border-collapse: collapse;
            width: 100%
        }

        table,
        th {
            margin: 3px 3px;
            border: 1px solid black;
        }

        table,
        tr,
        td {
            border: 1px solid black;
            padding: 2px 2px;
        }

        .titleReport {
            margin: 10px 0px;
            text-align: center;
            font-weight: bold;
            font-size: 20px
        }

        h2 {
            font-size: 20px
        }

        .text-header {
            margin: 0 0
        }

        h2,
        h4,
        h3,
        h5 {
            margin: 0px 0px
        }

        h5 {
            font-weight: normal
        }

        table.titi-mangsa {
            border: 0 !important
        }

        table.titi-mangsa,
        tr,
        td {
            border: 0 !important
        }

        #header,
        #footer {
            position: fixed;
            left: -0;
            right: 0;
            color: #000;
            font-size: 0.9em;
        }

        #header {
            top: 0;
            border-bottom: 0.1pt solid #aaa;
        }

        #footer {
            bottom: 0;
            border-top: 0.1pt solid #aaa;
        }

        .page-number:before {
            content: "Page "counter(page);
        }

    </style>
</head>

<body>
    {{-- <div id="footer">
        <div class="page-number"></div>
    </div> --}}
    {{-- {{tgl_id($start)}} --}}
    {{-- @php
        $path = asset('storage/images/jabar.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp --}}
    <table style="border: none">
        <tr style="border: none">
            <td width="50px" style="border: none;text-align: center">
                <img src="{{ $logo }}" alt="BTS" width="100px">

            </td>
            <td style="border: none; text-align: center">
                <div class="text-header">
                    <h4>PEMERINTAH DAERAH PROVINSI JAWA BARAT <br>
                        DINAS PENDIDIKAN</h4>
                    <h3>CABANG DINAS PENDIDIKAN WILAYAH X</h3>
                    <h2>SEKOLAH MENENGAH KEJURUAN NEGERI 1 CIREBON </h2>
                    <h5>Alamat : Jl. Perjuangan By. Pass Sunyaragi Telp. (0231)480202 Cirebon 45132 <br>
                        Website : http://www.smkn1-cirebon.sch.id E-mail : info@smkn1-cirebon.sch.id</h5>
                </div>
            </td>
        </tr>
    </table>

    <div style="width: 100%;text-align:center">
        {{-- {{'tes'}} --}}

    </div>
    <hr>

    <div class="titleReport">
        Laporan Data Peminjaman Barang <br>
        Tanggal : @if ($start == null)
            {{ 'Semua Tanggal' }}
        @elseif(tgl_id($start) == tgl_id($end))
            {{ tgl_id($start) }}
        @else
            {{ tgl_id($start) }} s.d {{ tgl_id($end) }}
        @endif


    </div>

    <table>
        <tr>
            <th width="5%">No</th>
            <th width="50%">Nama Barang</th>
            <th width="30%">Nomor Barang</th>
            <th width="30%">Penerima</th>
            <th width="30%">Kelas</th>
            <th width="30%">Tangal Pinjam</th>
            <th width="30%">Tangal Kembali</th>
        </tr>
        @forelse ($borrows as $borrow)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $borrow->transaction->unit->item->name }}</td>
                <td>{{ $borrow->transaction->unit->number_unit }}</td>
                <td>{{ $borrow->transaction->student->name }}</td>
                <td>{{ $borrow->transaction->student->class->name }}</td>
                <td>{{ tgl_id($borrow->created_at) }}</td>
                <td>
                    @if ($borrow->returned_at == null)
                        Belum dikembalikan
                    @else
                        {{ tgl_id($borrow->returned_at) }}
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center">Tidak ada data</td>
            </tr>
        @endforelse
    </table>
    <br>
    <table style="border: none" class="titi-mangsa">
        <tr style="border: none">
            <td style="border: none" width="10%"></td>
            <td style="border: none" width="50%"></td>
            <td style="border: none" width="30%"></td>
            <td width="50%" style="border: none" colspan="2">Cirebon, {{ tgl_id(date('d M Y')) }}</td>
        </tr>
        <tr>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td colspan="2" style="border: none">Kepala Bengkel/Ketua Jurusan</td>
        </tr>
        <tr style="border: none">
            <td height="30" style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td colspan="2" style="border: none"></td>
        </tr>
        <tr>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td colspan="2" style="border: none">...................................................</td>
        </tr>
        <tr>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td colspan="2" style="border: none">NIP. </td>
        </tr>
    </table>

    <script type="text/php">
        if ( isset($pdf) ) {
                                                        $text = "Hal. {PAGE_NUM} / {PAGE_COUNT}";
                                                        $size = 10;
                                                        $font = $fontMetrics->getFont("Arial");
                                                        $x = ($pdf->get_width()) / 2;
                                                        $y = $pdf->get_height() - 35;
                                                        $pdf->page_text($x, $y, $text, $font, $size);
                                            }
                                    </script>

</body>

</html>
