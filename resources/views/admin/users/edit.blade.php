@extends('admin.layouts.app')

@section('content')



    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2>Edit User</h2>
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
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="edituserform-row">
                    <!-- Name -->
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control"
                            value="{{ old('name', $user->name) }}">
                    </div>
            
                    <!-- Email -->
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" placeholder="Email" class="form-control"
                            value="{{ old('email', $user->email) }}">
                    </div>
            
                    <!-- Phone -->
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control"
                            value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control" id="multiple">
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Address -->
                    <div class="form-group">
                        <strong>Address:</strong>
                        <textarea name="address" placeholder="Address" class="form-control">{{ old('address', $user->address) }}</textarea>
                    </div>
            
                    <!-- Profile Image -->
                    <div class="form-group">
                        <strong>Profile Image:</strong>
                        <input type="file" name="profile_image" class="form-control" accept="image/*">
                    
                        @if ($user->profile_image)
                            <a href="{{ Storage::url($user->profile_image) }}" data-fancybox="gallery" data-caption="Profile Image">
                                <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" width="100" style="cursor: pointer;">
                            </a>
                        @endif
                    </div>
            
                    <!-- Role -->
                
            
                    <!-- Restaurant Field (conditionally displayed) -->
                    <div class="form-group" id="restaurant-field" style="display: {{ old('restaurant_id', $user->restaurant_id) ? 'block' : 'none' }};">
                        <label for="restaurant_id"><strong>Restaurant</strong></label>
                        <select name="restaurant_id" id="restaurant_id" class="form-control">
                            <option value="" disabled selected>Select a Restaurant</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" 
                                    {{ old('restaurant_id', $user->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                    {{ $restaurant->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                </div>
            
                <div class="btnsubmit">
                    <button type="submit" class="view-btn">Submit</button>
                    <a href="{{ route('admin.users.index') }}" class="view-btn">Cancel</a>
                </div>
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
            $("span.select2-selection__clear").remove();
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
