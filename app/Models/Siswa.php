<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $timestamps = null;
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_siswa', 'tanggal_lahir', 'gender', 'alamat', 'id_kelas'];

    // Relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}

