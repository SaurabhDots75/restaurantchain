@extends('admin.layouts.app')
@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style type="text/css">
        .gallery
        {
            display: inline-block;
            margin-top: 20px;
        }
        .close-icon{
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <h3>Laravel - Image Gallery CRUD Example</h3>
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
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                    <img class="img-responsive" style="width: 50px;height:50px;" alt="" src="/images/{{ $image->image }}" />
                    <div class='text-center'>
                        <small class='text-muted'>{{ $image->title }}</small>
                    </div> <!-- text-center / end -->
                </a>
                <form method="POST" action="{{ route('admin.image-gallery-delete') }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="deleteId" value="{{$image->id}}">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i>Delete</button>
                </form>
                <!-- <form action="{{ route('admin.image-gallery',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                </form> -->
            </div> <!-- col-6 / end -->
            @endforeach
            @endif
        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
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