<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $primaryKey = 'test_id';

    protected $fillable = [
        'title',
        'subject',
        'teacher_id',
        'start_time',
        'end_time',
        'duration',
    ];
}
