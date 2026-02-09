<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[title('Login')]
class Login extends Component
{
    #[Validate('email|required')]
    public $email = '';
    
    #[Validate('required|min:6')]
    public $password = '';

    public $loginMessage = '';

    public function authenticate()
    {
        $this->validate();

        $valid = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if(!$valid){
            $this->loginMessage = "Invalid credentials.";
            return;
        }else{
            redirect()->intended('/dashboard');
        }
    }

    public function render(){
        return view('livewire.login');
    }
}
