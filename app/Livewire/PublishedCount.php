<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;

#[Lazy(isolate:false)]
class PublishedCount extends Component
{
    public $count= 0;
    public $placeholderText = '';

    #[Computed(cache:true, key:'publishedCount')]
    public function count(){
        sleep(1);
        return Article::where('published', true)->count();
    }

    // public function showPublished(){
    //     $this->emitUp('filterPublished');
    // }

    // public function showAll(){
    //     $this->emitUp('filterAll');
    // }

    // public function placeholder(){
    //     return "<div class='p-2 border-2 m-2 text-gray-500'> $this->placeholderText </div>";
    // }

    public function render()
    {
        return view('livewire.published-count');
    }
}
