@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel edit-rolecheckbox">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Role</h2>
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

        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control"
                            value="{{ $role->name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h3>Permissions:</h3>
                        <div class="accordion" id="permissionsAccordion">
                            @foreach ($permissions as $group => $perms)
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="heading-{{ $group }}">
                                        <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $group }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse-{{ $group }}">
                                            {{ $group }} Permissions
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $group }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="heading-{{ $group }}"
                                        data-bs-parent="#permissionsAccordion">
                                        <div class="accordion-body">
                                            @foreach ($perms as $permission)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="permission[{{ $permission->id }}]"
                                                        value="{{ $permission->id }}" id="perm-{{ $permission->id }}"
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="perm-{{ $permission->id }}">
                                                        {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mt">
                    <button type="submit" class="view-btn">Submit</button>
                    <a href="{{ route('admin.roles.index') }}" class="view-btn"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
