<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class Users extends Component
{
    public $userlist;
    public $users;

    public string $name = '';
    public $birthday;
    public string $sex = '';
    public string $address = '';
    public string $usertype = '';
    public string $email = '';
    public $id = '';
    public string $password = '';
    public string $password_confirmation = '';
    
    public function addNew(){
        return redirect("/register");
    }

    public function openEdit($id){
        $this->users = User::find($id);

        $this->name = $this->users->name;
        $this->birthday = $this->users->birthday;
        $this->sex = $this->users->sex;
        $this->address = $this->users->address;
        $this->usertype = $this->users->usertype;
        $this->email = $this->users->email;

        $this->dispatch('showEditModal');
    }
    public function updateUser(): void
    {
        $user = User::find($this->users->id);

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'usertype' => ['required', 'string', 'max:155'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        $user->fill($validated);

        $user->save();

        session()->flash('message', 'Saved Succesfully');
        redirect()->to('/user');
    }

    //reset password
    public function openResetPassword($id)
    {
        $this->id = $id;
        $this->dispatch('openResetPassword');
    }
    public function resetPassword()
    {
        $user = User::find($this->id);

            $validated = $this->validate([
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('password', 'password_confirmation');

        session()->flash('message', 'Saved Succesfully');
        $this->redirect(route('documate.users'));
    }

    public function render()
    {
        if(Auth::user()->usertype == 'Administrator' || Auth::user()->usertype == 'Staff'){
            $this->userList = User::get();
        }else{
            $this->userList = User::where('id',Auth::user()->id)->get();
        }
        
        return view('livewire.users');
    }
}
