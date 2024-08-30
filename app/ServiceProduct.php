<?php

namespace App;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ServiceProduct
{

    public function handleIndex()
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
        return $products;
    }


    public function handleStore(StoreProductRequest $request)
    {
        if (request()->user()->role === "user") {
            abort(401);
        }

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

    }


    // -------------------------------------edit-------------------------
    // -------------------------------------edit-------------------------
    public function handleEdit(Product $product)
    {
        if (request()->user()->role === "user") {
            abort(401);
        }

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'type' => $product->type,
            'description' => $product->description,
            'image' => $product->image ? Storage::url($product->image) : null
        ];
        return $item;


    }

    // ----------------------------------update-----------------------------------
    // ----------------------------------update-----------------------------------
    public function handleUpdate(UpdateProductRequest $request, Product $product)
    {
        if (request()->user()->role === "user") {
            abort(401);
        }

        $new_image_path = $product->image;
        if (!$request->image == null && Storage::exists($product->image)) {
            Storage::delete($product->image);
            $new_image_path = $request->file('image')->store('public/products');
        }
        $product->update([
            'user_id' => request()->user()->id,
            'name' => $product->name,
            'price' => $product->price,
            'type' => $product->type,
            'description' => $product->description,
            'image' => $new_image_path,
        ]);


    }


    // -------------------------------delete product------------------------
    // -------------------------------delete product------------------------
   public function handleDestroy(Product $product){
    if (request()->user()->role === "user") {
        abort(401);
    }
    $product->deleteOrFail();
   }
}
