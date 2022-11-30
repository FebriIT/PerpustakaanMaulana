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
            <h3><center>Laporan Buku Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Buku</th>
                        <th>Lokasi</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $key=>$row)
                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $row->isbn }}</td>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->pengarang }}</td>
                            <td>{{ $row->penerbit }}</td>
                            <td>{{ $row->tahun_terbit }}</td>
                            <td>{{ $row->jumlah_buku }}</td>
                            <td>{{ $row->lokasi }}</td>
                            <td>{{ $row->created_at }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table><br>
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
