<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id_materi';
    protected $table = 'materis';

    protected $fillable = [
        'id_kelas',
        'title',
        'content',
        'file_path',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class, 'id_materi');
    }
}
