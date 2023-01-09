@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="section-title">Buku
            @if (Auth::user()->role=='admin' || Auth::user()->role=='kaperpus' )

            <a href="/{{ auth()->user()->role }}/buku/create" class="btn btn-sm btn-warning float-right">Tambah Data</a>
            @endif
        </div>
        <section class="section">
            @include('sweetalert::alert')
            <div class="table-responsive">

                <table class="table table-sm" id="datatable">
                    <thead>
                        <tr>
                            <th>Pict</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Rak</th>

                            @if(Auth::user()->role=='admin'||Auth::user()->role=='kaperpus')
                            <th style="width: 50px">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td  class="py-1">
                            @if($row->cover)
                                <img src="{{asset('storage/coverbuku/'. $row->cover)}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                            @else
                                <img src="{{asset('storage/coverbuku/default.jpg')}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                            @endif

                            </td>
                            <td>{{ $row->kode_buku }}</td>
                            <td>{{ $row->judul }}</td>

                            <td>{{ $row->pengarang }}</td>
                            <td>{{ $row->tahun_terbit }}</td>
                            <td>{{ $row->jumlah_buku }}</td>
                            <td>{{ $row->lokasi }}</td>
                            <td>
                                @if (Auth::user()->role=='admin'||Auth::user()->role=='kaperpus')
                                {{-- <a href="/admin/buku/{{ $row->id }}/pinjam" class="btn btn-icon btn-sm btn-primary" title="Pinjam Buku"><i class="fas fa-book"></i></a> --}}
                                    <a href="/{{ auth()->user()->role }}/buku/{{ $row->id }}/edit" class="btn btn-icon btn-sm btn-warning" title="Edit Buku"><i class="far fa-edit"></i></a>
                                    <a href="/{{ auth()->user()->role }}/buku/{{ $row->id }}/delete" class="btn btn-icon btn-sm btn-danger" onclick="return(confirm('Apakah anda yakin inggin menghapus data ini?'))" title="Edit Buku"><i class="fas fa-trash"></i></a>
                                    <a href="/{{ auth()->user()->role }}/buku/{{ $row->id }}/detail" class="btn btn-icon btn-sm btn-primary" title="Edit Buku"><i class="far fa-open"></i></a>
                                    
                               
                                    @else
                                    <a href="/{{ Auth::user()->role }}/buku/{{ $row->id }}/detail">{{ $row->id }}</a>

                                
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')

<script>

</script>
{{-- <script src="{{ asset('sweeta') }}"></script> --}}
@endsection
