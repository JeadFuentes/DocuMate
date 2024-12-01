<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $totalApp;
    public $pendingApp;
    public $pendingApplication;
    public $paymentApp;

    public function mount(){
        $this->totalApp = Applications::count();
        $this->pendingApp = Applications::where('status','For Proccessing')->count();
        $this->paymentApp = Applications::where('status','For Payment')->count();

        if(Auth::user()->usertype == 'Administrator' || Auth::user()->usertype == 'Staff'){
            $this->pendingApplication = Applications::get();
        }else{
            $this->pendingApplication = Applications::where('user_id',Auth::user()->id)->get();
        }

    }

    public function payApplication($id){
        return redirect()->route('documate.checkout', ['id' => $id]);
    }

    public function deleteApplication($id){
        $deleteApp = Applications::find($id);

        $deleteApp->delete();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
