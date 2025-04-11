@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Edit Menu</h2>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="edituserform">
        <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="edituserform-row">
                <!-- Menu Name -->
                <div class="form-group mb-3">
                    <label><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter menu name" value="{{ old('name', $menu->name) }}">
                </div>

                <!-- Start Time -->
                <div class="form-group mb-3">
                    <label><strong>Start Time:</strong></label>
                    <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $menu->start_time ? \Carbon\Carbon::parse($menu->start_time)->format('H:i') : '') }}">
                </div>
                
                <div class="form-group mb-3">
                    <label><strong>End Time:</strong></label>
                    <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $menu->end_time ? \Carbon\Carbon::parse($menu->end_time)->format('H:i') : '') }}">
                </div>
                

                <!-- Days Active -->
                <div class="form-group mb-3">
                    <label><strong>Days Active:</strong></label>
                    <select name="days_active[]" class="form-control select2" multiple>
                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                            <option value="{{ $day }}" 
                                {{ in_array($day, json_decode($menu->days_active)) ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                    <small>Hold Ctrl (Windows) or Command (Mac) to select multiple days.</small>
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-3">
                    <label><strong>Image:</strong></label>
                    <input type="file" name="image" class="form-control">
                    @if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image" width="100">
                    @endif
                </div>

                <!-- Description -->
                <div class="form-group mb-3">
                    <label><strong>Description:</strong></label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description', $menu->description) }}</textarea>
                </div>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="btnsubmit">
                <button type="submit" class="view-btn">Update</button>
                <a href="{{ route('admin.menus.index') }}" class="view-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('custom_js_scripts')
<script>
   $(document).ready(function() {
       $('.select2').select2({
           placeholder: "Select days", // Placeholder text
           allowClear: true // Option to clear the selection
       });
   });
</script>
@endsection