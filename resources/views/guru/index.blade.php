@extends('layouts.master')

@section('content')

<div class="row">



    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Anggota <a href="/{{ auth()->user()->role }}/anggota/create" class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable1">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Anggota</th>
                                    <th scope="col">NIP/NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Hak Akses</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $key=>$row)
                                @php
                                $dsiswa=\App\Models\Siswa::find($row->no_anggota);

                                //dd($dsiswa);
                                $dguru=\App\Models\Guru::find($row->no_anggota);

                                @endphp

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    @if($row->role=='siswa')
                                    <td>SW{{ $row->id }}</td>
                                    @elseif($row->role=='guru')
                                    <td>GR{{ $row->id }}</td>
                                    @endif
                                    @if($row->role=='siswa')

                                    <td>{{ $dsiswa->nisn }}</td>
                                    @elseif($row->role=='guru')
                                    <td>{{ $dguru->nip }}</td>

                                    @endif
                                    {{-- <td></td> --}}

                                    <td>{{ $row->name }}</td>
                                    @if($row->role=='siswa')

                                    <td>{{ $dsiswa->nohp }}</td>
                                    @elseif($row->role=='guru')
                                    <td>{{ $dguru->nohp }}</td>

                                    @endif

                                    {{-- <td>{{ $row->nohp }}</td> --}}
                                    <td>{{ $row->jk }}</td>

                                    <td>{{ $row->role }}</td>

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/anggota/{{ $row->id }}/cetak" class="btn btn-icon btn-sm btn-primary" target="_blank" title="Cetak Anggota"><i class="far fa-folder-open"></i></a>
                                        <a href="/{{ auth()->user()->role }}/anggota/{{ $row->id }}/edit" class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/anggota/{{ $row->id }}/destroy" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>


</div>

@endsection

