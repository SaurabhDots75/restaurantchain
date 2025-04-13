@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        @if (Auth::user()->hasRole('Restaurant'))
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Orders {{ $totalOrder ?? '' }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.orders.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Pending Orders {{ $totalPendingOrder ?? '' }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="{{ route('admin.orders.index') }}?status=pending">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Completed Orders {{ $totalCompletedOrder ?? '' }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="{{ route('admin.orders.index') }}?status=completed">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Recent Orders
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Placed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $order)
                                <tr>
                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                    <td>
                                        @foreach ($order->orderItems as $item)
                                            <div>{{ $item->menuItem->name ?? 'Item' }} × {{ $item->quantity }}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span
                                            class="badge 
                                        @if ($order->status == 'completed') bg-success
                                        @elseif($order->status == 'pending') bg-warning
                                        @else bg-danger @endif
                                    ">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>₹{{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if (Auth::user()->hasRole('Super Admin'))
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="h4 mb-0">{{ $totalUser ?? 0 }}</div>
                                    <div class="small">Total Users</div>
                                </div>
                                <div class="text-white-50"><i class="fas fa-users fa-2x"></i></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.users.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="h4 mb-0">{{ $totalOrders ?? 0 }}</div>
                                    <div class="small">Total Orders</div>
                                </div>
                                <div class="text-white-50"><i class="fas fa-shopping-cart fa-2x"></i></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.orders.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="h4 mb-0">{{ $totalResturants ?? 0 }}</div>
                                    <div class="small">Active Restaurants</div>
                                </div>
                                <div class="text-white-50"><i class="fas fa-store fa-2x"></i></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.restaurants.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="h4 mb-0">₹{{ number_format($totalRevenue ?? 0, 2) }}</div>
                                    <div class="small">Total Revenue</div>
                                </div>
                                <div class="text-white-50"><i class="fas fa-rupee-sign fa-2x"></i></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.orders.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-chart-area me-1"></i> Sales Analytics</div>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary active" data-period="daily">Daily</button>
                                <button type="button" class="btn btn-outline-secondary" data-period="weekly">Weekly</button>
                                <button type="button" class="btn btn-outline-secondary" data-period="monthly">Monthly</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0">{{ $todaySales ?? 0 }}</div>
                                    <div class="small text-muted">Today's Sales</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0">{{ $weekSales ?? 0 }}</div>
                                    <div class="small text-muted">This Week</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0">{{ $monthSales ?? 0 }}</div>
                                    <div class="small text-muted">This Month</div>
                                </div>
                            </div>
                            <canvas id="salesChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-chart-pie me-1"></i> Order Statistics</div>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary active">Today</button>
                                <button type="button" class="btn btn-outline-secondary">Week</button>
                                <button type="button" class="btn btn-outline-secondary">Month</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0 text-success">{{ $completedOrders ?? 0 }}</div>
                                    <div class="small text-muted">Completed</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0 text-warning">{{ $pendingOrders ?? 0 }}</div>
                                    <div class="small text-muted">Pending</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="h5 mb-0 text-danger">{{ $cancelledOrders ?? 0 }}</div>
                                    <div class="small text-muted">Cancelled</div>
                                </div>
                            </div>
                            <canvas id="orderStatsChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-store me-1"></i> Top Performing Restaurants
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Restaurant</th>
                                            <th>Orders</th>
                                            <th>Revenue</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topRestaurants ?? [] as $restaurant)
                                        <tr>
                                            <td>{{ $restaurant->name }}</td>
                                            <td>{{ $restaurant->orders_count }}</td>
                                            <td>₹{{ number_format($restaurant->revenue, 2) }}</td>
                                            <td>
                                                <div class="text-warning">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $restaurant->rating)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-map-marker-alt me-1"></i> Active Restaurant Locations
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>Restaurants</th>
                                            <th>Status</th>
                                            <th>Orders Today</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($restaurantLocations ?? [] as $location)
                                        <tr>
                                            <td>{{ $location->area }}</td>
                                            <td>{{ $location->restaurant_count }}</td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>{{ $location->orders_today }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Recent Orders
                </div>
                <div class="card-body">
                 
                </div>
            </div>
        @endif
    </div>
@endsection
@section('pusher-header')
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('1e022d634116f720862f', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            console.log("Event received:", data);

            toastr.info(data.message);
        });
    </script>
@endsection
