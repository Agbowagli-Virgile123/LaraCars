<?php

namespace App\View\Components;

use App\Models\State;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class StateDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public ?int $selected;
    public function __construct( $selected = null)
    {
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $states = State::all();

        return view('components.state-dropdown', ['states' => $states, 'selected' => (int)$this->selected]);
    }
}
