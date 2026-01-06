<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class PublishedCount extends Component
{
    public $count=0;
    public $placeholderText = '';

    public function mount(){
        sleep(1);
        $this->count = Article::where('published', true)->count();
    }

    public function showPublished(){
        $this->emitUp('filterPublished');
    }

    public function showAll(){
        $this->emitUp('filterAll');
    }

    public function placeholder(){
        return "<div class='p-2 border-2 m-2 text-gray-500'> $this->placeholderText </div>";
    }

    public function render()
    {
        return view('livewire.published-count');
    }
}
