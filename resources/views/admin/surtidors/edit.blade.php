@extends('layouts.app')

@section('title','Modificación de Surtidor')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset("img/demofondo.jpg") }}');background-size: cover; background-position: top center;">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Detalles del  Surtidor {{$surtidor->name }}</h2>
            <div class="card-body">
                @if (session('notification'))
                
                <div class="alert alert-success" role="alert">
                  {{ session('notification')}}
                </div>
                @endif

              </div>

            <div class="team">
                @if (session()->has('msj'))
                        <div class="alert alert-danger" role="alert">
                              <strong>Error:!!</strong>{{session('msj')}}
                        </div>
                    @endif
                
                <div class="container">
                    <h1>Actualizar Surtidor</h1>
                    <form method="POST" action="{{ url('admin/surtidors/update/'.$surtidor->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $surtidor->name }}">
                    </div>

                    <div class="form-group">
                    <label for="producto">Producto:</label>
                     <select name="producto" id="producto" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $surtidor->product->id === $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="lectura_actual">Lectura Actual:</label>
                    <input type="number" name="lectura_actual" id="lectura_actual" class="form-control" step="0.01" value="{{ $surtidor->lectura_actual }} ">
                    </div>

                    <!-- Agrega más campos aquí según tus necesidades -->

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>  
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection
