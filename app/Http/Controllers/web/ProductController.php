<?php

namespace App\Http\Controllers\Web;

use App\Events\CreateProductEvent;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $products = Product::with('images')->get();

        return view('products.products', compact('products', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->preview = $request->preview;
        $product->price = $request->price;
        $product->category_id = $request->category_id; 
        $product->save();

        CreateProductEvent::dispatch($product, $request->file('images'));

        return redirect()->route('products.create')->with('success', 'Producto creado correctamente.');
    }

    public function update(ProductUpdateRequest $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->name = $request->update_name;
        $product->description = $request->update_description;
        $product->preview = $request->update_preview;
        $product->price = $request->update_price;
        $product->category_id = $request->update_category_id;
        $product->save();

        return redirect()->route('products.create')->with('success', 'Producto ' . $product_id . ' actualizado exitosamente.');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();

        return redirect()->route('products.create')->with('success', 'Producto ' . $product_id . ' eliminado exitosamente.');
    }
}
