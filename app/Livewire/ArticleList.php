<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;


#[Title('Manage Articles')]
class ArticleList extends AdminComponent{

    use WithPagination; 

    #[Session]
    public $showOnlyPublished = false;

    #[Computed()] #persist:true?
    public function articles(){
        $query = Article::query();

        if($this->showOnlyPublished){
             $query->where('published', true);  
            }
        return $query->latest()->paginate(5, pageName: 'articles-page');
    }

    public function delete(Article $article){
        // if($this->articles->count()<10){
        //     throw new \Exception("Cannot delete article when there are less than 10 articles.");
        // }else{

        $article->delete();
        session()->flash('message', 'Article deleted successfully.');
        $this->resetPage('articles-page');
        cache()->forget('publishedCount');
        // unset($article);
        // }

        // $article = Article::find($id);
        // if($article){
        //     $article->delete();
        //     session()->flash('message', 'Article deleted successfully.');
        //     $this->resetPage();
        // }else{session()->flash('error', 'Article not found.');}
    // }
}

    public function togglePublished($showOnlyPublished){
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage('articles-page');
    }

    // public function showPublished(){
    //     $this->showOnlyPublished = true;
    //     $this->resetPage('articles-page');
    // }

    // public function render(){ 
    //     return view('livewire.article-list', [
    //         'articles' => $this->articles,
    //     ]);
    // }
}
