<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Livewire\Forms\ArticleForm;

class EditArticle extends Component{

    public ArticleForm $form;
    // public ?Article $article;
    // public $title;
    // public $content;
  
    public function mount(Article $article)
    {
        // $this->form = new ArticleForm();
         $this->form->setArticle($article);
        // $this->article = $article;
        // $this->title = $this->article->title;
        // $this->content = $this->article->content;
    }

    public function save()
    {

        // $this->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        // ]);

        $this->form->update();

        //         $this->article->update([
        //     'title' => $this->title,
        //     'content' => $this->content,
        // ]);

        session()->flash('message', 'Article edited successfully.');
        $this->redirect('/dashboard/articles', navigate: true);
    }

    // public function edit()
    // {
    //     $this->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     $this->article->update([
    //         'title' => $this->title,
    //         'content' => $this->content,
    //     ]);

    //     session()->flash('message', 'Article edited successfully.');
    //     $this->redirect('/dashboard/articles', navigate: true);
    // }


    public function render()
    {
        return view('livewire.edit-article');
    }
}
