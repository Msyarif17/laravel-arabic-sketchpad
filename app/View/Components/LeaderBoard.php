<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\LeaderBoard as LeaderModel;

class LeaderBoard extends Component
{
    /**
     * Create a new component instance.
     */
    public $leader;
    public function __construct()
    {
        $this->leader = LeaderModel::with('user')->get()->sortByDesc('points');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = LeaderModel::with([
            'user'=>function($q){
                $q->withCount('answer_from_users');
            }
        ])->orderBy('points','desc');
        $topThree = $user->take(3)->get();
        $leaderboard = $user->get();
        // dd([$topThree, $leaderboard]);
        return view('components.leader-board',\compact('leaderboard','topThree'));
    }
}
