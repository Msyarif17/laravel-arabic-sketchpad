<?php

namespace App\View\Components\Dashboard;

use App\Models\AnswerFromExpert;
use App\Models\answerFromUser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmittionsCheck extends Component
{
    /**
     * Create a new component instance.
     */
    private $data;
    public function __construct()
    {
        $this->data = AnswerFromExpert::where('is_accepted',false)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = $this->data;
        return view('components.dashboard.submittions-check',compact('data'));
    }
}
