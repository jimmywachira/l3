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
    public $notifications = [];
    public $published = false;
    public $allowNotifications = false;

    #[Validate('required|string')]
    public $content;
  
    public function setArticle(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->allowNotifications = count($this->notifications) > 0 ? true : false;
    }

    public function store(){
 
        $this->validate();

        if(!$this->allowNotifications){
            $this->notifications = [];
        }
        
        Article::create($this->only(['title', 'content', 'published', 'notifications']));

        session()->flash('message', 'Article created successfully.');

            // Reset form fields
            // $this->reset(['title', 'content']);
            // $this->redirect('/dashboard/articles', navigate:true);
        }

    public function update()
    { 
        $this->validate();

        if(!$this->allowNotifications){
            $this->notifications = [];
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications']));
    }
}
