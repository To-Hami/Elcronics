<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /******************************** index *********************************/
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortFiled = request('sort_filed', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Product::query();
        $query->orderBy($sortFiled ,$sortDirection);
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        return ProductListResource::collection($query->paginate($perPage));
    }

    /******************************** store *********************************/

    public function store(ProductRequest $request)
    {
        return new ProductResource(Product::create($request->validated()));
    }

    /******************************** show *********************************/

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /******************************** update *********************************/

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    /******************************** destroy *********************************/

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
    /******************************** index *********************************/

}
