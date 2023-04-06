<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerFromExpert extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'image_answers',
        'user_id',
        'is_accepted'
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
