<?php

namespace App\View\Components;

use App\Models\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModelDropdown extends Component
{
    /**
     * Create a new component instance.
     */

    public ?int $makerId;
    public ?int $selected;
    public function __construct($makerId = null , $selected = null)
    {
        $this->makerId = $makerId;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $models = Model::all();

        return view('components.model-dropdown', ['models' => $models, 'makerId' => $this->makerId, 'selected' => $this->selected]);
    }
}
