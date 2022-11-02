<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HighlightedPosts extends Component
{
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        return view('site.components.highlighted_posts', ['item' => $this->item]);
    }
}