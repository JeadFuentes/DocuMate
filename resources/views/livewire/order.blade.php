<div class="content">
    <!-- Search Bar 
    <div class="mt-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by name or email" onkeyup="searchOrders()">
    </div>-->

    <!-- Status Filter -->
    <div class="mt-4">
        <select wire:model="status" wire:change='stats' id="statusFilter" class="form-control" onchange="filterByStatus()">
            <option value="All">All Statuses</option>
            <option value="forPayment">For Payment</option>
            <option value="forProccessing">For Proccessing</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        </select>
    </div>

    <!-- Applications Table -->
    <h4 class="mt-5">Current Applications</h4>
    <table class="table" id="applicationsTable">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Type of Application</th>
                <th>Type of Bussiness</th>
                <th>Trade Name</th>
                <th>Status</th>
                <th>View</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
                @if ($this->Applications)
                @foreach ($this->Applications as $App)
                    <tr class="text-center">
                        <td>{{$App->id}}</td>
                        <td>{{$App->typeofapplication}}</td>
                        <td>{{$App->typeofbussiness}}</td>
                        <td>{{$App->tradename}}</td>
                        @if ($App->status == 'Approved')
                          <td class="text-success"><h4>{{$App->status}}</h4></td>
                        @elseif ($App->status == 'Reject')
                          <td class="text-danger"><h4>{{$App->status}}</h4></td>
                        @else
                          <td>{{$App->status}}</td>
                        @endif
                        
                        <td>
                            <button wire:click="form({{$App->id}})" type="button" class="btn btn-link">Form</button>
                            <button wire:click="line({{$App->id}})" type="button" class="btn btn-link">Line of Bussiness</button>
                            <button wire:click="attach({{$App->id}})" type="button" class="btn btn-link">Attachments</button>
                            <button wire:click="receipt({{$App->id}})" type="button" class="btn btn-link">Receipt</button>
                        </td>
                        <td>
                            <button wire:click="approve({{$App->id}})" type="button" class="btn btn-success btn-sm">Approve</button>
                            <button wire:click="reject({{$App->id}})" type="button" class="btn btn-danger btn-sm">Reject</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <!--modal for line of bussiness-->
  <div class="modal fade" id="lineModal" tabindex="-1" aria-labelledby="lineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Line Of Bussiness</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                            </tr>
                        @endforeach
                       @endif
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <!--modal for line of bussiness-->
  <div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Attachments</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Path</th>
              </tr>
            </thead>
            <tbody>
                @if ($this->attachment)
                   @foreach ($this->attachment as $attachFiles)
                    <tr class="text-center">
                      <td>{{$attachFiles->id}}</td>
                      <td>{{$attachFiles->title}}</td>
                      <td>
                        <a href="{{ Storage::url($attachFiles->file_path) }}" target="_blank" class="btn btn-primary">{{$attachFiles->file_path}}</a>
                      </td>
                    </tr>
                  @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--modal for form-->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">PDF Preview</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @if ($pdfUrl)
            <!-- Display the PDF preview -->
            <iframe src="{{ $pdfUrl }}" style="width: 100%; height: 600px;" frameborder="0"></iframe>

            <!-- Provide a download link -->
            <a href="{{ $pdfUrl }}" class="btn btn-primary" download="CustomerReport.pdf">Download PDF</a>
        @endif
      </div>
    </div>
  </div>
  <!--modal for receipt-->
  <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="receiptModalLabel">Receipt Preview</h1>
          <a href="{{route("documate.dashboard")}}" class="btn-close"></a>
        </div>
        @if ($receiptUrl)
            <!-- Display the PDF preview -->
            <iframe src="{{ $receiptUrl }}" style="width: 100%; height: 600px;" frameborder="0"></iframe>

            <!-- Provide a download link -->
            <a href="{{ $receiptUrl }}" class="btn btn-primary" download="Receipt.pdf">Download PDF</a>
        @endif
      </div>
    </div>
  </div>
</div>

@script
<script>
    $wire.$on('showlineModal', () => {
      $('#lineModal').modal('show');
    });
    $wire.$on('showAttachmentModal', () => {
      $('#attachmentModal').modal('show');
    });
    $wire.$on('showFormModal', () => {
      $('#formModal').modal('show');
    });
    $wire.$on('showReceiptModal', () => {
      $('#receiptModal').modal('show');
    });
</script>
@endscript
