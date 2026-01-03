<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use Livewire\Attributes\On;

class Search extends Component
{
    #[Validate('string|required')]
    public $searchText="";
    public $results = [];
    public $placeholder="Search articles ... ";

    public function updatedSearchText()
    {
        $this->reset('results');
        $this->validate();

        $this->results = Article::where('title', 'like', '%' . $this->searchText . '%')
            ->orWhere('content', 'like', '%' . $this->searchText . '%')
            ->get();
    }

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText', 'results');
    }

    public function render()
    {
        return view('livewire.search');
    }
}
