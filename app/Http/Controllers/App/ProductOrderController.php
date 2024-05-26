<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Order;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $products = Product::all();
        return view('app.product-orders.create', ['order' => $order, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $rules = [
            'product_id' => 'exists:products,id'
        ];

        $feedback = [
            'product_id.exists' => 'O product informado não existe'
        ];

        $request->validate($rules, $feedback);

        $productOrder = new ProductOrder();
        $productOrder->order_id = $order->id;
        $productOrder->product_id = $request->get('product_id');
        $productOrder->save();

        return redirect()->route('product-orders.create', ['order' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Product $product)
    {
         /*
        print_r($order->getAttributes());
        echo '<hr>';
        print_r($product->getAttributes());
        */

        echo $order->id.' - '.$product->id;

        //convencional
        /*
        PedidoProduto::where([
            'order_id' => $order->id,
            'product_id' => $product->id
        ])->delete();
        */

        //detach (delete pelo relacionamento)
        $order->products()->detach($product->id);
        //product_id
        
        return redirect()->route('product-orders.create', ['order' => $order->id]);
    }
}
