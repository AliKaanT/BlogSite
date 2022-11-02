<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SliderItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $item;

    public function __construct($item)
    {
        $this->item = json_decode($item);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('site/components/slider_item', ['item' => $this->item]);
    }
}