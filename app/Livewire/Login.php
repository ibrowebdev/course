<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
        public $email;
        public $password;
        public function login(){
        $attributes = $this->validate([
            'email' => ['required', 'email'], 
            'password' => ['required']
        ]);

        if(!Auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>"Sorry, those credentials does  not match"
            ]);
        }
        session()->regenerate();
        
        return redirect(Route('course'));
    }
    public function render()
    {
        return view('livewire.login');
    }
}
