<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;


#[Title('Manage Articles')]
class ArticleList extends AdminComponent{

    use WithPagination;
    public $showOnlyPublished = false;

    #[Computed]
    public function articles(){
        $query = Article::query();

        if($this->showOnlyPublished){
            return view('livewire.article-list', [
                    'articles' => $query->where('published', true)->paginate(5),
                ]);
            }

        return $query->latest()->paginate(5, pageName: 'articles-page');
    }

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
        $this->resetPage('articles-page');
    }

    public function showPublished(){
        $this->showOnlyPublished = true;
        $this->resetPage('articles-page');
    }

    public function render(){
        
        return view('livewire.article-list', [
            'articles' => $this->articles,
        ]);
    }
}
