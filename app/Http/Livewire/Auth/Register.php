<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    /** @var string */
    public $name = '';

    /** @var string */
    public $company_name = '';

    /** @var string */
    public $company_logo = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'company_name' => ['required', 'unique:companies,name'],
            'company_logo' => ['required', 'image', 'dimensions:ratio=0/0', 'max:1024'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $company_logo_path = $this->company_logo->store('/images/company/logos', 'public');
        
        $company = new Company();
            
        //setRawAttributes() does not go through model mutator    
        $company->setRawAttributes([
            'name' => $this->company_name,
            'logo' => $company_logo_path
        ]);

        $company->save();

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'company_id' => $company->id,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
