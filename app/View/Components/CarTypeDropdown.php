<?php

namespace App\View\Components;

use App\Models\CarType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarTypeDropdown extends Component
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

        $carTypes = CarType::all();

        return view('components.car-type-dropdown', ['carTypes' => $carTypes, 'selected' => $this->selected]);
    }
}
