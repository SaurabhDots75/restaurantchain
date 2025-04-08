@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2>AJAX Image Upload</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload Image</button>

    <div id="uploadedImages" class="mt-3">
        <h4>Uploaded Images:</h4>
        <div id="imageList"></div>
    </div>
</div>


<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="imageUploadForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<h1>Image Gallery</h1>
<div class="image-gallery">
    @forelse($images as $image)
        <img src="{{ $image->image }}" alt="shown media">
    @empty
        <p>No images found!</p>
    @endforelse
</div>


{{-- <div class="container mt-5">
    <h2>Image Upload</h2>
    <form id="imageUploadForm">
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div id="imagePreview" class="mt-3">
        <h4>Uploaded Image:</h4>
        <img id="uploadedImage" src="#" alt="Uploaded media files" style="max-width: 100%; display: none;">
    </div>
</div> --}}
@endsection

@section('custom_js_scripts')

<script>
    $(document).ready(function () {
        // Handle form submission
        $('#imageUploadForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.upload.image') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#imageList').append(
                            `<img src="${response.path}" alt="Uploaded Image" style="max-width: 100px; margin-right: 10px;">`
                        );
                        $('#uploadModal').modal('hide');
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    alert(errors.image[0]);
                },
            });
        });
    });
</script>
@endsection