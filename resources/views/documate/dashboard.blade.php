<x-main-layouts>
    <x-slot name="title">
        DASHBOARD
    </x-slot>
    <section class=" mx-auto" style=" width:80%;">
        <h3 class="mt-3">DocuMate | DASHBOARD</h3>
        <div class="content">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Applications</div>
                        <div class="card-body">
                            <h5 class="card-title">150</h5>
                            <p class="card-text">Total applications processed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Pending Applications</div>
                        <div class="card-body">
                            <h5 class="card-title">25</h5>
                            <p class="card-text">Applications awaiting approval.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Completed Applications</div>
                        <div class="card-body">
                            <h5 class="card-title">125</h5>
                            <p class="card-text">Successfully processed applications.</p>
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
</x-main-layouts>