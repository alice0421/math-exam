<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function exam_year()
    {
        return $this->belongsTo(ExamYear::class);
    }
}
