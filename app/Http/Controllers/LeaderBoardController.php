<?php

namespace App\Http\Controllers;

use App\Models\LeaderBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderBoardController extends Controller
{
    public function index(){
        $user = LeaderBoard::with([
            'user'=>function($q){
                $q->withCount('answer_from_users');
            }
        ])->orderBy('points','desc');
        $topThree = $user->take(3)->get();
        $leaderboard = $user->get();
        // dd([$topThree, $leaderboard]);
        return view('leader-board',compact('topThree', 'leaderboard'));
    }
}
