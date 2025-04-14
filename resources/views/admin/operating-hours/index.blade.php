@extends('admin.layouts.app')
@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Operating Hours Management</h2>
                    </div>
                </div>
            </div>
            <div class="tablescroll-tableroll">
                <form action="{{ route('admin.operating-hours.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Restaurant</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>
                                            <input type="time" class="form-control"
                                                name="restaurants[{{ $restaurant->id }}][opening_time]"
                                                value="{{ $restaurant->opening_time }}">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control"
                                                name="restaurants[{{ $restaurant->id }}][closing_time]"
                                                value="{{ $restaurant->closing_time }}">
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
