<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;

class OrderProductController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * It adds a product to an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'orderId' => 'required|numeric',
            'productId' => 'required|numeric'

        ]);
        $orderId = $validData['orderId'];

        $orderProduct = new OrderProduct();
        $orderProduct->order_id = $orderId;
        $orderProduct->product_id = $validData['productId'];
        $orderProduct->save();

        return redirect("orders/$orderId/edit");
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
     * I am using it to retire a product from an order by changing order_product_status to 0.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $orderProduct = OrderProduct::findOrFail($id);
        $orderProduct->order_product_status = 0;
        $orderProduct->save();

        $location = $request['location'];
        $orderId = $orderProduct->order_id;


        if($location == 'orders'){
            return redirect("orders/$orderId/edit");
        }else if($location == 'kitchen'){
            return redirect('kitchen');
        }
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


/* if ($request->getMethod() == 'POST'){
    $postData = $request->getParsedBody();
    
    if (key($postData) == 'order'){

    }
} */