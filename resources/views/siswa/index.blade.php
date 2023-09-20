@extends('layouts.master')

@section('content')

<div class="row">



    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Siswa <a href="/{{ auth()->user()->role }}/siswa/create" class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable1">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Siswa</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jenis Kelamin</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $key=>$row)
                                @php
                                $dsiswa=\App\Models\Siswa::find($row->user_id);

                                @endphp

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->no_anggota }}</td>
                                    <td>{{ $dsiswa->nisn }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $dsiswa->nohp }}</td>
                                    <td>{{ $row->jk }}</td>

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/siswa/{{ $row->id }}/cetak" class="btn btn-icon btn-sm btn-primary" target="_blank" title="Cetak Guru"><i class="far fa-folder-open"></i></a>
                                        <a href="/{{ auth()->user()->role }}/siswa/{{ $row->id }}/edit" class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/{{ auth()->user()->role }}/siswa/{{ $row->id }}/destroy" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

