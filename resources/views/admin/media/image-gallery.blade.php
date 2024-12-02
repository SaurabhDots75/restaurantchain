@extends('admin.layouts.app')
@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="pull-left"><h2>Image Gallery</h2></div>
    <div class="form-setting crud-image">
        <form action="{{ route('admin.image-gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
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
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-5">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-2">
                    <br />
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
        </div>
        </form>
    <div class="row">
        <div class='list-group gallery'>
            @if($images->count())
            @foreach($images as $image)
            <div class='update-img'>
                <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                    <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                    <div class='uploadheading'>
                        <small>{{ $image->title }}</small>
                    </div>
                </a>
            </div>
            <form method="POST" action="{{ route('admin.image-gallery-delete') }}" style="display:inline">
                @csrf
                @method('DELETE')
                <input type="hidden" name="deleteId" value="{{$image->id}}">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i>Delete</button>
            </form>
            @endforeach
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('custom_js_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
@endsection