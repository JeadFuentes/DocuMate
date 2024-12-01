<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BusinessInformation;
use App\Models\Attachment;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AttachmentsAddtl extends Component
{
    use WithFileUploads;
    public $id;
    public $businessInformation;
    public $attachFile;
    //line
    public $lineOfBusiness;
    public $psic;
    public $productsServices;
    public $noOfUnits;
    public $capitalization;
    public $grossSales;

    public $attachmentTitle;
    public $attchFile;

    public function mount($id)
    {
        $this->id = $id;
        $this->businessInformation = BusinessInformation::where('applications_id', '=', $id)->get();
        $this->attachFile = Attachment::where('application_id', '=', $id)->get();
    }

    public function submitBusinessInfo()
    {
        $this->validate([
            'lineOfBusiness' => 'required|string',
            'psic' => 'required|string',
            'productsServices' => 'required|string',
            'noOfUnits' => 'required|integer|min:0',
            'capitalization' => 'nullable|numeric|min:0',
            'grossSales' => 'nullable|numeric|min:0',
        ]);

        BusinessInformation::create([
            'applications_id' => $this->id,
            'line_of_business' => $this->lineOfBusiness,
            'psic' => $this->psic,
            'products_services' => $this->productsServices,
            'no_of_units' => $this->noOfUnits,
            'capitalization' => $this->capitalization ?? null,
            'gross_sales' => $this->grossSales ?? null,
        ]);

        $this->businessInformation = BusinessInformation::where('applications_id', '=', $this->id)->get();
        $this->clear();
    }

    public function deleteBusinessInfo($id){
        $businessInfo = BusinessInformation::find($id);

        $businessInfo->delete();

        $this->businessInformation = BusinessInformation::where('applications_id', '=', $this->id)->get();
    }

    public function submitAttachment()
    {
        $this->validate([
            'attachmentTitle' => 'nullable|string',
            'attchFile' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        if ($this->attchFile) {
            $filePath = $this->attchFile->store('attachments', 'public');

            // Save the attachment record
            Attachment::create([
                'application_id' => $this->id,
                'title' => $this->attachmentTitle,
                'file_path' => $filePath,
            ]);
        }

        $this->attachFile = Attachment::where('application_id', '=', $this->id)->get();
        $this->clear();
    }

    public function deleteAttachment($id){
        $att = Attachment::find($id);

        if ($att) {
            // Delete the file from storage
            Storage::disk('public')->delete($att->file_path);

            // Delete the database record
            $att->delete();

            // Update the attachments list after deletion
            $this->attachFile = Attachment::where('application_id', '=', $this->id)->get();
        }
    }

    public function clear(){
        $this->lineOfBusiness = '';
        $this->psic = '';
        $this->productsServices = '';
        $this->noOfUnits = '';
        $this->capitalization = '';
        $this->grossSales = '';

        $this->attachmentTitle = '';
        $this->attachmentFile = null;
    }
    public function render()
    {
        return view('livewire.attachments-addtl');
    }
}
