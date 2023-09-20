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

        <form action="/{{ auth()->user()->role }}/siswa/{{ $data->id }}/update" method="POST">

            @csrf
            <div class="row">
                <div class="col-6">

                    <div class="form-group">


                        <label>NISN <span style="color:red;">*</span></label>

                        <input type="number" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama <span style="color:red;">*</span></label>

                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>


                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin <span style="color:red;">*</span></label>

                        <select class="form-control" name="jk" required>
                            <option value="">-Pilih-</option>
                            <option value="Laki-Laki" @if(auth()->user()->jk=='Laki-Laki')selected @endif>Laki-Laki</option>
                            <option value="Perempuan" @if(auth()->user()->jk=='Perempuan')selected @endif>Perempuan</option>


                        </select>
                    </div>





                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="nohp" class="form-control" value="{{ $siswa->nohp }}">

                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir <span style="color:red;">*</span></label>

                        <input type="date" name="tgl_lahir" class="form-control" value="{{ $siswa->tgl_lahir }}" required>

                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color:red;">*</span></label>


                        <textarea name="alamat" class="form-control" id="" cols="10" rows="20">{{ $siswa->alamat }}</textarea>

                    </div>



                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/siswa" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection

