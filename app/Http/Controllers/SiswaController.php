<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data=Siswa::all();
        return view('siswa.index',compact('data'));
    }

    public function create()
    {
        $data=User::all()->last()->no_anggota+1;
        return view('siswa.tambah',compact('data'));
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
        $data=new User();
        $data->no_anggota=$request->no_anggota;
        $data->jk=$request->jk;
        $data->nohp=$request->nohp;
        $data->name=$request->name;
        $data->username=$request->username;
        $data->role='siswa';
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        
        $guru=new Siswa();
        
        $guru->nisn=$request->nisn;
        $guru->umur=$request->umur;
        $guru->kode_anggota=$request->no_anggota;
        $guru->nama=$request->name;
        $guru->nohp=$request->nohp;
        $guru->jk=$request->jk;
        $guru->alamat=$request->alamat;
        $guru->tgl_lahir=$request->tgl_lahir;
        $guru->save();
        $data->save();
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('siswa.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $data=Siswa::find($id)->update([
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'umur'=>$request->umur,
            'nohp'=>$request->nohp,
            'jk'=>$request->jk,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
        ]);

        return redirect('/admin/siswa')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $guru=Siswa::find($id);
        $data=User::where('no_anggota',$guru->kode_anggota);
        
        $transaksi=Transaksi::where('user_id',$data->first()->id)->delete();
        
        $data->delete();
        $guru->delete();
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Dihapus');
    }
}
