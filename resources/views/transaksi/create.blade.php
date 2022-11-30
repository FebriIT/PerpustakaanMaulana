@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Transaksi Baru</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/{{ auth()->user()->role }}/buku/peminjaman/store" method="POST">
            @csrf
            <div class="row">
                {{-- <input type="hidden" name="id" class="form-control" value="{{ $data->id }}" required> --}}
                <div class="col-6">
                    <h4>Data Peminjam</h4>
                    <div class="form-group">
                        <label>Anggota</label>
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="" aria-label="">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" aria-label="">
                            <div class="input-group-append">
                                <button class="btn btn-primary"  id="btnmodalanggota" type="button">Cari Anggota</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name1" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Nomor Anggota</label>
                        <input type="number" id="no_anggota" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="number" name="nohp" id="nohp" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" disabled class="form-control" value="{{ $datenow }}" required>

                    </div>

                </div>
                <div class="col-6">
                    <h4>Deskripsi Buku</h4>

                    <div class="form-group">
                        <label>Buku </label>
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control" id="buku_id" name="buku_id" placeholder="" aria-label="">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="" aria-label="" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary"  id="btnmodalbuku" type="button">Cari Buku</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>IdBuku</label>
                        <input type="text" disabled name="idbuku" id="bukuid" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" disabled name="pengarang" id="pengarang" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" disabled name="tahun_terbit" id="tahunterbit" class="form-control" value="">
                    </div>
                        <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                        <input type="hidden"  name="kategori_id" id="kategori_id" class="form-control" value="">
                    </div>
                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/buku" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalAnggota">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="carianggota">
                        <thead>
                            <tr>
                                <th scope="col">No Anggota</th>
                                <th>Status</th>
                                <th scope="col">Nama</th>

                                <th scope="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $row)
                            <tr class="pilihanggota" idanggota="{{ $row->id }}" namaanggota="{{ $row->name }}" noanggota="{{ $row->no_anggota }}" nohp="{{ $row->nohp }}">
                                <th scope="row">{{ $row->no_anggota }}</th>
                                <th>{{ $row->akses }}</th>
                                <td><a href="#"> {{ $row->name }}</a></td>
                                <td>{{ $row->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalBuku">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="caribuku">
                        <thead>
                            <tr>
                                <th>Pict</th>
                                <th scope="col">Judul</th>
                                <th scope="col">IdBuku</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Rak</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $row1)
                            {{-- @dd($row1->judul) --}}
                            <tr class="pilihbuku" idBuku="{{ $row1->id }}" kategori_id="{{ $row1->kategori_id }}" judul="{{ $row1->judul }}" pengarang="{{ $row1->pengarang }}" tahunterbit="{{ $row1->tahun_terbit }}" isbn="{{ $row1->isbn }}">
                                <td  class="py-1">
                                @if($row1->cover)
                                    <img src="{{asset('storage/coverbuku/'. $row1->cover)}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                                @else
                                    <img src="{{asset('storage/coverbuku/default.jpg')}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                                @endif

                                </td>
                                <td><a href="#">{{ $row1->judul }}</a></td>
                                <td>{{ $row1->id }}</td>
                                <td>{{ $row1->pengarang }}</td>
                                <td>{{ $row1->tahun_terbit }}</td>
                                <td>{{ $row1->jumlah_buku }}</td>
                                <td>{{ $row1->lokasi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#carianggota').DataTable();
        $('#caribuku').DataTable();
        $('#btnmodalanggota').click(function(){
            $('#modalAnggota').modal('show');
            $('#carianggota').on("click",".pilihanggota",function(e){
                var idanggota=$(this).attr('idanggota');
                var nmanggota=$(this).attr('namaanggota');
                var noanggota=$(this).attr('noanggota');
                var nohp=$(this).attr('nohp');
                $('#modalAnggota').modal('hide');
                $('#user_id').val(idanggota);
                $('#name').val(noanggota+' - '+nmanggota);
                $('#name1').val(nmanggota);
                $('#no_anggota').val(noanggota);
                $('#nohp').val(nohp);
            });

        });

        $('#btnmodalbuku').click(function(){
            $('#modalBuku').modal('show');
            $('#caribuku').on("click",".pilihbuku",function(e){

                var isbn=$(this).attr('isbn');
                var idbuku=$(this).attr('idBuku');
                var judul=$(this).attr('judul');
                var pengarang=$(this).attr('pengarang');
                var tahunterbit=$(this).attr('tahunterbit');
                var kategori_id=$(this).attr('kategori_id');

                console.log(judul);
                $('#modalBuku').modal('hide');
                $('#buku_id').val(idbuku);
                $('#judul').val(judul);
                $('#kategori_id').val(kategori_id);

                $('#bukuid').val(idbuku)
                $('#pengarang').val(pengarang);
                $('#tahunterbit').val(tahunterbit);
            });
        });
    });
</script>
@endsection
