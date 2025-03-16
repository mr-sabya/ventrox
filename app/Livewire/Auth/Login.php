<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    // Validation rules
    protected $rules = [
        'email' => 'required|string|exists:users,email', // Assuming you have a email field in users table
        'password' => 'required|string|min:6', // Password field validation
    ];

    // Validation messages
    protected $messages = [
        'email.required' => 'Please enter your email.',
        'password.required' => 'Please enter your password.',
    ];

    // Login logic
    public function login()
    {
        $this->validate(); // Validate input

        // Attempt login using the provided credentials
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            
            $this->dispatch('show-toast', ['message' => 'Successfully logged in!', 'type' => 'success']);
            return $this->redirect(route('home'), navigate:true); // Redirect to the dashboard or home page
        } else {
            $this->dispatch('show-toast', ['message' => 'Invalid credentials!', 'type' => 'error']);
        }
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
