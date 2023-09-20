<?php

namespace App\Http\Controllers;


use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Http::asForm()->post('https://app.whacenter.com/api/send',[
        //     'device_id'=>'962984a11858bb6e7df91d9012c9be79',
        //     'number'=>'085266911477',
        //     'message'=>'Mantap',
        // ]);
        $buku=Buku::all()->count();
        if(auth()->user()->role=='admin'||auth()->user()->role=='kaperpus'){

            $transaksi=Transaksi::all()->count();
        }else{
            $transaksi=Transaksi::where('user_id',auth()->user()->id)->count();

        }
        $user=User::all()->count();
        $guru=User::where('role','guru')->count();
        $siswa=User::where('role','siswa')->count();
        $anggota=$guru+$siswa;
        // dd($anggota);
        return view('dashboard',compact('buku','transaksi','user','anggota'));
    }
}
