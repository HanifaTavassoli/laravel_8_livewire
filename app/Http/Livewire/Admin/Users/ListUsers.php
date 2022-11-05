<?php

namespace App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\SafeStorage;
use App\Models\User;
use App\Http\Livewire\Admin\AdminComponent;

class ListUsers extends AdminComponent
{

    // public $name;
    // public $email;
    // public $password;
    // public $password_confirmation;


    public $state=[];

    public $user;
    public $showEditModal=false;

    public $userIdBeingRemoved=null;

    public function addNew(){
    //    dd('addNew');
    $this->state=[];
    $this->showEditModal=false;
    $this->dispatchBrowserEvent('show-form');
    }

    public function createUser(){

    //    dd('hi');
    // dd($this->state);
    $validatedData=Validator::make($this->state,[
     'name'=>'required',
     'email'=>'required|email|unique:users',
     'password'=>'required|confirmed',
     ])->validate();
    //  dd($validatedData);
    // dd('here');
    $validatedData['password']=bcrypt($validatedData['password']);

    User::create($validatedData);

    // session()->flash('message','User added successfuly!');
    $this->dispatchBrowserEvent('hide-form',['message'=>'User added successfully!']);

         return redirect()->back();
    }

    public function edit(User $user){
        // dd($user);
        $this->showEditModal=true;

        $this->user=$user;

        // dd($user->toArray());

        $this->state=$user->toArray();

        // dd($this->state);

        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser(){

        // dd("here");
        $validatedData=Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->user->id,
            'password'=>'sometimes|confirmed'
        ])->validate();

        if(!empty($validatedData['password'])){
            $validatedData['password']=bcrypt($validatedData['password']);
        }

        $this->user->update($validatedData);

        $this->dispatchBrowserEvent('hide-form',['message'=>'User updated successfully!']);
    }

  public function confirmUserRemaoval($userId){
        // dd('confirmation');
        // dd($userId);
        $this->userIdBeingRemoved=$userId;

        $this->dispatchBrowserEvent('show-delete-modal');
  }

  public function deleteUser(){
    // dd('delete Funciton');
    $user=User::findOrFail($this->userIdBeingRemoved);
    // dd($user);
    $user->delete();

    $this->dispatchBrowserEvent('hide-delete-modal',['message'=>'User deleted successfully!']);
  }
    public function render()
    {
        $data=User::latest()->paginate(4);
        return view('livewire.admin.users.list-users',['users'=>$data]);
    }
}
