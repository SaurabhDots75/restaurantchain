@extends('admin.layouts.app')
@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Service Type Management</h2>
                    </div>
               
                </div>
            </div>

            <div class="tablescroll-tableroll">
                <form action="{{ route('admin.service-type.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Restaurant</th>
                                    <th>Dine-in</th>
                                    <th>Pickup</th>
                                    <th>Delivery</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->name }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" 
                                                   class="form-check-input" 
                                                   name="service_types[{{ $restaurant->id }}][]" 
                                                   value="dine_in"
                                                   {{ $restaurant->dine_in_enabled ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" 
                                                   class="form-check-input" 
                                                   name="service_types[{{ $restaurant->id }}][]" 
                                                   value="pickup"
                                                   {{ $restaurant->pickup_enabled ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" 
                                                   class="form-check-input" 
                                                   name="service_types[{{ $restaurant->id }}][]" 
                                                   value="delivery"
                                                   {{ $restaurant->delivery_enabled ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Service Types</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
