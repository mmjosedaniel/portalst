@extends('layouts.base')

@section('content')

    <div class="card text-center">
        <div class="card-footer text-muted">
                    :::
        </div>
        <div class="card-body">
            <h1 class="card-title">Productos</h1>
        </div>
    </div>

    <br>

    <section>
        <div >
            <form action="addProduct" method="post">
                <div class="form-group">
                    <label for="">Producto</label>
                    <input type="text" name="productName" class="form-control">
                    <label for="">Precio</label>
                    <input type="number" name="prodcutPrice" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </section>

    <section>
        
    </section>

@endsection