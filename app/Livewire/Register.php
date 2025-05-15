<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public function register(){
        $userAttr = $this->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>['required', Password::min(4)]
        ]);
        $user = User::create($userAttr);
        request()->session()->flash("register", "User Registered!!");
        sleep(2);
        return redirect('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
