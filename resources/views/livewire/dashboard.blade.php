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
                        <div class="card-header text-white bg-warning"><b>Pending Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>25</b></h2>
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
                        <div class="card-header text-white bg-success"><b>Completed Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>125</b></h5>
                                    <p class="card-text">Successfully processed applications.</p>
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
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Pending</td>
                    </tr>
                </tbody>
            </table>
    
            <h4 class="mt-5">Completed Applications</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Alice Brown</td>
                        <td>alice@example.com</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bob White</td>
                        <td>bob@example.com</td>
                        <td>Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
