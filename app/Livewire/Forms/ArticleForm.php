<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Article;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Validate('required|string|max:255')]
    public $title;
    
    #[Validate('required|string')]
    public $content;
  
    public function setArticle(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
    }

    public function store(){
 
        $this->validate();
        
        Article::create($this->only(['title', 'content']));

        #session()->flash('message', 'Article created successfully.');

            // Reset form fields
            // $this->reset(['title', 'content']);
            // $this->redirect('/dashboard/articles', navigate:true);
        }

    public function update()
    {
        $this->validate();

        $this->article->update($this->only(['title', 'content']));
    }
}
