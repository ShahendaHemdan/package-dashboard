<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $type;
    public $confirmMessage;

    public function __construct($message = null, $type = 'success', $confirmMessage = null)
    {
        $this->message = $message;
        $this->type = $type;
        $this->confirmMessage = $confirmMessage;
    }

    public function render()
    {
        return view('components.alert');
    }
}
