<?php

namespace App\Http\Controllers;


use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buku=Buku::all()->count();

        $transaksi=Transaksi::all()->count();
        $user=User::all()->count();
        $anggota=User::where('role','user')->count();
        // dd($anggota);
        return view('dashboard',compact('buku','transaksi','user','anggota'));
    }
}
