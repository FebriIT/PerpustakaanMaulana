<?php

namespace App\Http\Controllers;


use App\Models\Transaksi;
use App\Models\User;
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

    public function laporandenda(){
        return view('laporan.laporandenda');
    }
    public function laporanpendaftaran(){
        return view('laporan.laporanpendaftaran');
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

        return $pdf_doc->stream('laporan-anggota.pdf');
        // return response()->file($pdf_doc);

    }
    public function dwsemuaanggota ()
    {
        $tglskrng=date('d F Y', strtotime(now()));
       
        // $p=DB::select('SELECT anggota .*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Pinjam" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        $p=User::where('role','siswa')->Orwhere('role','guru')->get();
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp,transaksi.created_at FROM transaksi JOIN users on
        // transaksi.user_id=users.id WHERE DATE(transaksi.created_at) <=? AND transaksi.status="Pinjam" AND DATE(transaksi.created_at)>=?', [$req->mulai,$req->akhir]);

        // dd($req->all());
        view()->share('p', $p);
        $pdf_doc = PDF::loadView('laporan.lapsemuaanggota', compact('p','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->stream('laporan-seluruh-anggota.pdf');
        // return response()->file($pdf_doc);

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

        return $pdf_doc->stream('laporan-buku.pdf');
    }   
    public function dwtransaksi(Request $req)
    {
        // dd($req->all());
        $tglskrng=date('d F Y', strtotime(now()));
        $mulai=$req->mulai;
        $akhir=$req->akhir;
        if($req->status!=null){
            // dd($req->all());
            $status=$req->status;
            $p=DB::select('SELECT transaksi.*,users.name,buku.isbn,tgl_pinjam,tgl_kembali,transaksi.status,buku.judul FROM `transaksi` JOIN users ON users.id=transaksi.user_id JOIN buku ON buku.id=transaksi.buku_id  WHERE transaksi.status=? AND transaksi.created_at BETWEEN ? AND ?',[$status,$mulai,$akhir]);
            
        }else{
            $p=DB::select('SELECT transaksi.*,users.name,buku.isbn,tgl_pinjam,tgl_kembali,transaksi.status,buku.judul FROM `transaksi` JOIN users ON users.id=transaksi.user_id JOIN buku ON buku.id=transaksi.buku_id WHERE transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);

        }
        
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // dd($ps);
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.laptransaksi', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->stream('laporan-transaksi.pdf');
    }
    public function dwdenda(Request $req)
    {
        // dd($req->all());
        $tglskrng=date('d F Y', strtotime(now()));
        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT transaksi.*,users.name,buku.isbn,tgl_pinjam,tgl_kembali,transaksi.status,buku.judul FROM `transaksi` JOIN users ON users.id=transaksi.user_id JOIN buku ON buku.id=transaksi.buku_id  WHERE transaksi.status="Terlambat" AND transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        $dcount=DB::table('transaksi')
        ->where('status','Terlambat')
        ->whereBetween('created_at',[$mulai,$akhir])
        ->count();
        
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.lapdenda', compact('p','mulai','akhir','tglskrng','dcount'))->setPaper('a4', 'landscape');

        return $pdf_doc->stream('laporan-denda.pdf');
    }

    public function dwpendaftaran(Request $req)
    {
       
        $tglskrng=date('d F Y', strtotime(now()));
        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT users.* FROM `users`  WHERE users.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
       
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.lappendaftaran', compact('p','mulai','akhir','tglskrng',
        ))->setPaper('a4', 'landscape');

        return $pdf_doc->stream('laporan-denda.pdf');
    }

   
}
