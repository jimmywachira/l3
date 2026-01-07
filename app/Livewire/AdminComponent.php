<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attribute\Layout;

#[Layout('components.layouts.admin')]
class AdminComponent extends Component{
    
    public function render(){

        return view('livewire.dashboard', [
            'totalArticles' => Article::count(),
            'recentArticles' => Article::latest()->take(10)->get(),
        ]);
    }
}
