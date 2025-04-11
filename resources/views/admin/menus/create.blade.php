@extends('admin.layouts.app')

@section('content')


    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create Menu</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
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
            <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="edituserform-row">
                    <div class="form-group mb-3">
                        <label><strong>Name:</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter menu name"
                            value="{{ old('name') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Start Time:</strong></label>
                        <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>End Time:</strong></label>
                        <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Days Active:</strong></label>
                        <select name="days_active[]" class="form-control select2" multiple>
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <option value="{{ $day }}"
                                    {{ in_array($day, old('days_active', [])) ? 'selected' : '' }}>
                                    {{ $day }}
                                </option>
                            @endforeach
                        </select>
                        <small>Hold Ctrl (Windows) or Command (Mac) to select multiple days.</small>
                    </div>




                    <div class="form-group mb-3">
                        <label><strong>Image:</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Description:</strong></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                    </div>

                </div>

                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.menus.index') }}" class="view-btn">Cancel</a>
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
