<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data=Siswa::all();
        $anggota=user::where('role','siswa')->get();

        return view('siswa.index',compact('data','anggota'));
    }

    public function create()
    {
        $data=User::all()->last()->user_id+1;
        return view('siswa.tambah',compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:50',
            'no_anggota'=>'unique:users,no_anggota|max:50',
            'nohp' => 'max:13',
        ]);
        // dd(str_pad(100,4,'0',STR_PAD_LEFT));

        // $data->no_anggota='80'.$no;
        $date = Carbon::createFromFormat('Y-m-d', $request->tgl_lahir);
        $pwdefault=$date->format('d').$date->format('m').$date->format('Y');
        $data=new User;

        $data->jk=$request->jk;
        $data->name=$request->name;

        $data->role='siswa';
        $data->password=bcrypt($pwdefault);


        $siswa=new Siswa();

        // $siswa->kodesiswa=;

       $siswa->nisn=$request->nipnisn;
       $siswa->nama=$request->name;
       $siswa->jk=$request->jk;
       $siswa->alamat=$request->alamat;
       $siswa->tgl_lahir=$request->tgl_lahir;
       $siswa->nohp=$request->nohp;
       $siswa->save();

        $nounique=str_pad($siswa->id,4,'0',STR_PAD_LEFT);
        $datenow=Carbon::now()->format('Y');
        $nouniquee='10'.$datenow.$nounique;

        //    dd($nouniquee);
        $data->no_anggota=$nouniquee;
        $data->user_id=$siswa->id;
        $data->username=$request->nipnisn;
        $data->save();

        return redirect('/'.auth()->user()->role.'/siswa')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=User::find($id);
        $siswa=Siswa::find($data->user_id);
        // dd($siswa->nohp);
        return view('siswa.edit',compact('data','siswa',));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $data=User::find($id);


        Siswa::find($data->user_id)->update([
            'nisn'=>$request->nisn,
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

        return redirect('/'.auth()->user()->role.'/siswa')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $user=User::find($id);

        $siswa=Siswa::find($user->user_id);
        $siswa->delete();

        $transaksi=Transaksi::where('user_id',$id)->delete();

        $user->delete();
        return redirect('/'.auth()->user()->role.'/siswa')->with('sukses','Data Berhasil Dihapus');
    }

    public function cetak($id) {
        $p=User::find($id);
        $siswa=Siswa::find($p->user_id);
        return view('siswa.cetak',compact('p','siswa'));
    }
}
