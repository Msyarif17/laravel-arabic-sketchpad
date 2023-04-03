<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswareFromUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'image_answers',
        'user_id',
        'is_true'
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
