<!-- resources/views/livewire/application.blade.php -->
<div class="container mt-5">
    @if ($this->appCreated)
        
            <div class="container">
                <h3>Add Line of Business</h3>
                <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Line of Business</th>
                        <th scope="col">Philippine Standard Industrial Code</th>
                        <th scope="col">Products / Services</th>
                        <th scope="col">No. of Units</th>
                        <th scope="col">Capitalization (For New Business)</th>
                        <th scope="col">Last Year’s Gross Sales/Receipts (For Renewal)</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($this->businessInformation)
                           @foreach ($this->businessInformation as $businessInfo)
                            <tr class="text-center">
                                    <td>{{$businessInfo->id}}</td>
                                    <td>{{$businessInfo->line_of_business}}</td>
                                    <td>{{$businessInfo->psic}}</td>
                                    <td>{{$businessInfo->products_services}}</td>
                                    <td>{{$businessInfo->no_of_units}}</td>
                                    <td>{{$businessInfo->capitalization}}</td>
                                    <td>{{$businessInfo->gross_sales}}</td>
                                    <td><button wire:click="deleteBusinessInfo({{$businessInfo->id}})" type="button" class="btn btn-danger btn-sm">Remove</button></td>
                                </tr>
                            @endforeach
                           @endif
                    </tbody>
                  </table>
                <form wire:submit.prevent="submitBusinessInfo">
                        <div class="row mb-3">
                            <div class="col"><p class="form-label">Line of Business</p></div>
                            <div class="col"><p class="form-label">Philippine Standard Industrial Code</p></div>
                            <div class="col"><p class="form-label">Products / Services</p></div>
                            <div class="col"><p class="form-label">No. of Units</p></div>
                            <div class="col"><p class="form-label">Capitalization (For New Business)</p></div>
                            <div class="col"><p class="form-label">Last Year’s Gross Sales/Receipts (For Renewal)</p></div>
                        </div>
    
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" wire:model="lineOfBusiness" id="lineOfBusiness" name="lineOfBusiness" required>
                                @error('lineOfBusiness') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" wire:model="psic" name="psic" id="psic" required>
                                @error('psic') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" wire:model="productsServices" name="productsServices" id="productsServices" required>
                                @error('productsServices') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" wire:model="noOfUnits" name="noOfUnits" id="noOfUnits" required>
                                @error('noOfUnits') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" wire:model="capitalization" name="capitalization" id="capitalization" required>
                                @error('capitalization') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" wire:model="grossSales" name="grossSales" id="grossSales" required>
                                @error('grossSales') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    <button type="submit" name="submitBusinessInfo" class="btn btn-primary">Save</button>
                </form>
                <hr>
                <!--attachments-->
                <h3 class="mt-5">Add Attachments</h3>
                <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Path</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($this->attachFile)
                           @foreach ($this->attachFile as $attachFiles)
                            <tr class="text-center">
                                    <td>{{$attachFiles->id}}</td>
                                    <td>{{$attachFiles->title}}</td>
                                    <td>{{$attachFiles->file_path}}</td>
                                    <td><button wire:click="deleteAttachment({{$attachFiles->id}})" type="button" class="btn btn-danger btn-sm">Remove</button></td>
                                </tr>
                            @endforeach
                           @endif
                    </tbody>
                  </table>
                <form wire:submit.prevent="submitAttachment">
                        <div class="row mb-3 text-center">
                            <div class="col">Attachment Title</div>
                            <div class="col">File</div>
                        </div>
    
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" wire:model="attachmentTitle" name="attachmentTitle" id="attachmentTitle" placeholder="Attachment Title" required>
                                    @error('attachmentTitle') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col">
                                    <input type="file" class="form-control" wire:model="attchFile" name="attchFile" id="attchFile">
                                    @error('attchFile') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <button wire:click="proceedToCheckout()" type="button" class="btn btn-primary mt-3">Proceed to Payment</button>
            </div>
            <hr>
            
    @else
    <form wire:submit.prevent="submit">

        <!-- Type of Application -->
        <div class="mb-3">
            <h3 class="form-label">Select an Option:</h3>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="new" name="application" wire:model="typeofapplication" value="new">
                <label class="form-check-label" for="new">NEW | Annually</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="renewal" name="application" wire:model="typeofapplication" value="renewal">
                <label class="form-check-label" for="renewal">RENEWAL | Bi-Annually</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="additional" name="application" wire:model="typeofapplication" value="additional">
                <label class="form-check-label" for="additional">ADDITIONAL | Quarterly</label>
            </div>
            @error('typeofapplication') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <hr>

        <!-- Business Information -->
        <h3 class="form-label"><strong>A. BUSINESS INFORMATION AND REGISTRATION</strong></h3>
        <hr>
        <!-- type of Business -->
        <div class="mb-3">
            <h4 class="form-label">Select an Option:</h4>
            
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
            <h4 class="form-label">Select Gender:</h4>
            
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
        <!-- SEC and TIN -->
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
        <!-- Trade Name or Franchise -->
        <div class="mb-3">
            <label for="tradename" class="form-label">Trade Name / Franchise (if applicable): </label>
            <input type="text" class="form-control" id="tradename" wire:model="tradename" required>
            @error('tradename') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <hr>
        <!-- Main Address -->
        <div class="container">
            <h4>Main Office Address: </h4>
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
        <!-- tel mobile and email -->
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
                    <input type="email" class="form-control" id="email" wire:model="email" name="email" id="email" autocomplete="email" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <hr>
        <!-- name of owners for sole and other -->
        <div id="sole-selection" class="mb-3" style="display: none;">
            <div class="row">
                <div class="col-sm">
                    <div id="sole-selection-label" class="mb-3" style="display: none;">
                        <div class="mb-3">
                            <h4 class="form-label">(For Sole Proprietorship) <br>Name of Owner: </h4>
                        </div>
                    </div>
                    <div id="other-selection-label" class="mb-3" style="display: none;">
                        <div class="mb-3">
                            <h4 class="form-label">(For Corporations/Cooperative/Partnerships) <br>Name of President/Officer In Charge: </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname:</label>
                        <input type="text" class="form-control" id="surname" wire:model="surname" required>
                        @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="givenname" class="form-label">Given Name:</label>
                        <input type="text" class="form-control" id="givenname" wire:model="givenname" required>
                        @error('givenname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="middlename" class="form-label"> Middle Name: </label>
                        <input type="text" class="form-control" id="middlename" wire:model="middlename" required>
                        @error('middlename') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="suffix" class="form-label">Suffix:</label>
                        <input type="text" class="form-control" id="suffix" wire:model="suffix" required>
                        @error('suffix') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!-- For corporatrion -->
        <div id="corporation-selection" class="mb-3" style="display: none;">
            <h4 class="form-label">For Corporation:</h4>
            
            <div class="form-check form-check-inline mx-5">
                <input type="radio" class="form-check-input" id="Filipino" wire:model="corp" name="corp" value="Filipino">
                <label class="form-check-label" for="Filipino">Filipino</label>
            </div>
        
            <div class="form-check form-check-inline mx-5">
                <input type="radio" class="form-check-input" id="Foreign" wire:model="corp" name="corp" value="Foreign">
                <label class="form-check-label" for="Foreign">Foreign</label>
            </div>
            <hr>
        </div>

        <h3><b>B. BUSINESS OPERATION  </b></h3><br>
        <hr>

        <!-- about employees sang cars -->
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

        <!-- Same as Main Address Checkbox -->
        <h4">Business Location Address: </h4>
        <div class="mb-3">
            <div class="form-check mx-2">
                <label class="form-check-label" for="sameasmain">Same as Main Office Address</label>
                <input type="checkbox" class="form-check-input" id="sameasmain" name="sameasmain" wire:model="sameasmain" value="sameasmain" onchange="toggleAddress(this)">
            </div>
        </div>

        <!-- Secondary Address -->
        <div id="sameAddress" class="mb-3" style="display: block;">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="bldgnob" class="form-label">House/Bldg. No</label>
                            <input type="text" class="form-control" id="bldgnob" wire:model="bldgnob">
                            @error('bldgnob') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="namebldgb" class="form-label">Name of Bldg</label>
                            <input type="text" class="form-control" id="namebldgb" wire:model="namebldgb">
                            @error('namebldgb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="lotnob" class="form-label">Lot No</label>
                            <input type="text" class="form-control" id="lotnob" wire:model="lotnob">
                            @error('lotnob') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="blocknob" class="form-label">Block No</label>
                            <input type="text" class="form-control" id="blocknob" wire:model="blocknob">
                            @error('blocknob') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="streetb" class="form-label">Street</label>
                            <input type="text" class="form-control" id="streetb" wire:model="streetb">
                            @error('streetb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="subdivisionb" class="form-label">Subdivision</label>
                            <input type="text" class="form-control" id="subdivisionb" wire:model="subdivisionb">
                            @error('subdivisionb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="barangayb" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="barangayb" wire:model="barangayb">
                            @error('barangayb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="districtb" class="form-label">District</label>
                            <input type="text" class="form-control" id="districtb" wire:model="districtb">
                            @error('districtb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="cityb" class="form-label">City</label>
                            <input type="text" class="form-control" id="cityb" wire:model="cityb">
                            @error('cityb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="provinceb" class="form-label"> Province</label>
                            <input type="text" class="form-control" id="provinceb" wire:model="provinceb">
                            @error('provinceb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="zipcodeb" class="form-label"> Zip Code</label>
                            <input type="text" class="form-control" id="zipcodeb" wire:model="zipcodeb">
                            @error('zipcodeb') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!-- owned lots -->
        <div class="container">
            <div class="mb-3">
                <h5>Owned ?</h5>
                
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="yes" name="owned" wire:model="owned" value="true" onchange="toggleOwned(this)">
                    <label class="form-check-label" for="yes">Yes</label>
                </div>
            
                <div class="form-check form-check-inline mx-5">
                    <input type="radio" class="form-check-input" id="no" name="owned" wire:model="owned" value="false" onchange="toggleOwned(this)">
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
        <!-- tax incentives from any Government -->
        <div class="mb-3">
            <h5>Do you have tax incentives from any Government Entity?  </h5>
            
            <div class="form-check form-check-inline mx-5">
                <input type="radio" class="form-check-input" id="yestax" name="taxincentives" wire:model="taxincentives" value="true">
                <label class="form-check-label" for="yes"> Yes (Please attach copy of your certificate)  </label>
            </div>
        
            <div class="form-check form-check-inline mx-5">
                <input type="radio" class="form-check-input" id="notax" name="taxincentives" wire:model="taxincentives" value="false">
                <label class="form-check-label" for="no">No</label>
            </div>
        </div>
        <hr>
        <!-- Business Activity -->
        <div class="mb-3">
            <h5">Business Activity (Please check one):</label>
        
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
        

        <p class="text-danger">NOTE: SAVE First to Add Business Information and Attachments</p>
        <div class="mt-4">
            <div class="d-flex flex-row mb-3">
                <div class="p-2"><button type="submit" class="btn btn-primary">Save</button></div>
            </div>
        </div>
    </form>
    @endif
</div>
