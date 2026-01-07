<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Livewire\Forms\ArticleForm;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Edit Article')]

class EditArticle extends Component{

    use withFileUploads;

    public ArticleForm $form;
  
    public function mount(Article $article){
         $this->form->setArticle($article);
    }

    public function downloadPhoto(){
        return response()->download(storage_path('app/public/' . $this->form->photo_path));
        // return response()->streamDownload(function () {
        //     echo file_get_contents(storage_path('app/public/' . $this->form->photo_path));
        // }, basename($this->form->photo_path));
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
