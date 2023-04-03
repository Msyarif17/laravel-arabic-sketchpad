<?php

namespace App\View\Components;

use Closure;
use App\Models\LeaderBoard as LeaderModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
        $leader = $this->leader;
        return view('components.leader-board',\compact('leader'));
    }
}
