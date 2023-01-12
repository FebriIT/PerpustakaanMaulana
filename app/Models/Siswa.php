<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table='siswa';
    protected $fillable=['nisn','kode_anggota','nama','jk','nohp','umur','tgl_lahir','alamat'];
}
