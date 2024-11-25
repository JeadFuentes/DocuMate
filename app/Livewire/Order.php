<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;
use App\Models\Attachment;
use App\Models\Checkouts;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessInformation;
use Barryvdh\DomPDF\Facade\Pdf;

class Order extends Component
{
    public $businessInformation;
    public $Applications;
    public $attachment;
    public $pdfUrl;
    public $receiptUrl;

    public function mount(){
        $this->Applications = Applications::get();
        //$this->Applications = Applications::where('status','For Proccessing')->orwhere('status','For Payment')->get();
    }

    public function line($id)
    {
        $this->businessInformation = BusinessInformation::where('applications_id',$id)->get();
        $this->dispatch('showlineModal');
    }

    public function attach($id)
    {
        $this->attachment = Attachment::where('application_id',$id)->get();
        $this->dispatch('showAttachmentModal');
    }

    public function form($id)
    {
        $applicationForm = Applications::find($id);
        $pdf = Pdf::loadView('documate.printForm', ['pdfdata' => $applicationForm]);
        $pdfFilePath = 'pdfs/CustomerReport_' . uniqid() . '.pdf';
        $pdf->save(storage_path('app/public/' . $pdfFilePath));
        $this->pdfUrl = asset('storage/' . $pdfFilePath);

        $this->dispatch('showFormModal');
    }

    public function receipt($id)
    {
        $receipt = Checkouts::find($id);
        $pdf = Pdf::loadView('documate.receiptPdf', ['pdfdata' => $receipt]);
        $pdfFilePath = 'receipts/Receipt_' . uniqid() . '.pdf';
        $pdf->save(storage_path('app/public/' . $pdfFilePath));
        $this->receiptUrl = asset('storage/' . $pdfFilePath);

        $this->dispatch('showReceiptModal');
    }

    public function approve($id)
    {
        $approve = Applications::find($id);
        $status = [
          'status' => 'Approved'
        ];

        $approve->fill($status);
        $approve->save();
    }

    public function reject($id)
    {
        $approve = Applications::find($id);
        $status = [
          'status' => 'Reject'
        ];

        $approve->fill($status);
        $approve->save();
    }

    public function render()
    {
        return view('livewire.order');
    }
}
