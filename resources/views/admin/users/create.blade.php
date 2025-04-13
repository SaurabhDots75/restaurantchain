@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New User</h2>
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
            <form method="POST" action="{{ route('admin.users.store') }}" id="userForm" enctype="multipart/form-data">
                @csrf
            
                <div class="edituserform-row">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>
            
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                    </div>
            
                
            
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="{{ old('phone') }}">
                    </div>
            
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control" id="multiple">
                            <option disabled {{ old('roles') ? '' : 'selected' }}>Select User Role</option>
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ in_array($value, old('roles', [])) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group">
                        <strong>Address:</strong>
                        <textarea name="address" placeholder="Address" class="form-control">{{ old('address') }}</textarea>
                    </div>
            
                    <div class="form-group">
                        <strong>Profile Image:</strong>
                        <input type="file" name="profile_image" class="form-control" accept="image/*">
                    </div>
            
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                    </div>
            
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                        <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                    </div>
                    <div class="form-group" id="restaurant-field" style="display: none;">
                        <label for="restaurant_id"><strong>Restaurant</strong></label>
                        <select name="restaurant_id" id="restaurant_id" class="form-control">
                            <option value="" disabled selected>Select a Restaurant</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                    {{ $restaurant->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                  
            
                   
                </div>
            
                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.users.index') }}" class="view-btn">Cancel</a>
            </form>
            
        </div>
    </div>
@endsection
@section('custom_js_scripts')
    <script>
        $(document).ready(function() {
            function toggleRestaurantDropdown() {
                const selectedRoles = $('#multiple').val();
                if (selectedRoles && (selectedRoles.includes('Restaurant') || selectedRoles.includes('Kitchen'))) {
                    $('#restaurant-field').show();
                } else {
                    $('#restaurant-field').hide();
                    $('#restaurant_id').val('');
                }
            }

            toggleRestaurantDropdown();

            $('#multiple').on('change', function() {
                toggleRestaurantDropdown();
            });

        });
    </script>


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
