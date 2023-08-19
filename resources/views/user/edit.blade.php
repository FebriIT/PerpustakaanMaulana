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

        <form action="/{{ auth()->user()->role }}/user/{{ $data->id }}/update" method="POST">

            @csrf
            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        @if($data->role=='admin')
                        <label>NIP <span style="color:red;">*</span></label>
                        <input type="number" name="nip" class="form-control" value="{{ $admin->nip }}" required>

                        @elseif($data->role=='kaperpus')
                        <label>Nip <span style="color:red;">*</span></label>

                        <input type="number" name="nip" class="form-control" value="{{ $kaperpus->nip }}" required>


                        @endif

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
                        @if($data->role=='admin')

                        <input type="number" name="nohp" class="form-control" value="{{ $admin->nohp }}">


                        @elseif($data->role=='kaperpus')
                        <input type="number" name="nohp" class="form-control" value="{{ $kaperpus->nohp }}">


                        @endif

                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir <span style="color:red;">*</span></label>

                        @if($data->role=='admin')
                        <input type="date" name="tgl_lahir" class="form-control" value="{{ $admin->tgl_lahir }}" required>


                        @elseif($data->role=='kaperpus')

                        <input type="date" name="tgl_lahir" class="form-control" value="{{ $kaperpus->tgl_lahir }}" required>

                        @endif

                    </div>
                    <div class="form-group">
                        <label>Alamat <span style="color:red;">*</span></label>

                        @if($data->role=='admin')
                        <textarea name="alamat" class="form-control" id="" cols="10" rows="20">{{ $admin->alamat }}</textarea>


                        @elseif($data->role=='kaperpus')
                        <textarea name="alamat" class="form-control" id="" cols="10" rows="20">{{ $kaperpus->alamat }}</textarea>

                        @endif

                    </div>



                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/user" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection

