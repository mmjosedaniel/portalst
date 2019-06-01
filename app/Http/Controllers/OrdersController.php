<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\OrderProduct;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = getProductsA();
        $orderAndProducts = getOrdersAndProducts();
        $order = Order::all();

        return view('orders', [
            'products' => $products,
            'orders'=> $order,
            'orderAndProducts' => $orderAndProducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $order->order_status = 1;
        $order->save();

        $orderId = $order->id;

        return redirect("/orders/$orderId/edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $products = getProductsA();
        $orderAndProducts = getOrdersAndProducts();

        return view('orders.edit', [
            'products' => $products,
            'orderId'=> $id,
            'orderAndProducts' => $orderAndProducts
        ]);
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
        $order = Order::find($id);
        $order->order_status++;
        $order->save();

        return redirect("orders");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

//Repeated three times
function getProductsA(){
    $products = Product
    ::select('products.*')
    ->orderBy('product_name', 'asc')
    ->get();
    
    return $products;
}

//Repeated twice
function getOrdersAndProducts(){
    $ordersAndProducts = OrderProduct::
    join('orders', 'order_products.order_id', '=', 'orders.id' )
    ->join('products', 'order_products.product_id', '=', 'products.id')
    ->select('orders.*', 'order_products.*', 'products.*', 'order_products.id as order_product_id')
    ->orderBy('product_name', 'asc')
    ->where('order_products.order_product_status', '=', '1')
    ->get();

    return $ordersAndProducts;
}
