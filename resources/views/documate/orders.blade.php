<x-main-layouts>
    <x-slot name="title">
        ORDERS
    </x-slot>
    <section class=" mx-auto" style=" width:80%;">
        <h3 class="mt-3">DocuMate | ORDERS</h3>
        <div class="content">
            <!-- Search Bar -->
            <div class="mt-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by name or email" onkeyup="searchOrders()">
            </div>
        
            <!-- Status Filter -->
            <div class="mt-4">
                <select id="statusFilter" class="form-control" onchange="filterByStatus()">
                    <option value="">All Statuses</option>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        
            <!-- Applications Table -->
            <h4 class="mt-5">Current Applications</h4>
            <table class="table" id="applicationsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Attachments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="Pending">
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Pending</td>
                        <td><a href="attachment1.pdf" target="_blank">View</a></td>
                        <td>
                            <button class="btn btn-success btn-sm">Approve</button>
                            <button class="btn btn-danger btn-sm">Reject</button>
                        </td>
                    </tr>
                    <tr data-status="Approved">
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Approved</td>
                        <td><a href="attachment2.pdf" target="_blank">View</a></td>
                        <td>
                            <button class="btn btn-success btn-sm" disabled>Approve</button>
                            <button class="btn btn-danger btn-sm">Reject</button>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </section>
</x-main-layouts>