<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .frontid {
            background-image: url("/images/bgidcard.png");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .backid {
            background-image: url("/images/bgidcard.png");
            position: relative;
            overflow: hidden;

        }
        tr{
            text-align: center;
        }
        .avatar {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid gray;

        }



    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <td style="width: 86mm; heigth:54mm; " class="frontid">

                    <b style="line-height:0.2">KARTU PERPUSTAKAAN <br> SMAN 8 MERANGIN</b>

                     <hr style="margin-top:-1px" />




                    <img src="{{ asset('images/1.jpg') }}" class="avatar"  alt=""><br>
                    <h3><b>{{ $p->name }}</b></h3>
                    @if($p->role=='guru')
                    Guru
                    @elseif($p->role=='siswa')
                    Siswa
                    @endif
                    <br>
                     Kode Anggota : {{ $p->no_anggota }}


                </td>



                <td style="height: 54mm;width: 86mm;" class="backid">


                    <p >


                        <b>TATA TERTIB PERPUSTAKAAN</b> <br>
                        <ul style="text-align: left;">

                            <li>Kartu ini tidak dapat dipindah tangankan</li>
                            <li>Penggunaan kart ini diatur oleh SMAN 8 Merangin </li>
                            <li>Harap menjaga baik-baik kartu ini, apabila hilang segera melapor ke Perpustakaan SMAN 8 Merangin</li>
                            <li>Apabila menemukan karti ini segera dikembalika ke SMAN 8 Merangin </li>
                        </ul>

                    </p>

                </td>

            </tr>
        </thead>
    </table>
</body>
</html>

