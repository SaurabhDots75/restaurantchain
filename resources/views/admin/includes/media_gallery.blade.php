<div class="addfeaturesimg">

<div class="featuresimgtop"><img src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt="" class="addsinglefeaturesimg"></div>
    <a type="submit" id="set_featured_iamges" class="view-btn" data-bs-toggle="modal" data-bs-target="#imageModalChanges">Set Featured images</a>
</div>

<div class="modal fade featured-img" id="imageModalChanges" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Featured images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Upload Files</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Media
                            Library</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="drop-fileuploadflex">
                            <div class="drop-fileupload">
                                <input type="file" id="imageInput" name="image" />
                                <h4>Maximum upload file size: 750MB:</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="featuresimggallery">
                            <div class="featuresimgbox-sec">
                                <div id="imageGallery" class="featuresimgbox">
                                    
                                </div>
                            </div>
                            <div class="featuresimg-atachment">
                                <div class="atachment-detail">
                                    <h5>Attachment Details</h5>
                                    <div class="atachment-info">
                                        <div class="atachment-info-img"><img
                                                src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                                class="addsinglefeaturesimg"></div>
                                        <div class="atachment-info-detail">
                                            {{--<span>December 19, 2024</span>
                                            <span id="imageStorageSize">26 KB</span>
                                            <span>630 by 640 Pixele</span>
                                            <a class="attachment-editimg attachment-delete">Delete Permaentaly</a>--}}
                                        </div>
                                    </div>

                                    <div class="atachment-form">
                                        <div class="atachment-field">
                                            <label for="image_alt">Alt Text</label>
                                            <input type="text" id="image_alt" name="image_alt">
                                        </div>
                                        <div class="atachment-field">
                                            <label for="file_url">File URL:</label>
                                            <textarea class="textbox" id="file_url"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="hideFeaturedImages" class="view-btn">Set Featured Image</button>
            </div>
        </div>
    </div>
</div>

@section('custom_js_scripts')

<script>
    $(document).ready(function () {
        fetchImages();
        // Handle form submission

        $('#imageInput').on('change', function (e) {
            let formData = new FormData();
            let file = e.target.files[0]; // Get the selected file
            formData.append('image', file);

            // Send AJAX request
            $.ajax({
                url: "{{ route('admin.upload.image') }}", // Laravel route
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        fetchImages();
                        // Display the uploaded image
                        // $('#uploadedImage').html(`<img src="/storage/${response.image.image}" alt="Uploaded Image" width="200px">`);
                    } else {
                        alert(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let message = 'An error occurred';
                    // Check if the response contains a message
                    if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                        message = jqXHR.responseJSON.message;
                    } else if (errorThrown) {
                        message = errorThrown;
                    }
                    alert(message);
                }
            });
        });
        $(document).on('click','.featuresimgboxblock', function () {
            // Remove 'active' class from all divs
            $('.featuresimgboxblock').removeClass('active');
            // Add 'active' class to the clicked div
            $(this).addClass('active');
            var imgSrc = $('.featuresimgboxblock.active').find('img').attr('src');
            $('.addsinglefeaturesimg').attr('src',imgSrc);
            $('#image_id').val($(this).data('image'));
            $('#file_url').val(imgSrc);
            $('#imageStorageSize').text(imgSrc.size);
        });

        $('#hideFeaturedImages').on('click',function(){
            $('#imageModalChanges').modal('hide');
            $('#set_featured_iamges').text("Change Image");
        });

    });

    // Function to fetch and display all images
    function fetchImages() {
        $.ajax({
            url: "{{ route('admin.images.fetch') }}",
            method: "GET",
            success: function (response) {
                $('#imageGallery').empty(); // Clear the gallery
                if (response.length > 0) {
                    response.forEach(function (image) {
                        $('#imageGallery').append(`<div class="featuresimgboxblock" data-image="${image.id}"><img class="addfeaturesimg" src="${image.image}" alt="Image"></div>`);
                    });
                } else {
                    $('#imageGallery').append('<p>No images found!</p>');
                }
            },
            error: function () {
                alert('Failed to load images.');
            }
        });
    }
</script>
@endsection