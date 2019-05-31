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
        <div >
            <h1>Products</h1>
            <div> {{ $orderId }} </div>
            @foreach ($products as $product)
                @if($product->product_status == 1)
                    <div class="container bg-light my2">
                        <form action="/orders" method="post"></form>
                        @csrf
                        <div class="row ">
                            <input type="hidden" name="delete" value="{{ $product->product_id }}">
                            <div class="col-sm ">
                                <label for="product" class="">{{ $product->product_name }}</label>
                            </div>
                            <div class="col-sm">
                                <label for="price" class="">{{ $product->product_price }}</label>
                            </div>
                            <div class="col-sm">
                                <button type="submit" class="btn btn-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <br>

    <div>
        <a href="/orders" class="btn btn-primary">Volver</a>
    </div>

@endsection