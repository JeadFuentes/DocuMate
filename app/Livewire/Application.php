<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use App\Models\Applications;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessInformation;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Application extends Component
{
    use WithFileUploads;
    public $typeofapplication = null;
    public $typeofbussiness = '';
    public $gender;
    public $dtisecreg;
    public $tin;
    public $tradename;
    public $telno;
    public $mobileno;
    public $email;
    public $surname;
    public $givenname;
    public $middlename;
    public $suffix;
    public $corp;
    public $floorarea;
    public $bmale;
    public $bfemale;
    public $rescity;
    public $vantruck;
    public $motorcycle;
    public $owned;
    public $taxdecleration;
    public $propertyid;
    public $taxincentives;
    public $businessActivity;
    public $othersInput = '';
    

    // Address Fields
    public $bldgno;
    public $namebldg;
    public $lotno;
    public $blockno;
    public $street;
    public $subdivision;
    public $barangay;
    public $district;
    public $city;
    public $province;
    public $zipcode;
    //2nd address
    public $bldgnob;
    public $namebldgb;
    public $lotnob;
    public $blocknob;
    public $streetb;
    public $subdivisionb;
    public $barangayb;
    public $districtb;
    public $cityb;
    public $provinceb;
    public $zipcodeb;
    public $sameasmain = false; // For "Same as Main Address" functionality

    // Dynamic Fields
    public $lineOfBusiness;
    public $psic;
    public $productsServices;
    public $noOfUnits;
    public $capitalization;
    public $grossSales;

    public $attachmentTitle;
    public $attchFile;

    ///other
    public $status;
    public $remarks;

    public $appCreated;
    public $addLine;
    public $businessInformation;
    public $attachFile;
    
    public function rules()
    {
        return [
            'typeofapplication' => ['required', Rule::in(['new', 'renewal', 'additional'])],
            'typeofbussiness' => 'required|string',
            'dtisecreg' => 'required|string',
            'tin' => 'required|string',
            'bldgno' => 'required_if:sameasmain,false',
            'namebldg' => 'required_if:sameasmain,false',
            'lotno' => 'required_if:sameasmain,false',
            'blockno' => 'required_if:sameasmain,false',
            'street' => 'required_if:sameasmain,false',
            'subdivision' => 'required_if:sameasmain,false',
            'barangay' => 'required_if:sameasmain,false',
            'district' => 'required_if:sameasmain,false',
            'city' => 'required_if:sameasmain,false',
            'province' => 'required_if:sameasmain,false',
            'zipcode' => 'required_if:sameasmain,false',
            'mobileno' => 'required|string',
            'email' => 'required|string',
            'floorarea' => 'required|integer',
            'bmale' => 'required|integer',
            'bfemale' => 'required|integer',
            'rescity' => 'required|string',
            'vantruck' => 'required|integer',
            'motorcycle' => 'required|integer',
            'owned' => 'required|string',
            'taxincentives' => 'required|string',
            // Add other validation rules as needed
        ];
    }

    public function updatedSameasmain($value)
    {
        if ($value) {
            // Copy main address to secondary address fields if "Same as Main Address" is checked
            $this->bldgnob = $this->bldgno;
            $this->namebldgb = $this->namebldg;
            $this->lotnob = $this->lotno;
            $this->blocknob = $this->blockno;
            $this->streetb = $this->street;
            $this->subdivisionb = $this->subdivision;
            $this->barangayb = $this->barangay;
            $this->districtb = $this->district;
            $this->cityb = $this->city;
            $this->provinceb = $this->province;
            $this->zipcodeb = $this->zipcode;
        } else {
            // Clear secondary address fields if unchecked
            $this->bldgno = '';
            $this->namebldg = '';
            $this->lotno = '';
            $this->blockno = '';
            $this->street = '';
            $this->subdivision = '';
            $this->barangay = '';
            $this->district = '';
            $this->city = '';
            $this->province = '';
            $this->zipcode = '';
        }
    }

    public function submit()
    {
       $this->validate();

        
       $this->appCreated = Applications::create([
            'typeofapplication' => $this->typeofapplication,
            'typeofbussiness' => $this->typeofbussiness,
            'gender' => $this->gender,
            'dtisecreg' => $this->dtisecreg,
            'tin' => $this->tin,
            'tradename' => $this->tradename,
            'telno' => $this->telno,
            'mobileno' => $this->mobileno,
            'email' => $this->email,
            'surname' => $this->surname,
            'givenname' => $this->givenname,
            'middlename' => $this->middlename,
            'suffix' => $this->suffix,
            'corp' => $this->corp,
            'floorarea' => $this->floorarea,
            'bmale' => $this->bmale,
            'bfemale' => $this->bfemale,
            'rescity' => $this->rescity,
            'vantruck' => $this->vantruck,
            'motorcycle' => $this->motorcycle,
            'owned' => $this->owned,
            'taxdecleration' => $this->taxdecleration,
            'propertyid' => $this->propertyid,
            'taxincentives' => $this->taxincentives,
            'businessActivity' => $this->businessActivity,
            'othersInput' => $this->othersInput,
            // Primary address fields
            'bldgno' => $this->bldgno,
            'namebldg' => $this->namebldg,
            'lotno' => $this->lotno,
            'blockno' => $this->blockno,
            'street' => $this->street,
            'subdivision' => $this->subdivision,
            'barangay' => $this->barangay,
            'district' => $this->district,
            'city' => $this->city,
            'province' => $this->province,
            'zipcode' => $this->zipcode,
            // Secondary address fields
            'bldgnob' => $this->bldgnob,
            'namebldgb' => $this->namebldgb,
            'lotnob' => $this->lotnob,
            'blocknob' => $this->blocknob,
            'streetb' => $this->streetb,
            'subdivisionb' => $this->subdivisionb,
            'barangayb' => $this->barangayb,
            'districtb' => $this->districtb,
            'cityb' => $this->cityb,
            'provinceb' => $this->provinceb,
            'zipcodeb' => $this->zipcodeb,
            'status' => 'For Payment',
        ]);

        session()->flash('message', 'Application submitted successfully.');
    }

    public function proceedToCheckout(){
        return redirect()->route('documate.checkout', ['id' => $this->appCreated->id]);
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
            'applications_id' => $this->appCreated->id,
            'line_of_business' => $this->lineOfBusiness,
            'psic' => $this->psic,
            'products_services' => $this->productsServices,
            'no_of_units' => $this->noOfUnits,
            'capitalization' => $this->capitalization ?? null,
            'gross_sales' => $this->grossSales ?? null,
        ]);

        $this->businessInformation = BusinessInformation::where('applications_id', '=', $this->appCreated->id)->get();
        $this->clear();
    }

    public function deleteBusinessInfo($id){
        $businessInfo = BusinessInformation::find($id);

        $businessInfo->delete();

        $this->businessInformation = BusinessInformation::where('applications_id', '=', $this->appCreated->id)->get();
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
                'application_id' => $this->appCreated->id,
                'title' => $this->attachmentTitle,
                'file_path' => $filePath,
            ]);
        }

        $this->attachFile = Attachment::where('application_id', '=', $this->appCreated->id)->get();
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
            $this->attachFile = Attachment::where('application_id', '=', $this->appCreated->id)->get();
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
        return view('livewire.application');
    }
}
