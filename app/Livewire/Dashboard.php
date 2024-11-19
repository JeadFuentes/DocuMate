<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;

class Dashboard extends Component
{
    public $totalApp;
    public $pendingApp;
    public $paymentApp;

    public function mount(){
        $this->totalApp = Applications::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
