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

    </section>

    <br>

    <div>
        <a href="/" class="btn btn-primary">Volver</a>
    </div>

@endsection