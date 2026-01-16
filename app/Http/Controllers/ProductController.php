<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of products (with search).
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by name or SKU (AJAX / normal)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(10);

        // If AJAX request (for live search)
        if ($request->ajax()) {
            return view('products.table', compact('products'))->render();
        }

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

         // Generate SKU: first 3 letters of name + random string
        $prefix = strtoupper(Str::slug($data['name'], ''));
        $prefix = substr($prefix, 0, 3);

        $data['sku'] = $prefix . '-' . strtoupper(Str::random(6));

        // dd($data);

        if (Product::create($data)) {
            return redirect()->route('products.index')->with('success', 'Product Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Product Creation Failed !!');
        }
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(Product $product)
    {
        $product->update([
            'is_active' => !$product->is_active
        ]);

        return back()->with('success', 'Product status updated');
    }
}