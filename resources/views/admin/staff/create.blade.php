@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Staff</h2>
                </div>
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
            <form method="POST" action="{{ route('admin.staff.store') }}" id="userForm">
                @csrf

                <div class="edituserform-row">
                    <div class="form-group">
                        <strong>Name<span class="text-danger">* </span> </strong>
                        <input type="text" name="name" placeholder="Name" class="form-control"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <strong>Email<span class="text-danger">* </span> </strong>
                        <input type="email" name="email" placeholder="Email" class="form-control"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <strong>Password<span class="text-danger">* </span> </strong>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                    </div>
                    <div class="form-group">
                        <strong>Confirm Password<span class="text-danger">* </span> </strong>
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                        <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                    </div>
                    <div class="form-group">
                        <strong>Role<span class="text-danger">* </span> </strong>
                        <select name="roles[]" class="form-control" id="multiple">
                            <option disabled {{ old('roles') ? '' : 'selected' }}>Select User Role</option>
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}"
                                    {{ in_array($value, old('roles', [])) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group" id="restaurant-field">
                        <label for="restaurant_id"><strong>Restaurant<span class="text-danger">* </span></strong></label>
                        <select name="restaurant_id" id="restaurant_id" class="form-control">
                            <option value="" disabled selected>Select a Restaurant</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}"
                                    {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                    {{ $restaurant->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit" class="view-btn"> Submit</button>
                <a href="{{ route('admin.staff.index') }}" class="view-btn"> Cancel</a>
            </form>
        </div>
    </div>
@endsection
@section('custom_js_scripts')
    <script>
        $(document).ready(function() {
            $('.show-password').on('click', function(e) {
                var target = e.currentTarget;
                $(target).hasClass('show') ? hidePassword($(target)) : showPassword($(target));
            });
        });

        function hidePassword(e) {
            // Correctly find the icon within the target element (the show-password span)
            var icon = e.find('svg');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
            e.removeClass('show').addClass('hide');
            e.prev('input').attr('type', 'password');
        }

        function showPassword(e) {
            // Correctly find the icon within the target element (the show-password span)
            var icon = e.find('svg');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
            e.removeClass('hide').addClass('show');
            e.prev('input').attr('type', 'text');
        }
    </script>
@endsection
