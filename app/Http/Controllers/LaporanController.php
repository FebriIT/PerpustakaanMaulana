<?php

namespace App\Http\Controllers;


use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporananggota()
    {
        return view('laporan.anggota');
    }
    public function laporanbuku()
    {
        return view('laporan.buku');
    }
    public function laporantransaksi()
    {
        return view('laporan.transaksi');
    }

    public function dwanggota (Request $req)
    {
        $tglskrng=date('d F Y', strtotime(now()));
        $mulai=$req->mulai;
        $akhir=$req->akhir;
        // $p=DB::select('SELECT anggota .*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Pinjam" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        $p=DB::select('SELECT * FROM `users` WHERE created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp,transaksi.created_at FROM transaksi JOIN users on
        // transaksi.user_id=users.id WHERE DATE(transaksi.created_at) <=? AND transaksi.status="Pinjam" AND DATE(transaksi.created_at)>=?', [$req->mulai,$req->akhir]);

        // dd($req->all());
        view()->share('p', $p);
        $pdf_doc = PDF::loadView('laporan.lapanggota', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-anggota.pdf');

    }
    public function dwbuku(Request $req)
    {

        $tglskrng=date('d F Y', strtotime(now()));

        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT * FROM `buku` WHERE created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        // dd($ps);
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.lapbuku', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-buku.pdf');
    }
    public function dwtransaksi(Request $req)
    {
        $tglskrng=date('d F Y', strtotime(now()));

        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT transaksi.*,users.name,buku.isbn,tgl_pinjam,tgl_kembali,transaksi.status,buku.judul FROM `transaksi` JOIN users ON users.id=transaksi.user_id JOIN buku ON buku.id=transaksi.buku_id WHERE transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // dd($ps);
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.laptransaksi', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-transaksi.pdf');
    }
}
