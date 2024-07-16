<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        // Crear un nuevo producto usando Eloquent y asignar valores
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->preview = $request->preview;
        $product->price = $request->price;
        $product->category_id = $request->category_id; // Asignar la categoría

        // Guardar el producto en la base de datos
        $product->save();

        // Manejar las imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generar un nombre de archivo único usando timestamp y un hash
                $uniqueFileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Almacenar la imagen con el nombre de archivo único
                $imagePath = $image->storeAs('products', $uniqueFileName, 'public');

                // Crear una nueva instancia de ProductImage y asociarla al producto
                $productImage = new ProductImage();
                $productImage->product_id = $product->product_id; // Asignar el ID del producto
                $productImage->image_path = $imagePath; // Asignar la ruta de la imagen
                $productImage->save(); // Guardar el registro en la base de datos
            }
        }

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
