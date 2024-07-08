<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id_quiz';
    protected $table = 'quizs';

    protected $fillable = [
        'id_materi',
        'questions',
        'answer',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }
}
