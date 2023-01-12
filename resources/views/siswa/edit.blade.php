@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit User</h4>
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
        <form action="{{ route('siswa.update',$data->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="number" name="nisn" class="form-control" value="{{ $data->nisn }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk" required>
                            <option value="">-Pilih-</option>
                            <option @if($data->jk=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                            <option @if($data->jk=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    
                    
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="umur"  value="{{ $data->umur }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="nohp"  value="{{ $data->nohp }}" class="form-control" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ $data->tgl_lahir }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" id="" cols="10" rows="20">{{ $data->alamat }}</textarea>
                    </div>
                    
                </div>
            </div>
            {{-- {{ method_field('put') }} --}}

            <a href="/{{ auth()->user()->role }}/anggota" class="btn btn-warning ">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection
