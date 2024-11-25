<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;

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

        $this->pendingApplication = Applications::where('status','For Proccessing')->orwhere('status','For Payment')->get();
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
