<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleList extends AdminComponent
{
    public $articles;
    public function mount(){
        $this->articles = Article::latest()->take(10)->get();
    }

    public function delete($id){
        $article = Article::find($id);
        if($article){
            $article->delete();
            session()->flash('message', 'Article deleted successfully.');
            $this->articles = Article::latest()->take(10)->get();
        }else{
            session()->flash('error', 'Article not found.');
        }
    }

    public function render()
    {
        return view('livewire.article-list');
    }
}
