<?php

namespace App\Livewire;

use Livewire\Component;

class Application extends Component
{
    public $typeofapplication = null;
    public $typeofbussiness = '';
    public $gender = null;
    public $dtisecreg;
    public $tin;
    public $tradename;
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
    public $telno;
    public $mobileno;
    public $email;
    public $floorarea;
    public $bmale;
    public $bfemale;
    public $rescity;
    public $vantruck;
    public $motorcycle;
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
    public $sameasmain; //this for checking main addres
    public $owned;
    public $taxdecleration;
    public $propertyid;
    public $taxincentives;
    public $businessActivity;
    public $othersInput = '';
    public $lineOfBusiness = ['', '', ''];
    public $psic = ['', '', ''];
    public $productsServices = ['', '', ''];
    public $noOfUnits = [0, 0, 0];
    public $capitalization = [0, 0, 0];
    public $grossSales = [0, 0, 0];
    public $declaration = false;
    public $dti;
    public $rhu;
    public $bfp;
    public $buildingpermit;
    public $pnp;
    public $zoningofficial;
    public $menro;
    public $treasureroffice;
    public $marketsup;
    public $mayoroffice;

    public function save(){
        dd($this->sameasmain);
    }

    public function render()
    {
        return view('livewire.application');
    }
}
