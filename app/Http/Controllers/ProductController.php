<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\ServiceProduct;
use Carbon\Carbon;


class ProductController extends ServiceProduct
{

    public function index()
    {
        $products = $this->handleIndex();
        return inertia('User/Product', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request()->user()->role === "user") {
            abort(401);
        }

        return inertia('User/ProductForm/Create');
    }


    public function store(StoreProductRequest $request)
    {
        $this->handleStore($request);
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
        $item = $this->handleEdit($product);
        return inertia('User/ProductForm/Edit', ['product' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->handleUpdate($request, $product);
        return redirect()->route('products.index')->with('updated', "Product is successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->handleDestroy($product);
        return redirect()->back()->with('deleted', "Successfully move to trash.");
    }
}
