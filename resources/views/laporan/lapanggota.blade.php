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
            <h3><center>Laporan Anggota Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Anggota</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        {{-- <th>No HP</th> --}}
                        <th>Username</th>
                        <th>Email</th>
                        <th>Hak Akses</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $key=>$row)
                        <tr>

                            <td>{{ ++$key }}</td>
                             @if($row->role=='siswa')
                             <td>SW{{ $row->id }}</td>
                             @elseif($row->role=='guru')
                             <td>GR{{ $row->id }}</td>
                             @elseif($row->role=='admin')
                             <td>AD{{ $row->id }}</td>
                             @elseif($row->role=='kaperpus')
                             <td>KP{{ $row->id }}</td>

                             @endif
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->jk }}</td>
                            {{-- <td>{{ $row->nohp }}</td> --}}
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
                            <td>{{ $row->created_at }}</td>

                        </tr>
                    @endforeach


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
                {{-- <tr>
                    <td>Baris 2 kolom 1</td>
                    <td>baris 2 kolom 2</td>
                </tr> --}}
            </table>
        </div>
    </div>


</body>

</html>
