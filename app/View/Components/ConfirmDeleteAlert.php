<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmDeleteAlert extends Component
{
    public $formId;
    public $confirmMessage;

    public function __construct($formId, $confirmMessage = "You won't be able to revert this!")
    {
        $this->formId = $formId;
        $this->confirmMessage = $confirmMessage;
    }


    public function render(): View|Closure|string
    {
        return view('components.confirm-delete-alert');
    }
}
