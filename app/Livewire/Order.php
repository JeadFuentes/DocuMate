<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Applications;
use App\Models\Attachment;
use App\Models\Checkouts;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessInformation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    public $businessInformation;
    public $attachment;
    public $pdfUrl;
    public $receiptUrl;
    public $status = 'All';
    public $attchId;

    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = 5;
    public $search = '';

    protected $listeners = ['reload' => 'mount'];
    public function mount(){
        //$this->Applications = Applications::where('status','For Proccessing')->orwhere('status','For Payment')->get();
    }

    public function stats(){
        $this->dispatch('reload');
    }

    public function line($id)
    {
        $this->businessInformation = BusinessInformation::where('applications_id',$id)->get();
        $this->dispatch('showlineModal');
    }

    public function attach($id)
    {
        $this->attchId = $id;
        $this->attachment = Attachment::where('application_id',$id)->get();
        $this->dispatch('showAttachmentModal');
    }

    public function proceedToAttachment(){
        return redirect()->route('documate.attachment', ['id' => $this->attchId]);
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
            $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
            if($this->status == 'All'){
                $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
            } else {
                $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->where('status',$this->status)->paginate($this->perPage);
            } 
            
        }else{
            $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->where('user_id',Auth::user()->id)->paginate($this->perPage);
            if($this->status == 'All'){
                $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->where('user_id',Auth::user()->id)->paginate($this->perPage);
            } else{
                $Applications = Applications::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->where('status',$this->status)->where('user_id',Auth::user()->id)->paginate($this->perPage);
            }
        }
        return view('livewire.order', ['Applications' => $Applications]);
    }
}
