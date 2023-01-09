<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksi';
    protected $fillable=['kode_transaksi','user_id','buku_id','tgl_pinjam','kategori_id','tgl_kembali','status'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }

}
