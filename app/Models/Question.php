<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'question_text',
        'question_type',
    ];
    protected $table = 'questions';
    protected $primaryKey = 'question_id';
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


}
