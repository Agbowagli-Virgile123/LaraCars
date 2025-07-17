<?php

namespace App\View\Components;

use App\Models\Maker;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MakerDropdown extends Component
{
    /**
     * Create a new component instance.
     */

    public ?int $selected;
    public function __construct($selected = null)
    {
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $makers = Maker::all();
        
        return view('components.maker-dropdown',['makers' => $makers, 'selected' => (int)$this->selected]);
    }
}
