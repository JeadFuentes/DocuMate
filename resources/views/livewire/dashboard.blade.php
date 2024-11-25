<div>
    <section style=" width:90%; margin-left: 10%">
        <h5 class="my-3">DocuMate | DASHBOARD</h3>
        <div class="content">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card mb-3 h-100">
                        <div class="card-header bg-primary text-white"><b>Total Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->totalApp}}</b></h2>
                                    <p class="card-text">Total applications processed.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-calculator"></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 h-100">
                        <div class="card-header text-white bg-warning"><b>Pending for Proccessing</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->pendingApp}}</b></h2>
                                    <p class="card-text">Applications awaiting approval.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-clock-rotate-left"></i></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb- h-100">
                        <div class="card-header text-white bg-success"><b>For Payment Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->paymentApp}}</b></h5>
                                    <p class="card-text">Successfully processed but not Payed applications.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-clock-rotate-left"></i></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <h4 class="mt-5">Pending Applications</h4>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Type of Application</th>
                        <th>Type of Bussiness</th>
                        <th>Trade Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($this->pendingApplication)
                        @foreach ($this->pendingApplication as $pendingApp)
                            <tr class="text-center">
                                <td>{{$pendingApp->id}}</td>
                                <td>{{$pendingApp->typeofapplication}}</td>
                                <td>{{$pendingApp->typeofbussiness}}</td>
                                <td>{{$pendingApp->tradename}}</td>
                                <td>{{$pendingApp->status}}</td>
                                <td>
                                    @if ($pendingApp->status == 'For Payment')
                                        <button wire:click="payApplication({{$pendingApp->id}})" type="button" class="btn btn-success btn-sm">Pay Now</button>
                                    @endif
                                    <button wire:click="deleteApplication({{$pendingApp->id}})" type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>
