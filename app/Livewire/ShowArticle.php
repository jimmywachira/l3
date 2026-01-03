<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ShowArticle extends Component
{
    public Article $article;

    public function mount(Article $article){
        $this->article = $article;
    }
    
    public function render()
    {
        return view('livewire.show-article');
    }
}
