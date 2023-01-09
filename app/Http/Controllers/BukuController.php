<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Buku::orderBy('id','desc')->get();
        return view('buku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|max:255',
            'kode_buku'=>'unique:buku,kode_buku|max:25',
            'isbn'=>'unique:buku,isbn|max:25',
            'pengarang'=>'required|max:50',
            'penerbit' => 'required|max:50',
            'tahun_terbit' => 'required|max:4',
            'jumlah_buku'=>'required|max:5',
            'deskripsi'=>'required|max:255',

        ]);
        $data=new Buku;
        $data->kode_buku=$request->kode_buku;
        $data->judul=$request->judul;
        $data->isbn=$request->isbn;
        $data->pengarang=$request->pengarang;
        $data->penerbit=$request->penerbit;
        $data->tahun_terbit=$request->tahun_terbit;
        $data->jumlah_buku=$request->jumlah_buku;
        $data->deskripsi=$request->deskripsi;
        $data->lokasi=$request->lokasi;


        if ($request->has('cover')) {
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbuku', $covername);
            $data->cover = $covername;
            $data->save();
        }else{
            $data->save();
        }
        // Buku::create($request->all());
        return redirect('/'.auth()->user()->role.'/buku')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($buku)
    {
        // dd($buku);
        $data=Buku::find($buku);
        return view('buku.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required|max:255',
            'isbn'=>'unique:buku,isbn|max:25',
            'pengarang'=>'required|max:50',
            'penerbit' => 'required|max:50',
            'tahun_terbit' => 'required|max:4',
            'jumlah_buku'=>'required|max:5',
            'deskripsi'=>'required|max:255',

        ]);

        $data=Buku::find($id);


        $data->update([
            'judul'=>$request->judul,
            'isbn'=>$request->isbn,
            'pengarang'=>$request->pengarang,
            'penerbit'=>$request->penerbit,
            'tahun_terbit'=>$request->tahun_terbit,
            'jumlah_buku'=>$request->jumlah_buku,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,


        ]);
        if ($request->has('cover')) {
            unlink(public_path() . '/storage/coverbuku/' . $data->cover);
            // dd($request->file('cover'));
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbuku', $covername);

            $data->update(['cover'=>$covername]);

        }


        return redirect('/'.auth()->user()->role.'/buku')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku=Buku::find($id);


        $syarat = 'public/coverbuku/'. $buku->cover;
        // dd(Storage::exists($image_path));



        Transaksi::where('buku_id',$buku->id)->delete();
        if (Storage::exists($syarat)) {
            Storage::delete($syarat);
        }
        $buku->delete();
        return redirect('/'.auth()->user()->role.'/buku')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function pinjam($id)
    {
        $data=Buku::find($id);
        $anggota=User::where('role','user')->get();
        return view('buku.peminjaman',compact('data','anggota'));
    }
    public function pinjamstore(Request $req)
    {


        // dd($req->all());
        $transaksi=new Transaksi;
        $transaksi->user_id=$req->user_id;
        $transaksi->buku_id=$req->buku_id;
        $datenow=date('Y-m-d', strtotime(now()));
        $transaksi->tgl_pinjam=$datenow;
        $transaksi->tgl_kembali=$req->tgl_kembali;
        $transaksi->status='Dipinjam';
        //kondisi stok buku berkurang
        $buku=Buku::find($req->buku_id);

        $stokbukuberkurang=$buku->jumlah_buku-1;
        $buku->update([
            'jumlah_buku'=>$stokbukuberkurang
        ]);
        $transaksi->save();

        return redirect('/'.auth()->user()->role.'/transaksi')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $data=Buku::find($id);
        return view('buku.detail',compact('data'));
    }
}
