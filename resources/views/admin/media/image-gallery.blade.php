@extends('admin.layouts.app')
@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection
@section('content')
<div class="dashboard-panel">
    <div class="role-management">
        <div class="pull-left">
            <h2>Media Library</h2>
        </div>
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
                    <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="drop-files-sec">
                    <div class="drop-files-seccenter">
                        <h3>Drop files to upload <span>Or</span></h3>
                        {{-- <a href="#" class="view-btn">Select Files</a> --}}
                        <input type="file" name="image" class="form-control">
                        <button type="submit" class="view-btn"><i class="fa-solid fa-upload"></i></button>
                        {{-- <p>maximum upload file size: 500 MB</p> --}}
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
                @if($images->count())
                    @foreach($images as $image)
                        <div class="dropboximg" id="image-details-custom{{$image->id}}" class="btn btn-primary" data-bs-toggle="modal"><img src="{{ asset('storage/images/'.$image->image) }}" alt="" class="img-fluid"><a id="delete-record{{$image->id}}">
                                       <div class="closeupload"><i class="fa-solid fa-xmark"></i></div></a></div>
                    @endforeach
                @endif
            </div>

            <div class="modal fade imgupload-pop" id="imageDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Attachment Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="imgupload-content">
                            <div class="imgupload-sec">
                                <img id="preview_image" style="width:50%" src="assets/img/tshirt-same.png" alt="" class="img-fluid">
                            </div>
                            <div class="imgupload-information">
                                <div class="uploadimginformation">
                                    {{-- <ul>
                                        <li><strong>uploaded on:</strong> December 2,</li>
                                        <li><strong>uploaded by:</strong> Lorem ipsum </li>
                                        <li><strong>File Name:</strong> Favicon.png,</li>
                                        <li><strong>File Type:</strong> 4kb,</li>
                                        <li><strong>Dimensions:</strong>64 by 64 pixels</li>
                                        <li><strong>Used as:</strong>Site Icon</li>
                                    </ul> --}}
                                </div>
                                {{-- <div class="uploadimage-form">
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
                                </div> --}}

                                <div class="upload-files-btn">
                                   {{-- <a href="#" class="view-btn">Download File</a>
                                     <a href="#" class="view-btn">Delete Permanently</a> --}}
                                    <a id="delete-record" class="view-btn">
                                        {{-- <i class="fa-solid fa-trash-can"></i> --}}
                                        Delete Permanently</a>
                                    <input type="hidden" name="image_id" id="image_id">
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
                        <img class="img-responsive" alt="" src="{{ asset('storage/images/'.$image->image) }}" />
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
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
        $(document).on('click', "[id^=image-details_changes]", function () {
            var index = parseInt($(this).attr("id").replace("image-details", ''));
            $('#image_id').val(index);
            var imgSrc = $(this).find('img').attr('src');
            // Set the src attribute of the #preview_image element to the imgSrc value
            $('#preview_image').attr('src', imgSrc);

            // Show the modal
            $('#imageDetailsModal').modal('show');
        });


        $(document).on('click', "[id^=delete-record]", function () {
            var index = parseInt($(this).attr("id").replace("delete-record", ''));
            // var index = $('#image_id').val();
            
            // Show a confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make an AJAX request to delete the record
                    $.ajax({
                        url: "/admin/image-gallery-delete",  // URL to your deletion endpoint
                        type: 'POST',           // HTTP method (could also be DELETE)
                        data: {
                            _method: 'DELETE',  // Spoof the DELETE method
                            id: index,          // Pass the index or record ID to the server
                            _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                        },
                        success: function(response) {
                            // return false;
                            // Handle successful deletion
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            );
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            ).then(() => {
                                // Optionally, remove the record from the UI
                                window.location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error if deletion fails
                            Swal.fire(
                                'Error!',
                                'There was an issue deleting the record.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endsection