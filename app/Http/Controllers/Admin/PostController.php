<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = singleStorageImageUpload($request->file('image'), 'Post', '500', '300');
        }
        if (empty($image)) {
            $input['image'] = '';
        } else {
            $input['image'] = $image;
        }
        $input['categories'] = !empty($request->categories) ? implode(",", $request->categories) : "";
        $input['faq_category'] = !empty($request->faq_category)?implode(",",$request->faq_category):"";
        $posts = Post::create($input);
        $input['posts_id'] = $posts->id;
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function edit(string $postid)
    {
        $id = base64_decode($postid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $posts = Post::find($id);
        if (empty($posts)) {
            return 'URL NOT FOUND';
        }
        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function update(Request $request, string $postid)
    {
        $id = base64_decode($postid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $posts = Post::findOrFail($id);
        if (empty($posts)) {
            return 'URL NOT FOUND';
        }
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        /*image update*/
        if ($request->hasFile('image')) {
            $input['image'] = singleStorageImageUpload($request->file('image'), 'Post', '500', '300');
            // $image = singleStorageImageUpload($request->file('image'), 'Post', '1200', '600');
        }
        if (empty($image)) {
            //$input['image'] = '';
        } else {
            $input['image'] = $image;
        }
        $input['categories'] = !empty($request->categories) ? implode(",", $request->categories) : "";
        $input['faq_category'] = !empty($request->faq_category)?implode(',',$request->faq_category):"";
        $posts->fill($input)->save();
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post Deleted Successfully');
    }

    /**
     * Status
     *
     * @param [type] $ids
     * @param [type] $status
     * @return void
     */
    public function status($ids, $status)
    {
        $ids = base64_decode($ids);
        $posts =  Post::find($ids);
        if (empty($posts)) {
            return 'URL NOT FOUND';
        }
        $input['status'] = $status;
        unset($input['_token']);
        $posts->fill($input)->save();
        return redirect()->action('Admin\PostController@index')->with('alert-success', 'Page Status Updated Successfully');
    }
}
