<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Tags\Tag;

class Tags extends Component
{
    public function render()
    {
        $tags = Tag::all();
        return view('livewire.tags', ['tags' => $tags]);
    }
}
