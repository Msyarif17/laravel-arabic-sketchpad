<?php

namespace App\Models;

use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function accept($id){
        return self::find($id)->update(['is_accepted'=>1]);
    }
    public static function reject($id){
        return self::find($id)->update(['is_accepted'=>2]);
    }
}
