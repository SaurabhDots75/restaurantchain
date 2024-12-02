<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageGallery;
use Illuminate\Support\Facades\File;

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
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        $input['title'] = $request->title;
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
        $getDelete = ImageGallery::find($request->deleteId)->first();
        if (File::exists(public_path('/images/'.$getDelete->image))) {
            File::delete(public_path('/images/'.$getDelete->image));
        }
        $getDelete->delete();
        return back()->with('success', 'Image removed successfully.');
    }
}
