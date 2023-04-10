<?php

namespace App\Models;

use Exception;
use App\Models\User;
use App\Models\Question;
use App\Models\LeaderBoard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnswerFromUser extends Model
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
    public static function setPoint($id){
        try{

            $userFromLeaderBoard = LeaderBoard::where('user_id',$id)->first();
            if($userFromLeaderBoard){
                $data =[
                    'user_id' => $id,
                    'points' => $userFromLeaderBoard->points + 1,
                ];
                $userFromLeaderBoard->update($data);
            }
            else{
                $data =[
                    'user_id' => $id,
                    'points' => 1,
                ];
                LeaderBoard::create($data);
            }
            return true;
        }catch(Exception $e){
            return $e;
        }

        
    }
}
