<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'colors', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
            'category' => 'required',
            'brand' => 'required',
            'body' => 'required',
            'colors.*' => 'required|string'
        ]);

        // move image to the public dir
        $image = $request->file('image');
        $image_name = uniqid() . $image?->getClientOriginalName();
        $image->move(public_path('images'), $image_name);

        $category = Category::where('name', $request->category)->first();
        $brand = Brand::where('name', $request->brand)->first();

        $product = Product::create([
            'name' => $request->name,
            'slug' => uniqid() . Str::slug($request->name),
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'image' => $image_name,
            'price' => $request->price,
            'view_count' => 0,
            'like_count' => 0,
            'body' => $request->body,
        ]);

        $colors = [];
        foreach ($request->colors as $color_name) {
            $color_model = Color::where('name', $color_name)->first();
            $colors[] = $color_model->id;
        }

        $product->colors()->sync($colors);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
