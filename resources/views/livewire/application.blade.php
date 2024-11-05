<div>
    <div class="container mt-5">
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label class="form-label">Select an Option:</label>
                
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="new" name="application" wire:model="typeofapplication" value="new">
                    <label class="form-check-label" for="new">NEW | Annually</label>
                </div>
            
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="renewal" name="application" wire:model="typeofapplication" value="renewal">
                    <label class="form-check-label" for="renewal">RENEWAL | B-Annually</label>
                </div>
            
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="additional" name="application" wire:model="typeofapplication" value="additional">
                    <label class="form-check-label" for="additional">ADDITIONAL | Quarterly</label>
                </div>
            </div>
            <hr>

            <label class="form-label"><b>A.BUSINESS INFORMATION AND REGISTRATION </b></label><br>
            <hr>

            <div class="mb-3">
                <label class="form-label">Select an Option:</label>
                
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="soleproprietor" name="bussiness" wire:model="typeofbussiness" value="soleproprietor" onchange="toggleGenderSelection(this)">
                    <label class="form-check-label" for="soleproprietor">Sole Proprietor</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="onepersoncorporation" name="bussiness" wire:model="typeofbussiness" value="onepersoncorporation" onchange="toggleGenderSelection(this)">
                    <label class="form-check-label" for="onepersoncorporation">One Person Corporation</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="partnership" name="bussiness" wire:model="typeofbussiness" value="partnership" onchange="toggleGenderSelection(this)">
                    <label class="form-check-label" for="partnership">Partnership</label>
                </div>

                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="corporation" name="bussiness" wire:model="typeofbussiness" value="corporation" onchange="toggleGenderSelection(this)">
                    <label class="form-check-label" for="corporation">Corporation</label>
                </div>
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="cooperative" name="bussiness" wire:model="typeofbussiness" value="cooperative" onchange="toggleGenderSelection(this)">
                    <label class="form-check-label" for="cooperative">Cooperative</label>
                </div>
            </div>
            
            <div id="gender-selection" class="mb-3" style="display: none;">
                <label class="form-label">Select Gender:</label>
                
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="dtisecreg" class="form-label">DTI / CDA / SEC Registration:</label>
                        <input type="text" class="form-control" id="dtisecreg" wire:model="dtisecreg" required>
                        @error('dtisecreg') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="tin" class="form-label">Tax Identification Number (TIN):</label>
                        <input type="text" class="form-control" id="tin" wire:model="tin" required>
                        @error('tin') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>

            <div class="mb-3">
                <label for="tradename" class="form-label">Trade Name / Franchise (if applicable): </label>
                <input type="text" class="form-control" id="tradename" wire:model="tradename" required>
                @error('tradename') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <hr>

            <div class="container">
                <label for="">Main Office Address: </label>
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="bldgno" class="form-label">House/Bldg. No</label>
                            <input type="text" class="form-control" id="bldgno" wire:model="bldgno" required>
                            @error('bldgno') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="namebldg" class="form-label">Name of Bldg</label>
                            <input type="text" class="form-control" id="namebldg" wire:model="namebldg" required>
                            @error('namebldg') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="lotno" class="form-label">Lot No</label>
                            <input type="text" class="form-control" id="lotno" wire:model="lotno" required>
                            @error('lotno') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="blockno" class="form-label">Block No</label>
                            <input type="text" class="form-control" id="blockno" wire:model="blockno" required>
                            @error('blockno') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control" id="street" wire:model="street" required>
                            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="subdivision" class="form-label">Subdivision</label>
                            <input type="text" class="form-control" id="subdivision" wire:model="subdivision" required>
                            @error('subdivision') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="barangay" wire:model="barangay" required>
                            @error('barangay') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" wire:model="district" required>
                            @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" wire:model="city" required>
                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="province" class="form-label"> Province</label>
                            <input type="text" class="form-control" id="province" wire:model="province" required>
                            @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="zipcode" class="form-label"> Zip Code</label>
                            <input type="text" class="form-control" id="zipcode" wire:model="zipcode" required>
                            @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="telno" class="form-label">Telephone No: </label>
                        <input type="text" class="form-control" id="telno" wire:model="telno" required>
                        @error('telno') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="mobileno" class="form-label"> Mobile No: </label>
                        <input type="text" class="form-control" id="mobileno" wire:model="mobileno" required>
                        @error('mobileno') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail Address:</label>
                        <input type="text" class="form-control" id="email" wire:model="email" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>

            <div id="sole-selection" class="mb-3" style="display: none;">
                <div class="row">
                    <div class="col-sm">
                        <div id="sole-selection-label" class="mb-3" style="display: none;">
                            <div class="mb-3">
                                <label for="" class="form-label">(For Sole Proprietorship) <br>Name of Owner: </label>
                            </div>
                        </div>
                        <div id="other-selection-label" class="mb-3" style="display: none;">
                            <div class="mb-3">
                                <label for="" class="form-label">(For Corporations/Cooperative/Partnerships) <br>Name of President/Officer In Charge: </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="telno" class="form-label">Telephone No: </label>
                            <input type="text" class="form-control" id="telno" wire:model="telno" required>
                            @error('telno') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail Address:</label>
                            <input type="text" class="form-control" id="email" wire:model="email" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="mobileno" class="form-label"> Mobile No: </label>
                            <input type="text" class="form-control" id="mobileno" wire:model="mobileno" required>
                            @error('mobileno') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail Address:</label>
                            <input type="text" class="form-control" id="email" wire:model="email" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            
            <div id="corporation-selection" class="mb-3" style="display: none;">
                <label class="form-label">For Corporation:</label>
                
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="Filipino" name="corp" value="Filipino">
                    <label class="form-check-label" for="Filipino">Filipino</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="Foreign" name="corp" value="Foreign">
                    <label class="form-check-label" for="Foreign">Foreign</label>
                </div>
                <hr>
            </div>

            <label class="form-label"><b>B. BUSINESS OPERATION  </b></label><br>
            <hr>

            <div class="row">
                <div class="col-sm">
                    <p class="m-0 p-0">Business Area (in sq.m.)</p>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="floorarea" class="form-label form-inline">Total Floor Area in sq.m</label>
                        <input type="text" class="form-control" id="floorarea" wire:model="floorarea" required>
                        @error('floorarea') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <p class="m-0 p-0">Total No. of Employees in Establishment:</p>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="bmale" class="form-label">Male</label>
                        <input type="text" class="form-control" id="bmale" wire:model="bmale" required>
                        @error('bmale') <span class="text-danger">{{ $message }}</span> @enderror

                        <label for="bfemale" class="form-label">Female</label>
                        <input type="text" class="form-control" id="bfemale" wire:model="bfemale" required>
                        @error('bfemale') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <p class="m-0 p-0">No. of Employees residing </p>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="rescity" class="form-label">within the City</label>
                        <input type="text" class="form-control" id="rescity" wire:model="rescity" required>
                        @error('rescity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <p class="m-0 p-0">No. of Delivery Vehicles (if applicable):</p>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="vantruck" class="form-label"> Van/Truck</label>
                        <input type="text" class="form-control" id="vantruck" wire:model="vantruck" required>
                        @error('vantruck') <span class="text-danger">{{ $message }}</span> @enderror

                        <label for="motorcycle" class="form-label">Motorcyle</label>
                        <input type="text" class="form-control" id="motorcycle" wire:model="motorcycle" required>
                        @error('motorcycle') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
    
            <label for="">Business Location Address: </label>
            <div class="mb-3">
                <div class="form-check mx-2">
                    <label class="form-check-label" for="sameasmain">Same as Main Office Address</label>
                    <input type="checkbox" class="form-check-input" id="sameasmain" name="sameasmain" wire:model="sameasmain" value="sameasmain" onchange="toggleAddress(this)">
                </div>
            </div>
            <div id="sameAddress" class="mb-3" style="display: block;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="bldgnob" class="form-label">House/Bldg. No</label>
                                <input type="text" class="form-control" id="bldgnob" wire:model="bldgnob" required>
                                @error('bldgnob') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="namebldgb" class="form-label">Name of Bldg</label>
                                <input type="text" class="form-control" id="namebldgb" wire:model="namebldgb" required>
                                @error('namebldgb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="lotnob" class="form-label">Lot No</label>
                                <input type="text" class="form-control" id="lotnob" wire:model="lotnob" required>
                                @error('lotnob') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="blocknob" class="form-label">Block No</label>
                                <input type="text" class="form-control" id="blocknob" wire:model="blocknob" required>
                                @error('blocknob') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="streetb" class="form-label">Street</label>
                                <input type="text" class="form-control" id="streetb" wire:model="streetb" required>
                                @error('streetb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="subdivisionb" class="form-label">Subdivision</label>
                                <input type="text" class="form-control" id="subdivisionb" wire:model="subdivisionb" required>
                                @error('subdivisionb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="barangayb" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangayb" wire:model="barangayb" required>
                                @error('barangayb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="districtb" class="form-label">District</label>
                                <input type="text" class="form-control" id="districtb" wire:model="districtb" required>
                                @error('districtb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="cityb" class="form-label">City</label>
                                <input type="text" class="form-control" id="cityb" wire:model="cityb" required>
                                @error('cityb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="provinceb" class="form-label"> Province</label>
                                <input type="text" class="form-control" id="provinceb" wire:model="provinceb" required>
                                @error('provinceb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="zipcodeb" class="form-label"> Zip Code</label>
                                <input type="text" class="form-control" id="zipcodeb" wire:model="zipcodeb" required>
                                @error('zipcodeb') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>

            <div class="container">
                <div class="mb-3">
                    <label class="form-label">Owned ?</label>
                    
                    <div class="form-check form-check-inline mx-5">
                        <input type="radio" class="form-check-input" id="yes" name="owned" wire:model="ownedhpuse" value="yes" onchange="toggleOwned(this)">
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                
                    <div class="form-check form-check-inline mx-5">
                        <input type="radio" class="form-check-input" id="no" name="owned" wire:model="ownedhouse" value="no" onchange="toggleOwned(this)">
                        <label class="form-check-label" for="no">No</label>
                    </div>
                </div>
    
                <div id="yesChecked" class="mb-3" style="display: none;">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="taxdecleration" class="form-label">Tax Declaration No. </label>
                                <input type="text" class="form-control" id="taxdecleration" wire:model="taxdecleration">
                                @error('taxdecleration') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="propertyid" class="form-label"> or Property Identification No.</label>
                                <input type="text" class="form-control" id="propertyid" wire:model="propertyid">
                                @error('propertyid') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div id="noChecked" class="mb-3" style="display: none;">
                    <h5>attach copy of Notarized Lease Contract </h5>
                </div>
            </div>
            <hr>

            <div class="mb-3">
                <label class="form-label">Do you have tax incentives from any Government Entity?  </label>
                
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="yes" name="taxincentives" wire:model="taxincentives" value="yes" onchange="toggleOwned(this)">
                    <label class="form-check-label" for="yes"> Yes (Please attach copy of your certificate)  </label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="no" name="taxincentives" wire:model="taxincentives" value="no" onchange="toggleOwned(this)">
                    <label class="form-check-label" for="no">No</label>
                </div>
            </div>
            <hr>

            <div class="mb-3">
                <label class="form-label">Business Activity (Please check one):</label>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="mainOffice" name="businessActivity" value="Main Office" wire:model="businessActivity">
                    <label class="form-check-label" for="mainOffice">Main Office</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="branchOffice" name="businessActivity" value="Branch Office" wire:model="businessActivity">
                    <label class="form-check-label" for="branchOffice">Branch Office</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="adminOffice" name="businessActivity" value="Admin Office Only" wire:model="businessActivity">
                    <label class="form-check-label" for="adminOffice">Admin Office Only</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="warehouse" name="businessActivity" value="Warehouse" wire:model="businessActivity">
                    <label class="form-check-label" for="warehouse">Warehouse</label>
                </div>
            
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="others" name="businessActivity" value="Others" wire:model="businessActivity" onchange="toggleOthersInput(this)">
                    <label class="form-check-label" for="others">Others, Please Specify:</label>
                    <input type="text" class="form-control mt-2" id="othersInput" name="othersInput" style="display: none;" wire:model="othersInput">
                </div>
            </div>
            <hr>

            <div class="container">
                <h5 class="mt-4">Business Information</h5>
                
                <div class="row mb-3">
                    <div class="col">
                        <label for="lineOfBusiness" class="form-label">Line of Business</label>
                    </div>
                    <div class="col">
                        <label for="psic" class="form-label">Philippine Standard Industrial Code</label>
                    </div>
                    <div class="col">
                        <label for="productsServices" class="form-label">Products / Services</label>
                    </div>
                    <div class="col">
                        <label for="noOfUnits" class="form-label">No. of Units</label>
                    </div>
                    <div class="col">
                        <label for="capitalization" class="form-label">Capitalization (For New Business)</label>
                    </div>
                    <div class="col">
                        <label for="grossSales" class="form-label">Last Year’s Gross Sales/Receipts (For Renewal)</label>
                    </div>
                </div>
            
                @for ($i = 0; $i < 3; $i++)
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="lineOfBusiness.{{ $i }}">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" wire:model="psic.{{ $i }}">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" wire:model="productsServices.{{ $i }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" wire:model="noOfUnits.{{ $i }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" wire:model="capitalization.{{ $i }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" wire:model="grossSales.{{ $i }}">
                    </div>
                </div>
                @endfor
            </div>
            <hr>
            
            <label class="form-label"><b>ATTACHMENTS</b></label><br>
            <hr>

            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <div class="mb-3">
                        <label for="dti" class="form-label">1. DTI</label>
                        <input type="file" class="form-control" id="dti" wire:model="dti">
                        @error("dti") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="mb-3">
                        <label for="rhu" class="form-label">2. RHU</label>
                        <input type="file" class="form-control" id="rhu" wire:model="rhu">
                        @error("rhu") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="mb-3">
                        <label for="bfp" class="form-label">3. BFP</label>
                        <input type="file" class="form-control" id="bfp" wire:model="bfp">
                        @error("bfp") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="mb-3">
                        <label for="buildingpermit" class="form-label">4. BUILDING OFFICIAL</label>
                        <input type="file" class="form-control" id="buildingpermit" wire:model="buildingpermit">
                        @error("buildingpermit") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="pnp" class="form-label">5. PNP</label>
                          <input type="file" class="form-control" id="pnp" wire:model="pnp">
                          @error("pnp") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="zoningofficial" class="form-label">6. ZONING OFFICIAL</label>
                          <input type="file" class="form-control" id="zoningofficial" wire:model="zoningofficial">
                          @error("zoningofficial") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="menro" class="form-label">7. MENRO</label>
                          <input type="file" class="form-control" id="menro" wire:model="menro">
                          @error("menro") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="treasureroffice" class="form-label">8. TREASURERS OFFICE</label>
                          <input type="file" class="form-control" id="treasureroffice" wire:model="treasureroffice">
                          @error("treasureroffice") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="marketsup" class="form-label">9. MARKET SUPERVISOR</label>
                          <input type="file" class="form-control" id="marketsup" wire:model="marketsup">
                          @error("marketsup") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="mb-3">
                          <label for="mayoroffice" class="form-label">10. MAYORS OFFICE</label>
                          <input type="file" class="form-control" id="mayoroffice" wire:model="mayoroffice">
                          @error("mayoroffice") <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                </div>
            </div>
            <hr>
            
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="declaration" wire:model="declaration">
                <label class="form-check-label" for="declaration">
                    I DECLARE UNDER PENALTY OF PERJURY that all information in this application is true and correct based on my personal knowledge and authentic records submitted to the Investment Services, Business Permits & License Division. Any false or misleading information supplied, or production of fake/falsified documents shall be grounds for appropriate legal action against me and automatically revokes permit. I hereby agree that all personal (as defined under the Data Privacy Law of 2012 and its implementing Rules and Regulation) and account transaction information or records with the Iloilo City Government may be processed, profiled or shared to requesting parties or for the purpose of any court, legal process, examination, inquiry and audit or investigation of any authority.
                </label>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
