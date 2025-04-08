<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageGallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::get();
        return view('admin.media.image-gallery', compact('images'));
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ], [
            'image.required' => 'The image is mandatory.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
        // Store the image in the 'public' disk (which points to 'storage/app/public')
        $imagePath = $request->file('image')->storeAs('images', $input['image'], 'public');
        // Store the path in the database (if needed)
        $input['image_path'] = $imagePath;
        ImageGallery::create($input);
        return redirect()->route('admin.image-gallery')->with('success', 'Image Uploaded successfully.');
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        // Perform deletion logic, e.g., delete from database
        $record = ImageGallery::find($recordId);

        $imagePath = 'images/' . $record->image;

        // Check if the file exists and delete it
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
}
