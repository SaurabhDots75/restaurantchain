@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@endsection
@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Orders</h2>
                    </div>

                    <div class="pull-right">
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>

                    </div>
                </div>
            </div>
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession


            <div class="collapse" id="searchCollapse">
                <div class="card card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <input type="text" id="idSearch" class="form-control" placeholder="Search Order ID">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="customerSearch" class="form-control" placeholder="Search Customer">
                        </div>

                        <div class="col-md-3">
                            <select id="statusSearch" class="form-control">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button id="applyFilters" class="btn btn-primary me-2">
                                <i class="la la-search"></i> Filter
                            </button>
                            <button id="clearFilters" class="btn btn-secondary">
                                <i class="la la-close"></i> Clear
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tablescroll-tableroll">
                <table id="ordersTable" class="management-table table table-bordered">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="0">
                                <a href="javascript:void(0)" class="text-light">Order ID</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="1">
                                <a href="javascript:void(0)" class="text-light">Customer</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="2">
                                <a href="javascript:void(0)" class="text-light">Items</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="3">
                                <a href="javascript:void(0)" class="text-light">Total</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="4">
                                <a href="javascript:void(0)" class="text-light">Wallet</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="5">
                                <a href="javascript:void(0)" class="text-light">Status</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="6">
                                <a href="javascript:void(0)" class="text-light">Type</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="7">
                                <a href="javascript:void(0)" class="text-light">Source</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="8">
                                <a href="javascript:void(0)" class="text-light">Table</a>
                            </th>
                            <th class="px-4 py-2 cursor-pointer sortable" data-column="9">
                                <a href="javascript:void(0)" class="text-light">Placed At</a>
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        @php $index = 1; @endphp
                        @forelse ($orders as $order)
                            <tr class="border-b">
                                <td class="px-4 py-2">#{{ $order->id }}</td>
                                <td class="px-4 py-2">{{ $order->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    <ul class="list-disc ml-4">
                                        @if ($order->orderItems)
                                            @foreach ($order->orderItems as $item)
                                                <li>{{ $item->menuItem->name ?? 'Item' }} × {{ $item->quantity }}</li>
                                            @endforeach
                                        @else
                                            No Order Item
                                        @endif
                                    </ul>
                                </td>
                                <td class="px-4 py-2">₹{{ number_format($order->total_price, 2) }}</td>
                                <td class="px-4 py-2">₹{{ number_format($order->wallet_redeemed, 2) }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="px-2 py-1 rounded-full text-sm
                                @if ($order->status == 'pending') bg-yellow-200 text-yellow-800
                                @elseif($order->status == 'completed') bg-green-200 text-green-800
                                @elseif($order->status == 'cancelled') bg-red-200 text-red-800
                                @else bg-gray-200 text-gray-800 @endif
                            ">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ ucfirst($order->order_type) }}</td>
                                <td class="px-4 py-2">{{ ucfirst($order->source) }}</td>
                                <td class="px-4 py-2">{{ $order->table_number ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $order->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4 text-gray-500">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                @include('components.pagination', ['paginator' => $orders])


            </div>
        </div>



    </div>

@endsection
@section('custom_js_scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#ordersTable').DataTable({
                paging: false,
                ordering: true,
                searching: true, // Keep searching ENABLED for API functionality
                info: false,
                dom: 'lrtip' // Removes the default search box ('f' = filter input)
            });

            // Your existing filter code will now work
            $('#applyFilters').on('click', function() {
                let customer = $('#customerSearch').val();
                let orderid = $('#idSearch').val();
                let status = $('#statusSearch').val();

                table.column(1).search(customer);
                table.column(5).search(status);
                table.column(0).search(orderid);
                table.draw();
            });

            $('#clearFilters').on('click', function() {
                $('#customerSearch').val('');
                $('#statusSearch').val('');
                $('#idSearch').val('');
                table.columns().search('').draw();
            });
            $('.perpage_select').on('change', function() {
                var perPage = $(this).val();
                var currentUrl = window.location.href;
                var newUrl = new URL(currentUrl);
                newUrl.searchParams.set('per_page', perPage);
                window.location.href = newUrl.toString();
            });


        });
    </script>

    <script>
        $(function() {
            let sortOrder = {};

            $(".sortable").click(function() {
                const colIndex = $(this).data("column");
                const table = $(this).closest("table");
                const tbody = table.find("tbody");
                const rows = tbody.find("tr:visible").not('.expanded-row').get();

                // Toggle order
                sortOrder[colIndex] = !sortOrder[colIndex];

                rows.sort(function(a, b) {
                    const A = $(a).children("td").eq(colIndex).text().trim().toLowerCase();
                    const B = $(b).children("td").eq(colIndex).text().trim().toLowerCase();

                    if ($.isNumeric(A) && $.isNumeric(B)) {
                        return sortOrder[colIndex] ? A - B : B - A;
                    }

                    return sortOrder[colIndex] ? A.localeCompare(B) : B.localeCompare(A);
                });

                $.each(rows, function(i, row) {
                    const $row = $(row);
                    const id = $row.data("order-id");
                    const detailRow = $("#order-" + id);
                    tbody.append($row);
                    if (detailRow.length) {
                        tbody.append(detailRow);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('change', '.toggle-status', function(e) {
                e.preventDefault();

                var checkbox = $(this);
                var id = checkbox.data('id');
                var newStatus = checkbox.is(':checked') ? 1 : 0;

                checkbox.prop('checked', !newStatus);

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to ${newStatus ? 'activate' : 'deactivate'} this restaurant.`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        checkbox.prop('checked', newStatus);

                        $.ajax({
                            url: "{{ route('admin.restaurants.toggle-status') }}", // adjust route
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,
                                is_active: newStatus
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Updated!',
                                    'Restaurant status has been changed.',
                                    'success'
                                );
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                                // Revert if error
                                checkbox.prop('checked', !newStatus);
                            }
                        });
                    }
                });
            });



            $(document).on('click', "[id^=delete-recordrestaurant]", function() {
                var index = parseInt($(this).attr("id").replace("delete-recordrestaurant", ''));

                // Show a confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Make an AJAX request to delete the record
                        $.ajax({
                            url: "/admin/restaurants/destroy", // URL to your deletion endpoint
                            type: 'POST', // HTTP method (could also be DELETE)
                            data: {
                                _method: 'DELETE', // Spoof the DELETE method
                                id: index, // Pass the index or record ID to the server
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content') // CSRF token for security
                            },
                            success: function(response) {
                                // Handle successful deletion
                                Swal.fire(
                                    'Deleted!',
                                    'The record has been deleted.',
                                    'success'
                                );
                                Swal.fire(
                                    'Deleted!',
                                    'The record has been deleted.',
                                    'success'
                                ).then(() => {
                                    // Optionally, remove the record from the UI
                                    window.location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle error if deletion fails
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting the record.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
