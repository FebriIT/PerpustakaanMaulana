<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $data=Guru::all();
        return view('guru.index',compact('data'));
    }

    public function create()
    {
        $data=User::all()->last()->no_anggota+1;
        return view('guru.tambah',compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:50',
            'no_anggota'=>'unique:users,no_anggota|max:50',
            'username'=>'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:20',
            'nohp' => 'required|max:13',

        ]);
        // dd($request->all());
        $data=new User;
        $data->no_anggota=$request->no_anggota;
        $data->jk=$request->jk;
        $data->nohp=$request->nohp;
        $data->name=$request->name;
        $data->username=$request->username;
        $data->role='guru';
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        
        $guru=new Guru();
        
        $guru->nip=$request->nip;
        $guru->umur=$request->umur;
        $guru->kode_anggota=$request->no_anggota;
        $guru->nama=$request->name;
        $guru->nohp=$request->nohp;
        $guru->jk=$request->jk;
        $guru->save();
        $data->save();
        return redirect('/admin/user')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=Guru::find($id);
        return view('guru.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $data=Guru::find($id)->update([
            'nip'=>$request->nip,
            'nama'=>$request->name,
            'umur'=>$request->umur,
            'nohp'=>$request->nohp,
            'kode_anggota'=>$request->kode_anggota,
            'jk'=>$request->jk,
        ]);

        return redirect('/admin/user')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $guru=Guru::find($id);
        $data=User::where('no_anggota',$guru->kode_anggota);
        
        $transaksi=Transaksi::where('user_id',$data->first()->id)->delete();
        
        $data->delete();
        $guru->delete();
        return redirect()->route('user.index')->with('sukses','Data Berhasil Dihapus');
    }
}
