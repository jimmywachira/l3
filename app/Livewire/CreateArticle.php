<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use App\Livewire\Forms\ArticleForm;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Create Article')]
class CreateArticle extends AdminComponent{
    
    public ArticleForm $form;

    public function save(){
        $this->form->store();
        $this->redirectRoute('dashboard.articles', navigate: true);
    }
        
    public function render(){
        return view('livewire.create-article');
        }
    }
