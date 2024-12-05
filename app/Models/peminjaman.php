<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_buku';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_buku','tgl_pinjam','tgl_kembali'];
}