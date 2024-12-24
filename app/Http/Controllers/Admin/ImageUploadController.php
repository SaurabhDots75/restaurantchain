<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImageGallery;

class ImageUploadController extends Controller
{
    public function index(Request $request) {
        // Fetch all images from the database
        $images = ImageGallery::all();

        // Pass images to the view
        return view('admin.media.media', compact('images'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Get image size in KB
            $imageSizeKB = round($image->getSize() / 1024, 2); // Size in KB
    
            // Get image dimensions (width and height)
            $dimensions = getimagesize($image);
            $imageWidth = $dimensions[0];
            $imageHeight = $dimensions[1];
    
            // Save the image
            $path = $image->store('uploads', 'public'); // Save to 'storage/app/public/uploads'
            $fullPath = asset('storage/' . $path);
    
            // Optionally use Intervention Image to manipulate or verify the image
            // $imageIntervention = Image::make($image);
            // $imageWidth = $imageIntervention->width();
            // $imageHeight = $imageIntervention->height();
    
            // Save image details to the database
            $savedImage = ImageGallery::create(['image' => $fullPath,'image_size'=>$imageSizeKB,'height'=>$imageHeight,'width'=>$imageWidth]);
    
            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully!',
                'path' => $fullPath,
                'size_kb' => $imageSizeKB,
                'width' => $imageWidth,
                'height' => $imageHeight,
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Image upload failed!',
        ]);
    }

    // Fetch all images
    public function fetchAll()
    {
        $images = ImageGallery::all();
        return response()->json($images);
    }
   

}
