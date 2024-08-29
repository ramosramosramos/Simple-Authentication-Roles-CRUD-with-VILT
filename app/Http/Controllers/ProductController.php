<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController
{

    public function index()
    {
        // Retrieve the paginated results
        $products = Product::query()
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
        dd($request->all());
        // Product::create([
        //     'user_id' => request()->user()->id

        // ]);
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

        return inertia('User/ProductForm/Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();
        return redirect()->back()->with('deleted',"Successfully move to trash.");
    }
}
