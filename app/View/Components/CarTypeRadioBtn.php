<?php

namespace App\View\Components;

use App\Models\CarType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarTypeRadioBtn extends Component
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

        $carTypes = CarType::all();

        return view('components.car-type-radio-btn', ['carTypes' => $carTypes]);
    }
}
