<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Kaperpus;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::where('role','admin')->orwhere('role','kaperpus')->get();
        $siswa=Siswa::all();
        $anggota=user::where('role','guru')->orwhere('role','siswa')->get();
        $kaperpus=Kaperpus::all();
        return view('user.index',compact('data','siswa','anggota','kaperpus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=User::all()->last()->no_anggota+1;
        // dd($data);
        return view('user.tambah',compact('data'));
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
            'name' => 'required|max:50',
            'no_anggota'=>'unique:users,no_anggota|max:50',
            'username'=>'required|unique:users|max:50',
            'nohp' => 'required|max:13',
            'role' => 'required',

        ]);
        // dd($request->all());
        $data=new User;
        
        $data->jk=$request->jk;
        $data->name=$request->name;
        $data->username=$request->username;
        $data->role=$request->role;
        $data->password=bcrypt($request->password);
        
        if($request->role=='admin'){
            $guru=new Admin();
        
            $guru->nip=$request->nip;
            $guru->nama=$request->name;
            $guru->jk=$request->jk;
            $guru->alamat=$request->alamat;
            $guru->tgl_lahir=$request->tgl_lahir;
            $guru->nohp=$request->nohp;
            $guru->save();
            $data->no_anggota=$guru->id;
        }elseif($request->role=='kaperpus'){
             $siswa=new Kaperpus();
            
            $siswa->nip=$request->nip;
            $siswa->nama=$request->name;
            $siswa->jk=$request->jk;
            $siswa->alamat=$request->alamat;
            $siswa->tgl_lahir=$request->tgl_lahir;
            $siswa->nohp=$request->nohp;
            $siswa->save();
            $data->no_anggota=$siswa->id;

        }
        
        $data->save();

        return redirect('/admin/user')->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::find($id);
        $admin=Admin::find($data->no_anggota);
        $kaperpus=Kaperpus::find($data->no_anggota);
        return view('user.edit',compact('data','admin','kaperpus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=User::find($id);
        
        
        if($data->role=='Admin'){
            Admin::find($data->no_anggota)->update([
                'nip'=>$request->nip,
                'nama'=>$request->name,
                'jk'=>$request->jk,
                'nohp'=>$request->nohp,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat
            ]);
        }elseif($data->role=='kaperpus'){
            Kaperpus::find($data->no_anggota)->update([
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

        return redirect('/admin/user')->with('sukses','Data Berhasil Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user->role=='guru'){
            $guru=Admin::find($user->no_anggota);
            $guru->delete();
        }elseif($user->role=='siswa'){
            $siswa=Kaperpus::find($user->no_anggota);
            $siswa->delete();
        }
        
        // $transaksi=Transaksi::where('user_id',$id)->delete();
        
        $user->delete();
        return redirect()->route('user.index')->with('sukses','Data Berhasil Dihapus');
        $data=User::find($id);
        
    }
}
