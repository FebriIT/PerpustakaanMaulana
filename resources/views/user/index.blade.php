@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Admin <a href="/{{ auth()->user()->role }}/user/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Anggota</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    {{--  <th scope="col">Akses</th>  --}}

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$row)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->no_anggota }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    {{--  <td>{{ $row->role }}</td>  --}}

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/user/{{ $row->id }}/edit"
                                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/user/{{ $row->id }}/destroy"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Kaperpus <a href="/{{ auth()->user()->role }}/kaperpus/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Kaperpus</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kaperpus as $key=>$row)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->kode_anggota }}</td>
                                    <td>{{ $row->nip }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->nohp }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>{{ $row->umur }}</td>

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/kaperpus/{{ $row->id }}/edit"
                                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/kaperpus/{{ $row->id }}/destroy"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Guru <a href="/{{ auth()->user()->role }}/guru/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Guru</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $key=>$row)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->kode_anggota }}</td>
                                    <td>{{ $row->nip }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->nohp }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>{{ $row->umur }}</td>

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/guru/{{ $row->id }}/edit"
                                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/guru/{{ $row->id }}/destroy"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data Siswa <a href="/{{ auth()->user()->role }}/siswa/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Siswa</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    {{--  <th scope="col">Alamat</th>  --}}
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $key=>$row)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->kode_anggota }}</td>
                                    <td>{{ $row->nisn }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->nohp }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>{{ $row->umur }}</td>
                                    {{--  <td>{{ $row->alamat }}</td>  --}}

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/siswa/{{ $row->id }}/edit"
                                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/siswa/{{ $row->id }}/destroy"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
