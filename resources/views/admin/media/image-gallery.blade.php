@extends('admin.layouts.app')
@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="pull-left"><h2>Media Library</h2></div>
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
                <div class="drop-files-sec">
                    <div class="drop-files-seccenter">
                        <h3>Drop files to upload <span>Or</span></h3>
                        <a href="#" class="view-btn">Select Files</a>
                        <p>maximum upload file size: 500 MB</p>
                    </div>
                </div>
                {{--<div class="col-md-6">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-6">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                </div>

                    <button type="submit" class="view-btn">Upload</button>--}}
        </form>

        <div class="drop-images-files">
                    <div class="dropboximg" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                    <div class="dropboximg"><img src="assets/img/tshirt-same.png" alt="" class="img-fluid"></div>
                </div>

<div class="modal fade imgupload-pop" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attachment Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="imgupload-content">
        <div class="imgupload-sec">
            <img src="assets/img/tshirt-same.png" alt="" class="img-fluid">
        </div>
      <div class="imgupload-information">
        <div class="uploadimginformation">
            <ul>
                <li><strong>uploaded on:</strong> December 2,</li>
                <li><strong>uploaded by:</strong> Lorem ipsum    </li>
                <li><strong>File Name:</strong> Favicon.png,</li>
                <li><strong>File Type:</strong> 4kb,</li>
                <li><strong>Dimensions:</strong>64 by 64 pixels</li>
                <li><strong>Used as:</strong>Site Icon</li>
            </ul>
        </div>
             <div class="uploadimage-form">
                    <div class="image-form-filed">
                        <label>Alternative Text</label>
                        <textarea class="textbox" placeholder="Alternative Text"></textarea>
                        <p>Learn how to describe the purpose of the image<span>Leave empty if the image is purely decorative</span></p>
                    </div>

                    <div class="image-form-filed">
                        <label>Title</label>
                        <input class="textbox" placeholder="Alternative Text">
                    </div>

                    <div class="image-form-filed">
                        <label>Caption</label>
                        <textarea class="textbox" placeholder="Caption"></textarea>
                    </div>

                    <div class="image-form-filed">
                        <label>Description</label>
                        <textarea class="textbox" placeholder="Caption"></textarea>
                    </div>

                    <div class="image-form-filed">
                        <label>File URL:</label>
                        <input class="textbox" placeholder="File URL" desabled>
                    </div>
                    <a href="#" class="view-btn"> Copy URL to Clipboard </a>
             </div>

             <div class="upload-files-btn">
                    <a href="#" class="view-btn">Download File</a>
                    <a href="#" class="view-btn">Delete Permanently</a>
            </div>
       </div>
      </div>
    </div>
  </div>
</div>
   {{-- <div class="row">
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
    </div>--}}
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