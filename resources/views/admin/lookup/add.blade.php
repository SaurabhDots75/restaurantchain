@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ 'Add New '}} {{ str_replace("-", " ", ucfirst($type)) }}</h2>
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
			<form action="{{ route('admin.lookup.store', $type) }}" method="post">
                @csrf
                <div class="edituserform-row">
					<div class="form-group">
						<label for="code">Code</label><span class="text-danger"> * </span>
						<input type="text" name="code" class="form-control form-control-solid form-control-lg" value="{{ old('code') }}">
					</div>
                </div>

                <button type="submit" class="view-btn">Submit</button>
				<a href="{{ route('admin.lookup.index', $type) }}" class="view-btn">Cancel</a>

            </form>
        </div>
    </div>
@endsection
