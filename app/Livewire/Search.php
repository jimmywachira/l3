<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

#[Isolate]
class Search extends Component
{

    #[Validate('string|required')]
    #[Url(as:'q',except:'')] #,history:true
    public $searchText="";
    
    //public $results = [];
    public $placeholder="Search articles ... ";

    // public function updatedSearchText()
    // {
    //     $this->reset('results');
    //     $this->validate();

    //     $this->results = Article::where('title', 'like', '%' . $this->searchText . '%')
    //         ->orWhere('content', 'like', '%' . $this->searchText . '%')
    //         ->get();
    // }

    #[On('search:clear-results')]
    public function clear(){
        $this->reset('searchText');
    }

    public function render()
    {
        return view('livewire.search',[
            'results' => Article::where('title', 'like', '%' . $this->searchText . '%')
                ->orWhere('content', 'like', '%' . $this->searchText . '%')
                ->get()
        ]);
    }
}
