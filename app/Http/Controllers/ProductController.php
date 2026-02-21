<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {

        $product = Product::find($id);

        if (! $product) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData['title'] = $product['name'].' - Online Store';
        $viewData['product'] = $product;
        $viewData['subtitle'] = 'A product page';
        $viewData['price'] = $product['price'];

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        Product::create($request->only(['name', 'price']));

        return redirect()->route('product.create')->with('success', 'Product created successfully!');
    }
}
