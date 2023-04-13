<?php

namespace App\View\Components\Dashboard\Datatable;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\DataTables\QuestionsDataTable;

class Questions extends Component
{
    private $dataTable;
    public function __construct(
        public string $name,
        public string $createUrl,
        public string $actionName,
    ){
        $this->dataTable = new QuestionsDataTable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return $this->dataTable->render('components.dashboard.datatable.questions');
    }
}
