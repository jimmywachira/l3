<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent{

    use WithPagination;
    public $showOnlyPublished = false;

    public function delete($id){
        $article = Article::find($id);
        if($article){
            $article->delete();
            session()->flash('message', 'Article deleted successfully.');
            $this->resetPage();
        }else{
            session()->flash('error', 'Article not found.');
        }
    }

public function showAll(){
    $this->showOnlyPublished = false;
}

public function showPublished(){
    $this->showOnlyPublished = true;
}


    public function render()
    {
        $query = Article::query();

            if($this->showOnlyPublished){
                return view('livewire.article-list', [
                    'articles' => $query->where('published', true)->latest()->paginate(5),
                ]);
            }
        return view('livewire.article-list', [
            'articles' => $query->latest()->paginate(5),
        ]);
    }
}
