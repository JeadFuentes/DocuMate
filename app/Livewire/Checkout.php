<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Checkouts;
use App\Models\Applications;
use Barryvdh\DomPDF\Facade\Pdf;

class Checkout extends Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $town;
    public $city;
    public $country;
    public $zip;
    public $paymentMethod;
    public $nameOnCard;
    public $acctnumber;
    public $expiration;
    public $cvvSecurity;
    public $nameGcash;
    public $gcashNumber;
    public $randomNumber;
    public $receivedData;
    public $id;

    public $receiptUrl;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function saveBilling()
    {     
        $this->randomNumber = rand(10000000, 99999999);

        if($this->paymentMethod == 'gcash'){
            $this->nameOnCard = $this->nameGcash;
            $this->acctnumber = $this->gcashNumber;
            $this->expiration = 'NA';
            $this->cvvSecurity = 'NA';
        }
        

        if($this->acctnumber){
            // Validate inputs
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'paymentMethod' => 'required|string|max:255',
            'nameOnCard' => 'string|max:255',
            'acctnumber' => 'string|max:16',
            'expiration' => 'string|max:5',
            'cvvSecurity' => 'string|max:3',
        ]);

        // Store in the database
        $receipt = Checkouts::create([
            'applications_id' => $this->id,
            'productname' => 'Bussiness Permit',
            'amount' => 1000,
            'firstname' => $this->firstName,
            'lastname' => $this->lastName,
            'email' => $this->email,
            'address' => $this->address,
            'town' => $this->town,
            'city' => $this->city,
            'country' => $this->country,
            'zip' => $this->zip,
            'paymentmethod' => $this->paymentMethod,
            'namecard' => $this->nameOnCard,
            'acctnumber' => $this->acctnumber,
            'expiration' => $this->expiration,
            'ccv' => $this->cvvSecurity,
            'invoiceno' => $this->randomNumber,
        ]);

        $payment = Applications::find($this->id);

        $status = [
          'status' => 'For Proccessing'
        ];

        $payment->fill($status);

        $payment->save();

        $pdf = Pdf::loadView('documate.receiptPdf', ['pdfdata' => $receipt]);
        $pdfFilePath = 'receipts/Receipt_' . uniqid() . '.pdf';
        $pdf->save(storage_path('app/public/' . $pdfFilePath));
        $this->receiptUrl = asset('storage/' . $pdfFilePath);

        $this->dispatch('showReceiptModal');
        // Optionally reset form or redirect
        //session()->flash('message', 'information saved successfully!');
        //$this->reset();
        //return redirect('/newapp');
        } 
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
