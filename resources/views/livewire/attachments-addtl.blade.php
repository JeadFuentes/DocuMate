<div>
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
        <a href="{{route('documate.orders')}}" class="btn btn-primary mt-3">Back to Orders</a>
    </div>
</div>
