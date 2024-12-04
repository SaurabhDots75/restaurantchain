<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\SlugController;
use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PostCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Listing
     *
     * @return void
     */
    public function index(Request $request)
    {
        $getData = PostCategory::latest()->paginate(10);
        return view('admin.postcategories.index', compact('getData'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Get Post Category
     *
     * @param Request $request
     * @return void
     */
    public function getPostCategory(Request $request)
    {
        $getCatId_arr = [];
        if (isset($request->id)) {
            $getPostCategoryArray = Post::find($request->id);
            $getCatId_arr = explode(",", $getPostCategoryArray->categories);
        }
        $getParentData = PostCategory::where('status', 1)->where('parent_id', 0)->get()->toArray();
        $dataArray = array();
        if (count($getParentData) > 0) {
            foreach ($getParentData as $key => $parent) {
                $dataArray[$key]['id'] = $parent['id'];
                $dataArray[$key]['name'] = $parent['name'];
                if (in_array($parent['id'], $getCatId_arr)) {
                    echo '<option selected value="' . $parent['id'] . '">' . $parent['name'] . '</option>';
                } else {
                    echo '<option value="' . $parent['id'] . '">' . $parent['name'] . '</option>';
                }
                $child = $this->getChildData($parent['id'], 0, $getCatId_arr);
                if (count($child) > 0) {
                    $dataArray[$key]['parent'] = $child;
                }
            }
        }
    }

    /**
     * Get Child data Format
     *
     * @param [type] $parent_id
     * @param [type] $level
     * @param [type] $getCatId_arr
     * @return void
     */
    public function getChildData($parent_id, $level, $getCatId_arr)
    {
        $getChildData = PostCategory::where('status', 1)->where('parent_id', $parent_id)->get()->toArray();
        $level++;
        $dataArray = array();
        if (count($getChildData) > 0) {
            foreach ($getChildData as $key => $child) {
                if (in_array($child['id'], $getCatId_arr)) {
                    echo '<option selected value="' . $child['id'] . '">' . str_repeat("-", ($level * 2)) . $child['name'] . '</option>';
                } else {
                    echo '<option value="' . $child['id'] . '">' . str_repeat("-", ($level * 2)) . $child['name'] . '</option>';
                }
                $dataArray[$key]['id'] = $child['id'];
                $dataArray[$key]['name'] = $child['name'];
                $child = $this->getChildData($child['id'], $level, $getCatId_arr);
                if (count($child) > 0) {
                    $dataArray[$key]['parent'] = $child;
                }
            }
        }
        return $dataArray;
    }

    /**
     * Create Form Show
     *
     * @param [type] $catId
     * @return void
     */
    public function createForm($catId = null)
    {
        $getData = '';
        if (!is_null($catId)) {
            $getData = PostCategory::where('slug', $catId)->first();
        }
        return view('admin.postcategories.create', compact('getData'));
    }

    /**
     * Add Form Data
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request)
    {
        // Validate request data
        $this->validateRequest($request);
        // Handle image upload
        $image = $this->handleImageUpload($request);
        // Handle parent ID and slug generation
        $request->parent_id = $this->determineParentId($request);
        $newCustomSlug = $this->generateSlug($request);
        // Save or update the category
        $this->saveOrUpdateCategory($request, $newCustomSlug, $image);
        return redirect()->back()->with('success', $request->table_id ? 'Successfully updated!!!' : 'Successfully added!!!');
    }

    /**
     * Validate Request
     *
     * @param Request $request
     * @return void
     */
    private function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            Redirect::back()->withErrors($validator->errors())->withInput()->send();
            exit;
        }
    }

    /**
     * Handle Image Upload
     *
     * @param Request $request
     * @return void
     */
    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $uploadPath = public_path('storage/categories');
            $imagePrefix = 'category_' . rand(0, 999999999) . '_' . date('d_m_Y_h_i_s');
            $ext = $request->file('image')->getClientOriginalExtension();
            $image = $imagePrefix . '.' . $ext;
            $request->file('image')->move($uploadPath, $image);
            return $image;
        }
        return $request->image_url_bk;
    }

    /**
     * Determine Parent Id
     *
     * @param Request $request
     * @return void
     */
    private function determineParentId(Request $request)
    {
        if (!isset($request->table_id) || empty($request->table_id)) {
            return 0;
        }
        if ($request->table_id == $request->parent_id || empty($request->parent_id)) {
            return 0;
        }
        return $request->parent_id;
    }

    /**
     * Generate Slug
     *
     * @param Request $request
     * @return void
     */
    private function generateSlug(Request $request)
    {
        $slugController = new SlugController();
        if (isset($request->table_id) && $request->slug_bk != $request->slug) {
            return $slugController->makeNewSlugName('PostCategory', $request->name, $request->slug);
        }
        return $slugController->makeNewSlugName('PostCategory', $request->name, $request->slug);
    }

    /**
     * Save Update Category
     *
     * @param Request $request
     * @param [type] $slug
     * @param [type] $image
     * @return void
     */
    private function saveOrUpdateCategory(Request $request, $slug, $image)
    {
        PostCategory::updateOrCreate(['id' => $request->table_id], [
            'name' => $request->name,
            'slug' => strtolower($slug),
            'status' => $request->status ?? 0,
            'parent_id' => $request->parent_id ?? 0,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'image_url' => $image,
        ]);
    }

    /**
     * Status change
     *
     * @param Request $request
     * @return void
     */
    public function status(Request $request)
    {
        $statusChange = PostCategory::findOrFail($request->id);
        if ($statusChange) {
            $statusChange->update([
                'status' => $request->status,
            ]);
            return response()->json($statusChange);
        }
        return response()->json(['error' => 'geterror'], 422);
    }

    /**
     * Delete Functions
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $post = PostCategory::find($request->id)->delete();
        return response()->json($post);
    }

    /**
     * Get Post Category Tree
     *
     * @param integer $parent_id
     * @param string $spacing
     * @param array $tree_array
     * @return void
     */
    function getPostCategoryTree($parent_id = 0, $spacing = '', $tree_array = array())
    {
        $postcategories = PostCategory::select('id', 'name', 'parent_id')->where('parent_id', '=', $parent_id)->orderBy('parent_id')->get();
        foreach ($postcategories as $item) {
            $tree_array[] = ['categoryId' => $item->id, 'categoryName' => $spacing . $item->name];
            $tree_array = $this->getPostChildData($item->id, $spacing . '--', $tree_array);
        }
        return $tree_array;
    }

    /**
     * Get Post Child Data
     *
     * @param [type] $parent_id
     * @param [type] $level
     * @param [type] $getCatId_arr
     * @return void
     */
    public function getPostChildData($parent_id, $level, $getCatId_arr)
    {
        $getChildData = PostCategory::where('status', 1)->where('parent_id', $parent_id)->get()->toArray();
        $level++;
        $dataArray = array();
        if (count($getChildData) > 0) {
            foreach ($getChildData as $key => $child) {
                if (in_array($child['id'], $getCatId_arr)) {
                    echo '<option selected value="' . $child['id'] . '">' . str_repeat("-", ($level * 2)) . $child['name'] . '</option>';
                } else {
                    echo '<option value="' . $child['id'] . '">' . str_repeat("-", ($level * 2)) . $child['name'] . '</option>';
                }
                $dataArray[$key]['id'] = $child['id'];
                $dataArray[$key]['name'] = $child['name'];

                $child = $this->getChildData($child['id'], $level, $getCatId_arr);
                if (count($child) > 0) {
                    $dataArray[$key]['parent'] = $child;
                }
            }
        }
        return $dataArray;
    }
}
