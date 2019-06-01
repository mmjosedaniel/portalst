@extends('layouts.base')

@section('content')

    <section>    
        <div class="card text-center">
            <div class="card-footer text-muted">
                :::
            </div>
            <div class="card-body">
                <h1 class="card-title">Productos</h1>
            </div>
        </div>
    </section>
    
        
    <br>

    <section>
        <div >
            <form action="/products" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Producto:</label>
                    <input type="text" name="productName" class="form-control">
                    <label for="">Precio:</label>
                    <input type="number" name="productPrice" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </section>

    <br>

    <section>
        <div >
            <h1>Products</h1>
            @foreach ($products as $product)
                @if($product->product_status == 1)
                    <div class="container bg-light my-3">
                        <form action="products.destroy">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="delete" value="{{ $product->product_id }}">
                                <div class="col-sm ">
                                    <label class="">{{ $product->product_name }}</label>
                                </div>
                                <div class="col-sm">
                                    <label class="">{{ $product->product_price }}</label>
                                </div>
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-warning float-right">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <br>
    <div>
        <a href="/" class="btn btn-primary">Volver</a>
    </div>

@endsection