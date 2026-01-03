<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Greeting;

class Greeter extends Component{

    public $greeting = 'hello';
    public $greetingMessage = '';
    public $greetings= [];

    #[validate('required|string|min:3')]
    public $name = '';


    public function mount(){
        $this->greetings = Greeting::all();
    }

    public function changeGreeting(){

    $this->reset('greetingMessage');

    $this->greetingMessage = $this->greeting . $this->name . '!';  
}

    public function render(){
        return view('livewire.greeter');
    }
}
