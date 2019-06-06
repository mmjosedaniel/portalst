@extends('layouts.base')

@section('content')

    <section>    
        <div class="card text-center">
            <div class="card-footer text-muted">
                :::
            </div>
            <div class="card-body">
                <h1 class="card-title">Nueva orden</h1>
            </div>
        </div>
    </section>

    <br>

    <section>
        <div>
            <div>
                <h1>Products</h1>
            </div>

            <div >
                @foreach ($products as $product)
                @if($product->product_status == 1)
                <div class="container bg-light my-3">
                    <form action="/../order_product" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <label class="">{{ $product->product_name }}</label>
                            </div>
                            <div class="col-sm">
                                <label class="">{{ $product->product_price }}</label>
                            </div>
                            <input type="hidden" name="orderId" value="{{ $orderId }}">
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary float-right">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
        

    <br>

    <section>
        <div>
            <div>
                <h1> Orden No. {{ $orderId }} </h1>
            </div>

            <div >
                @foreach ($orderAndProducts as $orderAndProduct)
                @if($orderAndProduct->order_id == $orderId && $orderAndProduct->order_product_status == 1)
                <div class="container bg-light my-3">
                    <form action="/../order_product/{{ $orderAndProduct->order_product_id }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    @method('put')
                        <div class="row">
                            <div class="col-sm">
                                <label class="">{{ $orderAndProduct->product_name }}</label>
                            </div>
                            <div class="col-sm">
                                <label class="">{{ $orderAndProduct->product_price }}</label>
                            </div>

                            <input type="hidden" name="location" value="orders">

                            <div class="col-sm">
                                <button type="submit" class="btn btn-warning float-right">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <br>

    
    <div>
        <form action="/orders/{{ $orderId }}" method="POST">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-success">Enviar orden</button>
            
        </form>
    </div>
    
    <br>
    <br>

    <div>
        <a href="/orders" class="btn btn-primary">Volver</a>
    </div>

@endsection