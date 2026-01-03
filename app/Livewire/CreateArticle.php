<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;

class CreateArticle extends AdminComponent
{

    #[Validate('required|string|max:255')]
    public $title;
    
    #[Validate('required|string')]
    public $content;
    #public $author;

    public function save(){
    $this->validate();
        Article::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Article created successfully.');

        // Reset form fields
        $this->reset(['title', 'content']);
        $this->redirect('/dashboard/articles', navigate:true);
    }
    
    public function render()
    {
        return view('livewire.create-article');
    }
}
