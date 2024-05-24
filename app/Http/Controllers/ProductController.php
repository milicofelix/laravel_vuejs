<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductDetail;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);

        return view('app.products.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        return view('app.products.create', ['units' => $units, 'suppliers' => $suppliers ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'description.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'weight.integer' => 'O campo peso deve ser um número inteiro',
            'unit_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($rules, $feedbacks);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('app.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        
        return view('app.products.edit', ['product' => $product, 'units' => $units, 'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.show', ['product' => $product->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
