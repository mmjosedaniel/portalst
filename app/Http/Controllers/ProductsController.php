<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = getProducts();

        return view('products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validDate = $request->validate([
            'productName'=> 'required|alpha_num',
            'productPrice'=> 'required|numeric'
        ]);

        $product = new Product();
        $product->product_name = ucwords($validDate['productName']);
        $product->product_price = $validDate['productPrice'];
        $product->save();

        return redirect('/products');
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
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->product_status = 0;
        $product->save();

        return redirect('/products');
    }
}

//Repeated
function getProducts(){
    $products = Product
    ::select('products.*')
    ->orderBy('product_name', 'asc')
    ->get();
    
    return $products;
}

/* function createProduct($postData){
    $product = new Products();
                    $product->product_name = ucwords($postData['productName']);
                    $product->product_price = $postData['productPrice'];
                    $product->save();
}

function deleteProduct($postData){
    $product = Products::find($postData['delete']);
                    $product->product_status = 0;
                    $product->save();
} */