<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>

</head>

<body>

    <div class="container">
        <div>
            <h3>
                <center>Laporan Peminjaman Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center>
            </h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>ISBN</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                {{ $total=0 }}
                    @foreach ($p as $key=>$row)
                     @php
                     $jarak=strtotime($row->tgl_kembali)-strtotime($row->tgl_pinjam);

                        $denda = ($jarak / 60 / 60 / 24 )* 1000;

                        $total+=$denda;


                     @endphp

                    <tr>

                        <td>{{ ++$key }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->isbn }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->tgl_pinjam }}</td>
                        <td>{{ $row->tgl_kembali }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $denda }}</td>


                    </tr>
                    @endforeach
                    <tr>
                    <Td colspan="8"><b>Total</b></Td>

                    <Td>{{ $total }}</Td>
                    </tr>


                </tbody>
            </table>
            <br>
            <table style="width: 100%;text-align: center;border-style: none;">
                <tr>
                    <td>
                        Mengetahui, <br>
                        Kepala Sekolah <br>
                        <br><br><br>
                        ADE ERMA SURYANI <br>
                        NIP. 19680618 199102 2 001
                    </td>
                    <td>
                        Jambi, {{ $tglskrng }} <br>
                        Kepala Perpustakaan <br>
                        <br><br><br><br>
                        KUNTI DEWI HAMBAWANI <br>
                        NIP. 19791103 200801 2 002
                    </td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>

