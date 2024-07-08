<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_kelas';
    protected $table = 'kelases';

    protected $fillable = [
        'nama_kelas',
    ];

    public function latihan()
    {
        return $this->hasMany(Latihan::class, 'id_kelas');
    }

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_kelas');
    }
}
