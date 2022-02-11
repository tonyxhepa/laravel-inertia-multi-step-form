<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function firstStep(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'body' => ['required'],
        ]);
        return to_route('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'body' => ['required'],
            'user_name' => ['required'],
            'address' => ['required'],
        ]);

        Product::create($validated);

        return to_route('products.create');
    }
}
