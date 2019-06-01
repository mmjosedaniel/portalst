<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\OrderProduct;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderAndProducts = getOrderAndProducts();
        $orders = getOrdersKitchen();

        return view('kitchen', [
            'orders' => $orders,
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
        //
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
        $orderPrice = 0;
        $orderAndProducts = getOrderAndProducts();
        
        
        foreach($orderAndProducts as $orderAndProduct ){
            if($orderAndProduct->order_id == $id){
                $orderPrice += $orderAndProduct->product_price;
            }
        }
        $order = Order::find($id);
        $order->order_price = $orderPrice;
        $order->order_status++;
        $order->save();
        
        return redirect("kitchen");
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

function getOrdersKitchen(){
    $orders = Order::
            where('order_status', 2)
            ->get();
            
    return $orders;
}

function getOrderAndProducts(){
    $orderAndProducts = OrderProduct::
                join('orders', 'order_products.order_id', '=', 'orders.id')
                ->join('products', 'order_products.product_id', '=', 'products.id')
                ->select('orders.*', 'products.*', 'order_products.*', 'order_products.id as order_product_id')
                ->orderBy('product_name', 'asc')
                ->where([
                    ['order_products.order_product_status', '=', '1'],
                    ['orders.order_status', '=', '2']
                ])
                ->get();
    return $orderAndProducts;
}

/* function setOrderPrice ($ordersAndProducts, $postData){
    $orderPrice = 0;

    foreach ($ordersAndProducts as $orderAndProduct){
        if ($orderAndProduct->order_id == $postData['orderToReset']){
            $orderPrice += $orderAndProduct->product_price;
        }
    }    

    $order = Orders::find($postData['orderToReset']);
    $order->order_price = $orderPrice;
    $order->save();
} */