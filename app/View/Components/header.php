<?php

namespace App\View\Components;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $date = Carbon::now()->format('l, d F');

        return view('components.header', compact('date'));
    }
}
