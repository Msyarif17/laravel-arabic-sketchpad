<?php

namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Questions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $createUrl,
        public string $actionName,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.questions');
    }
}
