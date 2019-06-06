@extends('layouts.base')

@section('content')

    <section>    
        <div class="card text-center">
            <div class="card-footer text-muted">
                :::
            </div>
            <div class="card-body">
                <h1 class="card-title">Ordenes</h1>
            </div>
        </div>
    </section>

    <br>

    <section>
        <div class="row">
            <div class="col">
                <a class="btn btn-success" href="/orders/create">Crear nueva orden</a>
            </div>
        </div>
    </section>

    <br>

    <section>
            <section>
                    <div>
                    @foreach ($orders as $order)
                    @if($order->order_status == 3)
                        <div class="text-center border border-warning bg-light">
                            <h1>{{ $order->created_at }}</h1>
                            <h1>{{ $order->id }}</h1>
                        </div>
                        @foreach ($orderAndProducts as $orderAndProduct)
                        @if($orderAndProduct->order_id == $order->id)
                            <div class="container bg-light my-3">                                
                                <div class="row">
                                    <div class="col-sm">
                                        <label for=""> {{ $orderAndProduct->product_name }} </label>
                                    </div>
                                    <div class="col-sm">
                                        <label for=""> {{ $orderAndProduct->product_price }} </label>
                                    </div>
                                </div>                                
                            </div>
                        @endif
                        @endforeach

                        <div class="text-center my-3">
                            <h1>Total</h1>
                            <h1>{{ $order->order_price }}</h1>
                        </div>

                        <div class="text-center my-3">
                            <form action="/orders/{{ $order->id }}" method="POST" onsubmit="return validateForm()">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Pagar orden</button>
                                
                            </form>
                        </div>
                        <br>
                    @endif
                    @endforeach
                    </div>
                </section>
    </section>

    <br>

    <div>
        <a href="/" class="btn btn-primary">Volver</a>
    </div>

@endsection