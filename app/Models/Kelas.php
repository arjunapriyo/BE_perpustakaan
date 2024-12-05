<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $timestamps = null;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas', 'kelompok'];

    // Relasi ke model Siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
