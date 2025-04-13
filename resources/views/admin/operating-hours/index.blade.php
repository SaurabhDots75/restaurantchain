@extends('admin.layouts.app')

@section('title', 'Operating Hours Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Operating Hours Management</h4>
                </div>
                <div class="card-body">
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
                                    @foreach($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>
                                            <input type="time" 
                                                   class="form-control" 
                                                   name="restaurants[{{ $restaurant->id }}][opening_time]" 
                                                   value="{{ $restaurant->opening_time }}">
                                        </td>
                                        <td>
                                            <input type="time" 
                                                   class="form-control" 
                                                   name="restaurants[{{ $restaurant->id }}][closing_time]" 
                                                   value="{{ $restaurant->closing_time }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Operating Hours</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection