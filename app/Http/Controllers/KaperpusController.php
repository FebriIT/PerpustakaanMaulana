<?php

namespace App\Http\Controllers;

use App\Models\Kaperpus;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class KaperpusController extends Controller
{
    public function index()
    {
        $data=Kaperpus::all();
        return view('kaperpus.index',compact('data'));
    }

    public function create()
    {
        $data=User::all()->last()->no_anggota+1;
        return view('kaperpus.tambah',compact('data'));
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
        $data->role='kaperpus';
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        
        
        $data->save();
        return redirect('/admin/user')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=Kaperpus::find($id);
        return view('kaperpus.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $data=Kaperpus::find($id)->update([
            'nip'=>$request->nip,
            'nama'=>$request->name,
            'umur'=>$request->umur,
            'tgl_lahir'=>$request->tgl_lahir,
            'nohp'=>$request->nohp,
            'jk'=>$request->jk,
        ]);

        return redirect('/admin/user')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $guru=Kaperpus::find($id);
        $data=User::where('no_anggota',$guru->kode_anggota);
        
        $transaksi=Transaksi::where('user_id',$data->first()->id)->delete();
        
        $data->delete();
        $guru->delete();
        return back()->with('sukses','Data Berhasil Dihapus');
    }
}
