<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\City;

class CityDropdown extends Component
{
    /**
     * Create a new component instance.
     */

    public ?int $selected;
    public ?int $stateId ;
    public function __construct($selected = null, $stateId = null)
    {
        $this->selected = $selected;
        $this->stateId = $stateId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $cities = City::all();

        return view('components.city-dropdown', ['cities' => $cities, 'selected' => $this->selected, 'stateId' => $this->stateId]);
    }
}
