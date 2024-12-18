<x-main-layouts>
    <x-slot name="title">
        HOME
    </x-slot>
    <section class=" mx-auto" style=" width:100%;">
        <h5 class="my-3 mx-5">DocuMate | HOME</h3>
        <div class="hero" id="home" style="position: relative; background-image: url('{{'/storage/images/hero.jpg'}}'); background-size: cover; background-position: top; color: white; padding: 100px 20px;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
            <div style="position: relative; z-index: 1;">
                <h1>Streamlined Business Permit Processing</h1>
                <p>Get your business permit quickly and easily, all online!</p>
                <a href="{{route('documate.newapp')}}" class="btn btn-primary btn-lg py-4 px-3">Start Your Application</a>
            </div>
        </div>
        <div class="container mt-2" id="services">
            <h1 class="text-center"><b>About Our Services</b></h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-passport"></i></h3>
                            <h5 class="card-title">Online Application</h5>
                            <p class="card-text">Submit your business permit application in minutes.</p>
                            <a href="{{route('documate.newapp')}}" class="btn btn-link">Click Here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-file-circle-check"></i></h1>
                            <h5 class="card-title">Document Requirements</h5>
                            <p class="card-text">List all documents to ensure a smooth approval process.</p>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#requirementModal">
                                View
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-cloud-arrow-down"></i></h1>
                            <h5 class="card-title">Downloadables</h5>
                            <p class="card-text">Download Requirements for your Permit Application</p>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#downloadModal">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
  <!-- Modal -->
  <div class="modal fade" id="requirementModal" tabindex="-1" aria-labelledby="requirementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="requirementModalLabel">Business Permit Requirements</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ol>
                <li>2x2 ID Picture (New)</li>
                <li>Picture of Establishment(printed in Bond paper) (New)</li>
                <li>Occupancy Permit (Occupants/Lesses)(New)</li>
                <li>DTI (SEC/CDA) Registration</li>
                <li>2024 CEDULA</li>
                <li>Brgy. Clearance</li>
                <li>Brgy. Inspection Report</li>
                <li>Building Permit (Bldg. Owner/Lessor)</li>
                <li>BIR (Cert. of Registration)</li>
            </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Downloads-->
  <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="downloadModalLabel">Downloadables</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul>
                <li><a href="{{ Storage::url('requirements/CERTIFICATIONclearance.pdf') }}" target="_blank">CERTIFICATION Clearance</a></li>
                <li><a href="{{ Storage::url('requirements/SWORNSTATEMENT.pdf') }}" target="_blank">SWORN STATEMENT</a></li>
                <li><a href="{{ Storage::url('requirements/BUSINESSPERMITRREQUIREMENTS.docx') }}" target="_blank">BUSINESS PERMIT RREQUIREMENTS</a></li>
                <li><a href="{{ Storage::url('requirements/CTCFORM.docx') }}" target="_blank">CTC FORM</a></li>
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</x-main-layouts>