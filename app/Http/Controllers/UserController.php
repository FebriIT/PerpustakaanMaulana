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
        $data=User::all();
        return view('user.index',compact('data'));
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
        dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:50',
            'no_anggota'=>'unique:users,no_anggota|max:50',
            'username'=>'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:20',
            'nohp' => 'required|max:13',
            'username'=>'required|max:15'

        ]);
        // dd($request->all());
        $data=new User;
        $data->no_anggota=$request->no_anggota;
        $data->jk=$request->jk;
        $data->nohp=$request->nohp;
        $data->name=$request->name;
        $data->username=$request->username;
        $data->role=$request->role;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);

        if($request->role=='admin'){
            $admin=new Admin;
            $admin->kode_anggota=$request->no_anggota;
            $admin->nama=$request->name;
            $admin->nohp=$request->nohp;
            $admin->jk=$request->jk;
            $admin->save();
        }elseif($request->role=='kaperpus'){
            $kaperpus=new Kaperpus();
            $kaperpus->kode_anggota=$request->no_anggota;
            $kaperpus->nama=$request->name;
            $kaperpus->nohp=$request->nohp;
            $kaperpus->jk=$request->jk;
            $kaperpus->save();
        }elseif($request->role=='guru'){
            $guru=new Guru();
            $guru->kode_anggota=$request->no_anggota;
            $guru->nama=$request->name;
            $guru->nohp=$request->nohp;
            $guru->jk=$request->jk;
            $guru->save();
        }elseif($request->role=='siswa'){
            $siswa=new Siswa();
            $siswa->kode_anggota=$request->no_anggota;
            $siswa->nama=$request->name;
            $siswa->nohp=$request->nohp;
            $siswa->jk=$request->jk;
            $siswa->save();
        }
        

        $data->save();
        return redirect()->route('user.index')->with('sukses','Data Berhasil Disimpan');
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
        return view('user.edit',compact('data'));
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
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:50',
            'nohp' => 'required|max:13',

        ]);
        $data=User::find($id);

        if($request->password!=null){
            $data->update(['jk'=>$request->jk,'nohp'=>$request->nohp,'name'=>$request->name,'password'=>bcrypt($request->password)]);
        }else{
            $data->update(['jk'=>$request->jk,'nohp'=>$request->nohp,'name'=>$request->name]);
        }
        return redirect()->route('user.index')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::find($id);
        $image = 'public/avatar/' . $data->name . '/'.$data->avatar ;
            // dd(Storage::exists($image));
            if (Storage::exists($image)) {

                Storage::delete($image);
            }
        $transaksi=Transaksi::where('user_id',$id)->delete();
        
        $data->delete();
        return redirect()->route('user.index')->with('sukses','Data Berhasil Dihapus');
    }
}
