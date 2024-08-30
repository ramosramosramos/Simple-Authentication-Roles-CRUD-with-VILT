<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController
{

    public function index()
    {
        // Retrieve the paginated results
        $products = Product::query()->latest()
            ->withoutTrashed()
            ->where('user_id', request()->user()->id)
            ->paginate(24, [
                'id',
                'name',
                'type',
                'price',
                'description',
                'image'
            ]);
        $products->getCollection()->transform(function ($product) {
            $product->image = Storage::url($product->image) ?? null;
            return $product;
        });



        return inertia('User/Product', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('User/ProductForm/Create');
    }


    public function store(StoreProductRequest $request)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('public/products');
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $image_path,
            'user_id' => request()->user()->id
        ]);
        $date = Carbon::parse($request->created_at)->format('D,M,Y');


        return redirect()->back()
            ->with(
                'created',
                "The product " . $request->name . " is successfully added to the list. " . $date
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'type' => $product->type,
            'description' => $product->description,
            'image' => $product->image ? Storage::url($product->image) : null
        ];

        return inertia('User/ProductForm/Edit', ['product' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {


        $new_image_path = $product->image;
        if (!$request->image == null && Storage::exists($product->image)) {
            Storage::delete($product->image);
            $new_image_path = $request->file('image')->store('public/products');

        }
       $product->update([
            'user_id'=>request()->user()->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'type'=>$product->type,
            'description'=>$product->description,
            'image'=>$new_image_path,
        ]);

        return redirect()->route('products.index')->with('updated',"Product is successfully updated.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();
        return redirect()->back()->with('deleted', "Successfully move to trash.");
    }
}
