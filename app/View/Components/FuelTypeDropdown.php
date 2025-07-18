<?php

namespace App\View\Components;

use App\Models\FuelType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FuelTypeDropdown extends Component
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

        $fuelTypes = FuelType::all();

        return view('components.fuel-type-dropdown', ['fuelTypes' => $fuelTypes, 'selected' => $this->selected]);
    }
}
