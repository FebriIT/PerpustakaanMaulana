@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Buku</h4>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="isbn" class="form-control col-6"  required>
            </div>

            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Jumlah Buku</label>
                <input type="number" name="jumlah_buku" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"  cols="30" class="form-control col-6" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control col-6" name="lokasi" required>
                    <option value="">-Pilih-</option>
                    <option value="Rak 1">Rak 1</option>
                    <option value="Rak 2">Rak 2</option>
                    <option value="Rak 3">Rak 3</option>
                    <option value="Rak 4">Rak 4</option>
                    <option value="Rak 5">Rak 5</option>
                </select>
            </div>

            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control col-6" required>
            </div>

            <a href="/{{ auth()->user()->role }}/buku" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection
