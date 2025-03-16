<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout(); // Log the user out
        session()->invalidate(); // Invalidate session
        session()->regenerateToken(); // Regenerate CSRF token

        // Show a success message using Livewire's event system
        $this->dispatch('show-toast', ['message' => 'Logged out successfully!', 'type' => 'success']);

        return $this->redirect(route('login'), navigate:true); // Redirect to login page
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
