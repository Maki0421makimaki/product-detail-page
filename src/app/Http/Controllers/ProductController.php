<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Season;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->sort == 'asc') {
            $query->orderBy('price', 'asc');
        }
        if ($request->sort == 'desc') {
            $query->orderBy('price', 'desc');
        }
        $products = $query->paginate(6);

        return view('products.index', compact('products'));
    }

    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('products.show', compact('product'));
    // }

    public function show(Product $product)
    {
        $product->load('seasons'); 
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $imagePath = $request->file('image')->store('products', 'public'); 
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        $product->seasons()->attach($request->season);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        $seasons = Season::all();

        return view('products.edit', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        $product->seasons()->sync($request->season);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
