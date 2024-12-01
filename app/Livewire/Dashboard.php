<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $totalApp;
    public $pendingApp;
    public $paymentApp;

    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = 5;
    public $search = '';

    public function mount(){

        if(Auth::user()->usertype == 'Administrator' || Auth::user()->usertype == 'Staff'){
            $this->totalApp = Applications::count();
            $this->pendingApp = Applications::where('status','For Proccessing')->count();
            $this->paymentApp = Applications::where('status','For Payment')->count();
        }else{
            $this->pendingApplication = Applications::where('user_id',Auth::user()->id)->get();
            $this->totalApp = Applications::where('user_id',Auth::user()->id)->count();
            $this->pendingApp = Applications::where('status','For Proccessing')->where('user_id',Auth::user()->id)->count();
            $this->paymentApp = Applications::where('status','For Payment')->where('user_id',Auth::user()->id)->count();
        }

    }

    public function payApplication($id){
        return redirect()->route('documate.checkout', ['id' => $id]);
    }

    public function deleteApplication($id){
        $deleteApp = Applications::find($id);

        $deleteApp->delete();
    }

    public function perPages(){
        //
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function sortingBy($field){
        if ($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }
        else{
            $this->sortDirection = 'asc';
        }
        
        return $this->sortBy = $field;
    }
    public function render()
    {
        if(Auth::user()->usertype == 'Administrator' || Auth::user()->usertype == 'Staff'){
            $pendingApp = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        }else{
            $pendingApp = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->where('user_id',Auth::user()->id)->paginate($this->perPage);
        }
        return view('livewire.dashboard', ['pendingApplication' => $pendingApp]);
    }
}
