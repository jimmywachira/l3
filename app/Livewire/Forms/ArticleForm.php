<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Article;
use Livewire\Attributes\Locked;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Locked]
    public int $id;

    #[Validate('required|string|max:255')]
    public $title;
    public $notifications = [];
    public $published = false;
    public $allowNotifications = false;
    public $photo_path='';

    #[Validate(['photo.*' => 'nullable|image|max:1024'])]
    public $photo;


    #[Validate('required|string')]
    public $content;
  
    public function setArticle(Article $article)
    {
        $this->article = $article;
        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->allowNotifications = count($this->notifications) > 0 ? true : false;
        $this->photo_path= $article->photo_path;
    }

    public function store(){
 
        $this->validate();

        if($this->photo){
            $this->photo_path = $this->photo->store('articles_photos','public');
        }

        if(!$this->allowNotifications){
            $this->notifications = [];
        }
        
        Article::create($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        session()->flash('message', 'Article created successfully.');
        cache()->forget('publishedCount');
    }
        

    public function update(){ 

        $this->validate();

        if($this->photo){
            $this->photo_path = $this->photo->store('articles_photos','public');
        }

        $this->article->update($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));
        cache()->forget('publishedCount');
        session()->flash('message', 'Article updated successfully.');
    }
}
