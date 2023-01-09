<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table='buku';
    protected $fillable=['kode_buku','judul','isbn','pengarang','penerbit','tahun_terbit','jumlah_buku','deskripsi','lokasi','cover'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class)
        ;
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
