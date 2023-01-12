@extends('layouts.master')

@section('content')

<div class="row">
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
                                @foreach ($data as $key=>$row)

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
    
</div>

@endsection
