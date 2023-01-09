<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaperpus extends Model
{
    use HasFactory;
    protected $table='kepala_perpustakaan';
    protected $fillable=['kode_anggota','nama','jk','nohp'];
}
