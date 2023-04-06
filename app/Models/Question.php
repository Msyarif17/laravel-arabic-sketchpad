<?php

namespace App\Models;

use App\Models\Level;
use App\Models\AnswerFromUser;
use App\Models\AnswerFromExpert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'level_id',
        'question',
        'image_question'
    ];

    public function answer_from_experts(){
        return $this->hasMany(AnswerFromExpert::class);
    }
    
    public function answer_from_users(){
        return $this->hasMany(AnswerFromUser::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
