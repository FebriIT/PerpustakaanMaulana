<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kaperpus;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
     

    
     public function index()
    {
        $data=User::where('role','admin')->orwhere('role','kaperpus')->get();
        $siswa=Siswa::all();
        $anggota=user::where('role','guru')->orwhere('role','siswa')->get();
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
            'username'=>'required|unique:users|max:50',
            'nohp' => 'max:13',
            'role' => 'required',

        ]);
        // dd($request->all());
        $data=new User;
        
        $data->jk=$request->jk;
        $data->name=$request->name;
        $data->username=$request->username;
        $data->role=$request->role;
        $data->password=bcrypt($request->password);
        
        if($request->role=='guru'){
            $guru=new Guru();
        
            $guru->nip=$request->nipnisn;
            $guru->nama=$request->name;
            $guru->jk=$request->jk;
            $guru->alamat=$request->alamat;
            $guru->tgl_lahir=$request->tgl_lahir;
            $guru->nohp=$request->nohp;
            $guru->save();
            $data->no_anggota=$guru->id;
        }elseif($request->role=='siswa'){
             $siswa=new Siswa();
            
            $siswa->nisn=$request->nipnisn;
            $siswa->nama=$request->name;
            $siswa->jk=$request->jk;
            $siswa->alamat=$request->alamat;
            $siswa->tgl_lahir=$request->tgl_lahir;
            $siswa->nohp=$request->nohp;
            $siswa->save();
            $data->no_anggota=$siswa->id;

        }
        
        $data->save();

        return redirect('/admin/anggota')->with('sukses','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data=User::find($id);
        $siswa=Siswa::find($data->no_anggota);
        $guru=Guru::find($data->no_anggota);
        return view('guru.edit',compact('data','siswa','guru'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $data=User::find($id);
        
        
        if($data->role=='siswa'){
            Siswa::find($data->no_anggota)->update([
                'nisn'=>$request->nisn,
                'nama'=>$request->name,
                'jk'=>$request->jk,
                'nohp'=>$request->nohp,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat
            ]);
        }elseif($data->role=='guru'){
            Guru::find($data->no_anggota)->update([
                'nip'=>$request->nip,
                'nama'=>$request->name,
                'jk'=>$request->jk,
                'nohp'=>$request->nohp,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat
            ]);
        }
        $data->update([
            'nama'=>$request->name,
            'jk'=>$request->jk,
        ]);

        return redirect('/admin/anggota')->with('sukses','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        if($user->role=='guru'){
            $guru=Guru::find($user->no_anggota);
            $guru->delete();
        }elseif($user->role=='siswa'){
            $siswa=Siswa::find($user->no_anggota);
            $siswa->delete();
        }
        
        $transaksi=Transaksi::where('user_id',$id)->delete();
        
        $user->delete();
        return redirect()->route('anggota.index')->with('sukses','Data Berhasil Dihapus');
    }

    public function cetak($id) {
        $p=User::find($id);
        // dd($p->name);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        // dd($ps);
        view()->share('p', $p);
        // dd('ok');
        $pdf_doc = PDF::loadView('laporan.kartuanggota', compact('p',))->setPaper('catalog #10 1/2 envelope','portrait');
        // $pdf_doc = PDF::loadView('laporan.kartuanggota', compact('p',))->setPaper([0, 0, 55, 88], 'landscape');
        return $pdf_doc->stream('laporan-kartuanggota.pdf');

    }
}
