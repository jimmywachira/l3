<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Article;
use Livewire\Attribute\Title;

#[Title('Latest Articles')]
class ArticleIndex extends AdminComponent
{
    public function render()
    {
        return view('livewire.article-index',[
            'articles' => Article::latest()->take(10)->get()
        ]);
    }
}
