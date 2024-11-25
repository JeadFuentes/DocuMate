<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIFIED APPLICATION FORM FOR BUSINESS PERMIT </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body >
    <div >
        <h3 class="form-label">Type of Application</h3>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="new" name="application" wire:model="typeofapplication" value="new" checked>
            <label class="form-check-label" for="new">{{$pdfdata->typeofapplication}}</label>
        </div>
    </div>
    <hr>

    <!-- Business Information -->
    <h4 class="form-label"><strong>A. BUSINESS INFORMATION AND REGISTRATION</strong></h4>
    <hr>
    <!-- type of Business -->
    <div >
        <div class="form-check form-check-inline mx-5">
            <input type="radio" class="form-check-input" id="soleproprietor" name="bussiness" wire:model="typeofbussiness" value="soleproprietor" checked>
            <label class="form-check-label" for="soleproprietor">{{$pdfdata->typeofbussiness}}  <br>   Gender: {{$pdfdata->gender}}</label>
        </div>
    </div>
    <hr>
    <!-- SEC and TIN -->
    <div class="row">
        <div class="col-sm">
            <div>
                <p class="form-label">
                    DTI / CDA / SEC Registration: {{$pdfdata->dtisecreg}} <br>
                    Tax Identification Number (TIN): {{$pdfdata->tin}}
                </p>
            </div>
        </div>
    </div>
    <hr>
    <!-- Trade Name or Franchise -->
    <div>
        <p class="form-label">Trade Name / Franchise (if applicable): {{$pdfdata->tradename}}</p>
    </div>
    <hr>
    <!-- Main Address -->
    <div class="container">
        <div>
            <h4>Main Office Address: </h4>
            <p>
                House/Bldg. No: {{$pdfdata->bldgno}} <br>
                Name of Bldg:   {{$pdfdata->namebldg}} <br>
                Lot No:         {{$pdfdata->lotno}} <br>
                Block No:       {{$pdfdata->blockno}} <br>
                Street:         {{$pdfdata->street}} <br>
                Subdivision:    {{$pdfdata->subdivision}} <br>
                Barangay:       {{$pdfdata->barangay}} <br>
                District:       {{$pdfdata->district}} <br>
                City:           {{$pdfdata->city}} <br>
                Province:       {{$pdfdata->province}} <br>
                Zip Code:       {{$pdfdata->zipcode}}
            </p>
        </div>
    </div>
    <hr>
    <!-- tel mobile and email -->
    <div class="row">
        <div class="col-sm">
            <div>
                <p class="form-label">
                    Telephone No: {{$pdfdata->telno}} <br>
                    Mobile No: {{$pdfdata->mobileno}} <br>
                    E-mail Address: {{$pdfdata->email}}
                </p>
            </div>
        </div>
    </div>
    <hr>
    <!-- name of owners for sole and other -->
    <div>
        <div class="row">
            <div class="col-sm">
                <div>
                    <div>
                        <p class="form-label">
                            (For Sole Proprietorship) Name of Owner: <br>
                            (For Corporations/Cooperative/Partnerships) Name of President/Officer In Charge: <br>
                            Surname: {{$pdfdata->surname}}
                            Given Name: {{$pdfdata->givenname}}
                            Middle Name: {{$pdfdata->middlename}}
                            Suffix: {{$pdfdata->suffix}} <br>
                            <b>For Corporation: {{$pdfdata->corp}}</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <h4><b>B. BUSINESS OPERATION  </b></h4><br>
    <hr>

    <!-- about employees sang cars -->
    <div class="row">
        <div>
            <h4 >Business Area (in sq.m.)</h4>
                <p class="form-label form-inline">Total Floor Area in sq.m: {{$pdfdata->floorarea}}</p>
        </div>
        <div>
            <h4>Total No. of Employees in Establishment:</h4>
            <p class="form-label">
                Male: {{$pdfdata->bmale}} <br>
                Female: {{$pdfdata->bfemale}}
            </p>
        </div>
        <div>
            <h4>No. of Employees residing </h4>
            <label for="rescity" class="form-label">within the City: {{$pdfdata->rescity}}</label>
        </div>
        <div>
            <h4 >No. of Delivery Vehicles (if applicable):</h4>
            <p class="form-label"> 
                Van/Truck: {{$pdfdata->vantruck}} <br>
                Motorcyle: {{$pdfdata->motorcycle}}
            </p>
        </div>
    </div>
    <hr>
    

    <!-- Secondary Address -->
    <div>
        <h4">Business Location Address: </h4>
        <p>
            House/Bldg. No: {{$pdfdata->bldgnob}} <br>
            Name of Bldg:   {{$pdfdata->namebldgb}} <br>
            Lot No:         {{$pdfdata->lotnob}} <br>
            Block No:       {{$pdfdata->blocknob}} <br>
            Street:         {{$pdfdata->streetb}} <br>
            Subdivision:    {{$pdfdata->subdivisionb}} <br>
            Barangay:       {{$pdfdata->barangayb}} <br>
            District:       {{$pdfdata->districtb}} <br>
            City:           {{$pdfdata->cityb}} <br>
            Province:       {{$pdfdata->provinceb}} <br>
            Zip Code:       {{$pdfdata->zipcodeb}} <br>
            <b>Owned ?: {{$pdfdata->owned}}</b>
        </p>
        <hr>
    </div>
    <!-- owned lots -->
    <div class="container">
        <div>
            <div class="row">
                <div class="col-sm">
                    <div>
                        <p class="form-label">
                            Tax Declaration No.:  {{$pdfdata->taxdecleration}} <br>
                            or Property Identification No.: {{$pdfdata->propertyid}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="noChecked" style="display: none;">
            <h5>attach copy of Notarized Lease Contract </h5>
        </div>
    </div>
    <hr>
    <!-- tax incentives from any Government -->
    <div>
        <h5>
            Do you have tax incentives from any Government Entity?:   {{$pdfdata->taxincentives}} <br>
            If Yes (Please attach copy of your certificate) 
        </h5>
    </div>
    <hr>
    <!-- Business Activity -->
    <div>
        <h5">Business Activity (Please check one): <br>
            {{$pdfdata->businessActivity}}
        </h5>
        <p>{{$pdfdata->othersInput}}</p>
    </div>
    <hr>
</body>
</html>