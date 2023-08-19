@extends('layouts.master')

@section('content')
<div class="card">
     <div class="card-header">
        <h4>Laporan Peminjaman</h4>
    </div>
    <div class="card-body"> 
        <form action="/{{ auth()->user()->role }}/laporantransaksi/download" enctype="multipart/form-data" method="POST" target="_blank">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="mulai" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="akhir" class="form-control" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Kategori Status <span style="color:red;"><i>(optional)</i></span></label>

                        <select class="form-control" name="status" >
                            <option value="">-Pilih-</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                            <option value="Terlambat">Terlambat</option>
                            <option value="Dipinjam">Dipinjam</option>

                        </select>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>


        </form>

        {{-- <a href="/peminjaman/harian" class="btn btn-primary">Harian</a>
        <a href="/peminjaman/bulanan" class="btn btn-primary">Bulanan</a>
        <a href="/peminjaman/tahunan" class="btn btn-primary">Tahunan</a> --}}
    </div>
</div>
@endsection

