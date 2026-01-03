<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attribute\Title;
use App\Models\Article;

#[Title('Admin Dashboard')]
class Dashboard extends Component
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
        return view('livewire.dashboard', [
            'totalArticles' => Article::count(),
            'recentArticles' => Article::latest()->take(10)->get(),
        ])->layout('components.layouts.admin');
    }
}
