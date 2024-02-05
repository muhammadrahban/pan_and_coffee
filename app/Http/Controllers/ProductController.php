<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('Product.productList', compact('products'));
    }

    function create()
    {
        return view('Product.ProductCreate');
    }

    function add(Request $request)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'description'   => 'required|max:50',
            'size'          => 'required',
            'price'         => 'required',
            'image'         => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media(
                $request,
                "product"
            );
        }
        Product::create($validateData);
        return redirect(route('product.index'))->with('message', 'product created successfully');
    }

    function edit(Product $product)
    {
        return view('Product.ProductCreate', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'description'   => 'required|max:50',
            'size'          => 'required',
            'price'         => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media($request, "product");
        }
        $product->update($validateData);
        return redirect(route('product.index'))->with('message', 'product updated successfully');
    }

    function delete(product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('message', 'product deleted saccessfully');
    }
}
