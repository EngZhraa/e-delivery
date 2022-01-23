<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UsersTable extends Component
{
    public $users;
    // for forms
    public $fullname,$username,$password,$password_confirmation;
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users-table');
    }
    public function create()
    {
        //code from RegisteredUSerController
        
        $this->validate([
            'fullname' => ['required', 'string','min:4' ,'max:255'],
            'username' => ['required', 'string','min:4' ,'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        
        $user = User::create([
            'fullname' => $this->fullname,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);
        
        // $this->users = User::all();
        return redirect()->to('/users');
 
    }
}
