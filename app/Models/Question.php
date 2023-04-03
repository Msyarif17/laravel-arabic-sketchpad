<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'level_id',
        'question',
        'image_question'
    ];

    public function answare_from_experts(){
        return $this->hasMany(AnswareFromExpert::class);
    }
    
    public function answare_from_users(){
        return $this->hasMany(AnswareFromUser::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
