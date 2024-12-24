<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\SlugController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10);

        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'long_description' => 'required|string',
        ],[
            'name.required' => 'The Name is mandatory.',
            'name.max' => 'The Name may not be greater than 255 characters.',
            'slug.required' => 'The Slug may not be greater than 255 characters.',
            'long_description.required' => 'The Description is mandatory.',
        ]);

        // Generate or use the custom slug
        if (empty($request->table_id)) {
            $newCustomSlug = generateSlug('Product', $request); // Pass the $request object
        } else {
            $newCustomSlug = $validatedData['slug'] ?? '';
        }

        // Set the slug in lowercase
        $validatedData['slug'] = strtolower($newCustomSlug);

        // Create the product using validated data
        $getLastProductId = Product::create($validatedData);

        if(isset($request->image_id) && !empty($request->image_id)){
            ProductImage::create(['product_id'=> $getLastProductId->id,'image_id'=> $request->image_id, 'image_alt'=> $request->image_alt]);
        }
        
        // Redirect to the products index with a success message
        return redirect()
            ->route('admin.product-pages.index')
            ->with('success', 'Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($productId): View
    {
        $product = Product::where('id',$productId)->first();
        return view('admin.products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $product = Product::where('id',$id)->first();
        return view('admin.products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'long_description' => 'required|string',
        ],[
            'name.required' => 'The Name is mandatory.',
            'name.max' => 'The Name may not be greater than 255 characters.',
            'slug.required' => 'The Slug may not be greater than 255 characters.',
            'long_description.required' => 'The Description is mandatory.',
        ]);

        // Generate or use the custom slug
        $newCustomSlug = generateSlug('Product', $request); // Pass the $request object
        
        // Set the slug in lowercase
        $validatedData['slug'] = strtolower($newCustomSlug);
        
        $product = Product::findOrFail($request->table_id);
        $product->update($validatedData);
    
        return redirect()->route('admin.product-pages.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        $record = Product::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
}
