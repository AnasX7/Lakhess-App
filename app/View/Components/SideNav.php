<?php

namespace App\View\Components;

use Closure;
use App\Models\Folder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideNav extends Component
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
        $folders = Folder::where('user_id', auth()->id())->get();

        return view('components.side-nav', compact('folders'));
    }
}
