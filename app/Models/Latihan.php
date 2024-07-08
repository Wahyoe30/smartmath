<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id_latihan';
    protected $table = 'latihans';

    protected $fillable = [
        'id_kelas',
        'soal',
        'option_A',
        'option_B',
        'option_C',
        'option_D',
        'option_E',
        'answer',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
