@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Siswa</h4>
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
        <form action="/{{auth()->user()->role}}/siswa/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        <label>NISN <span style="color:red;">*</span></label>

                        <input type="number" name="nipnisn" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama <span style="color:red;">*</span></label>

                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin <span style="color:red;">*</span></label>

                        <select class="form-control" name="jk" required>
                            <option value="">-Pilih-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>



                     <div class="form-group">
                         <label>Tanggal Lahir <span style="color:red;">*</span></label>

                         <input type="date" name="tgl_lahir" class="form-control" required>
                     </div>


                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Alamat <span style="color:red;">*</span></label>

                        <textarea name="alamat" class="form-control" id="" cols="10" rows="20"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="nohp" class="form-control" >
                    </div>




                    {{-- <div class="form-group">
                        <label>Username <span style="color:red;">*</span></label>

                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password <span style="color:red;">*</span></label>

                        <input type="password" name="password" class="form-control" required>
                    </div> --}}
                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/siswa" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection


