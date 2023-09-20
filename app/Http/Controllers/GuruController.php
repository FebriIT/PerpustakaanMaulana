<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kaperpus;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{



     public function index()
    {
        $data=User::where('role','admin')->orwhere('role','kaperpus')->get();
        $siswa=Siswa::all();
        $anggota=user::where('role','guru')->get();
        $kaperpus=Kaperpus::all();
        return view('guru.index',compact('data','siswa','anggota','kaperpus'));
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
            'nohp' => 'max:13',
        ]);
        $date = Carbon::createFromFormat('Y-m-d', $request->tgl_lahir);
        $pwdefault=$date->format('d').$date->format('m').$date->format('Y');
        // dd($pwdefault);
        $data=new User;

        $data->jk=$request->jk;
        $data->name=$request->name;

        $data->role='guru';
        $data->password=bcrypt($pwdefault);

        $guru=new Guru();

        $guru->nip=$request->nipnisn;
        $guru->nama=$request->name;
        $guru->jk=$request->jk;
        $guru->alamat=$request->alamat;
        $guru->tgl_lahir=$request->tgl_lahir;
        $guru->nohp=$request->nohp;
        $guru->save();
        $nounique=str_pad($guru->id,4,'0',STR_PAD_LEFT);
         $datenow=Carbon::now()->format('Y');
        $nouniquee='20'.$datenow.$nounique;
        $data->no_anggota=$nouniquee;
        $data->user_id=$guru->id;
        $data->username=$request->nipnisn;
        $data->save();

        return redirect('/'.auth()->user()->role.'/guru')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=User::find($id);
        $guru=Guru::find($data->user_id);
        return view('guru.edit',compact('data','guru'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $data=User::find($id);


        Guru::find($data->user_id)->update([
            'nip'=>$request->nip,
            'nama'=>$request->name,
            'jk'=>$request->jk,
            'nohp'=>$request->nohp,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat
        ]);
        $data->update([
            'nama'=>$request->name,
            'jk'=>$request->jk,
        ]);

        return redirect('/'.auth()->user()->role.'/guru')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $user=User::find($id);

        $siswa=Guru::find($user->user_id);
        $siswa->delete();

        $transaksi=Transaksi::where('user_id',$id)->delete();

        $user->delete();
        return redirect('/'.auth()->user()->role.'/guru')->with('sukses','Data Berhasil Dihapus');
    }

    public function cetak($id) {
        $p=User::find($id);
        $guru=Guru::find($p->user_id);
        return view('guru.cetak',compact('p','guru'));
    }

}
