@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    {{-- Sales Overview --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-success fs-3">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <div class="text-muted">Today’s Sales</div>
                        <div class="fs-5 fw-semibold">${{ $total_sales_today }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-info fs-3">
                        <i class="fas fa-calendar-week"></i>
                    </div>
                    <div>
                        <div class="text-muted">This Week’s Sales</div>
                        <div class="fs-5 fw-semibold">${{ $total_sales_week }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-warning fs-3">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <div class="text-muted">This Month’s Sales</div>
                        <div class="fs-5 fw-semibold">${{ $total_sales_month }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Status Summary --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-secondary fs-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="text-muted">Pending Orders</div>
                        <div class="fs-5 fw-semibold">{{ $pending_orders }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-primary fs-3">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div>
                        <div class="text-muted">In Progress Orders</div>
                        <div class="fs-5 fw-semibold">{{ $inprogress_orders ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-dark fs-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="text-muted">Completed Orders</div>
                        <div class="fs-5 fw-semibold">{{ $completed_orders ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Type Summary --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-success fs-3">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div>
                        <div class="text-muted">Dine-in Orders</div>
                        <div class="fs-5 fw-semibold">{{ $dine_in_orders ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-danger fs-3">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <div>
                        <div class="text-muted">Delivery Orders</div>
                        <div class="fs-5 fw-semibold">{{ $delivery_orders ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-warning fs-3">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div>
                        <div class="text-muted">Pickup Orders</div>
                        <div class="fs-5 fw-semibold">{{ $pickup_orders ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-semibold">
                    <i class="fas fa-receipt me-2"></i>Recent Orders
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Order::latest()->take(5)->get() as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
