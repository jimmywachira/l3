<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Livewire\Forms\ArticleForm;

class EditArticle extends Component{

    public ArticleForm $form;
  
    public function mount(Article $article){
         $this->form->setArticle($article);
    }

    public function save(){
        $this->form->update();

        session()->flash('message', 'Article edited successfully.');
        $this->redirect('/dashboard/articles', navigate: true);
    }

    public function render(){
        return view('livewire.edit-article');
    }
}
