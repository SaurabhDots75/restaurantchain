@extends('admin.layouts.app')

@section('content')
    @php
        $model = 'admin.acl';
    @endphp

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Edit {{ Config('constants.ACL.ACL_TITLE') }}</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.acl.index') }}"
                                    class="text-muted">{{ Config('constants.ACL.ACL_TITLE') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.acl.update', $acl->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $acl->title) }}">
                    </div>

                    <div class="mb-3">
                        <label>Route</label>
                        <input type="text" name="route" class="form-control" value="{{ old('route', $acl->route) }}"
                            placeholder="e.g., users.index">
                        @error('route')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', $acl->icon) }}"
                            placeholder="e.g., fa fa-user">
                    </div>

                    <div class="mb-3">
                        <label>Parent Module</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">None (Top Level)</option>
                            @foreach ($parent_list as $parent)
                                <option value="{{ $parent->id }}"
                                    {{ old('parent_id', $acl->parent_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Order <span class="text-danger">*</span></label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $acl->order) }}">
                        @error('order')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Is Active?</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', $acl->is_active) == '1' ? 'selected' : '' }}>Yes
                            </option>
                            <option value="0" {{ old('is_active', $acl->is_active) == '0' ? 'selected' : '' }}>No
                            </option>
                        </select>
                    </div>

                    <hr>
                    <h4>Permissions</h4>

                    <div id="permissions-container">
                        @foreach ($acl->permissions as $index => $permission)
                            <div class="row mb-2 permission-row">
                                <div class="col-md-5">
                                    <input type="text" name="permissions[{{ $index }}][name]"
                                        class="form-control"
                                        value="{{ old('permissions.' . $index . '.name', $permission->name) }}"
                                        placeholder="Permission Name (e.g. user-list)">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="permissions[{{ $index }}][function_name]"
                                        class="form-control"
                                        value="{{ old('permissions.' . $index . '.function_name', $permission->function_name) }}"
                                        placeholder="Function Name (e.g. index)">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-permission">-</button>
                                </div>
                            </div>
                        @endforeach

                        <!-- Add new permission template -->
                        <div class="row mb-2 permission-row d-none" id="permission-template">
                            <div class="col-md-5">
                                <input type="text" name="permissions[_INDEX_][name]" class="form-control"
                                    placeholder="Permission Name">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="permissions[_INDEX_][function_name]" class="form-control"
                                    placeholder="Function Name">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-permission">-</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success add-permission">+ Add Permission</button>
                    <br><br>

                    <button type="submit" class="btn btn-primary">Update Module</button>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript for dynamic permission fields --}}
    <script>
        let permissionIndex =
        {{ count($acl->permissions) }}; // Initialize the permission index based on current number of permissions

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('add-permission')) {
                e.preventDefault();

                const container = document.getElementById('permissions-container');
                const row = document.createElement('div');
                row.classList.add('row', 'mb-2', 'permission-row');
                row.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="permissions[${permissionIndex}][name]" class="form-control" placeholder="Permission Name">
                </div>
                <div class="col-md-5">
                    <input type="text" name="permissions[${permissionIndex}][function_name]" class="form-control" placeholder="Function Name">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-permission">-</button>
                </div>
            `;
                container.appendChild(row);
                permissionIndex++;
            }

            if (e.target && e.target.classList.contains('remove-permission')) {
                e.preventDefault();
                e.target.closest('.permission-row').remove();
            }
        });
    </script>

@stop
