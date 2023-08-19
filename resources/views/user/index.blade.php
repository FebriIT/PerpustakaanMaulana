@extends('layouts.master')

@section('content')

<div class="row">
    

   
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Data User <a href="/{{ auth()->user()->role }}/user/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
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
                                @foreach ($data as $key=>$row)
                                @php
                                $admin=\App\Models\Admin::find($row->no_anggota);

                                //dd($dsiswa);
                                $kaperpus=\App\Models\Kaperpus::find($row->no_anggota);

                                @endphp

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    @if($row->role=='admin')
                                    <td>AD{{ $row->id }}</td>
                                    @elseif($row->role=='kaperpus')
                                    <td>KP{{ $row->id }}</td>
                                    @endif
                                    @if($row->role=='admin')
                                    
                                        <td>{{ $admin->nip }}</td>


                                    @elseif($row->role=='kaperpus')
                                        <td>{{ $kaperpus->nip }}</td>
                                    
                                    @endif
                                    
                                    <td>{{ $row->name }}</td>
                                    @if($row->role=='admin')
                                        <td>{{ $admin->nohp }}</td>
                                    @elseif($row->role=='kaperpus')
                                        <td>{{ $kaperpus->nohp }}</td>

                                    @endif

                                    {{-- <td>{{ $row->nohp }}</td> --}}
                                    <td>{{ $row->jk }}</td>
                                    
                                    <td>{{ $row->role }}</td>

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

    
</div>

@endsection
