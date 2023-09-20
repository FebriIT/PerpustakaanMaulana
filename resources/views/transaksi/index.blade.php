@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="section-title">Data Peminjaman

            @if (Auth::user()->role=='admin'||auth()->user()->role=='kaperpus')

            <a href="/{{ auth()->user()->role }}/transaksi/create" class="btn btn-sm btn-warning float-right">Transaksi Baru</a>
            @endif
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">

        <div class="section-title">

        </div>
        <section class="section">

            <div class="table-responsive">

                <table class="table table-sm" id="transaksisiswa">
                    <thead>
                        <tr>
                            <th>Kode Peminjaman</th>
                            <th scope="col">Nomor Anggota</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Tgl Pinjam</th>
                            <th scope="col">Tgl Kembali</th>
                            <th scope="col">Total Terlambat</th>
                            <th scope="col">Denda</th>
                            <th scope="col">Status</th>
                            @if (Auth::user()->role=='admin' ||auth()->user()->role=='kaperpus')
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $row)

                        <tr>
                            <td>{{ $row->kode_transaksi }}</td>
                            <td>{{ $row->user->no_anggota }}</td>
                            {{-- <th scope="row"><a href="/{{ Auth::user()->role }}/anggota/{{ $row->user->no_anggota }}/detail">{{ $row->user->no_anggota }}</a> </th> --}}
                            <td>{{ $row->user->name }}</td>

                            <td><a href="/{{ Auth::user()->role }}/buku/{{ $row->buku_id }}/detail">{{ $row->buku->kode_buku }}</a></td>
                            <td>{{ $row->tgl_pinjam }}</td>
                            <td>{{ $row->tgl_kembali }}</td>
                            @php

                                $jarak=strtotime($datenow->format('Y-m-d'))-strtotime($row->tgl_kembali);
                                if($jarak>0){
                                    $totalhari=$jarak / 60 / 60 / 24;
                                    $denda = $totalhari* 1000;

                                }else{
                                    $totalhari=0;
                                    $denda =0;

                                }

                                // dd($denda);
                            @endphp
                            <td>{{ $totalhari }} hari</td>

                            <td>{{ $denda }}</td>

                            @if ($row->status=='Dikembalikan')
                            <td><span class="badge badge-success">{{ $row->status }}</span></td>
                            @elseif($row->status=='Dipinjam')
                            <td><span class="badge badge-primary">{{ $row->status }}</span></td>
                            @elseif($row->status=='Terlambat')
                            <td><span class="badge badge-danger">{{ $row->status }}</span></td>
                            @endif
                            @if (Auth::user()->role=='admin' ||auth()->user()->role=='kaperpus')
                            <td>
                                <div class="btn-group mb-2">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 29px, 0px);">
                                        @if ($row->status!='Kembali')
                                        <a href="/{{ auth()->user()->role }}/transaksi/{{ $row->id }}/update"
                                            class="dropdown-item btn-sm">Dikembalikan</a>
                                        @endif


                                        <a href="/{{ auth()->user()->role }}/transaksi/{{ $row->id }}/destroy" class="dropdown-item btn-sm"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>


                                    </div>
                                </div>
                            </td>
                            @endif



                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@endsection
