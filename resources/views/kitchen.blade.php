@extends('layouts.base')

@section('content')

    <section>    
        <div class="card text-center">
            <div class="card-footer text-muted">
                :::
            </div>
            <div class="card-body">
                <h1 class="card-title">Cocina</h1>
            </div>
        </div>
    </section>

    <br>

    <section>
        <div>
        @foreach ($orders as $order)
            <div class="text-center border border-warning bg-light">
                <h1>{{ $order->created_at }}</h1>
                <h1>{{ $order->id }}</h1>
            </div>
            @foreach ($orderAndProducts as $orderAndProduct)
            @if($orderAndProduct->order_id == $order->id)
                <div class="container bg-light my-3">
                    <form action="kitchen/{{ $orderAndProduct->order_product_id }}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-sm">
                                <label for=""> {{ $orderAndProduct->product_name }} </label>
                            </div>
                            <div class="col-sm">
                                <button type="submit" class="btn btn-warning float-right">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            @endforeach
            <div class="text-center my-3">
                <form action="/kitchen/{{ $order->id }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Enviar orden</button>
                    
                </form>
            </div>
            <br>
        @endforeach
        </div>
    </section>

    <br>

    <div>
        <a href="/" class="btn btn-primary">Volver</a>
    </div>

@endsection