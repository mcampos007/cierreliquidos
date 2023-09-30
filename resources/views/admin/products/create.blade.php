@extends('layouts.app')

@section('title','Bienvenido a DigTab by Infocam')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url(' {{ asset("img/demofondo2.jpg") }}'); background-size: cover; background-position: top center;">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section ">
            <h2 class="title text-center">Registrar Nuevo curso</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ url('admin/cursos') }}" enctype="multipart/form-data">
                {{csrf_field() }}              
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Curso</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        </div>    
                    </div>
                        
                </div>
                <div class="form-group">
                    <label for="division_id">División</label>
                    <select id="division_id" name="division_id" class="form-control">
                        <option value="">Seleccione una division</option>
                        @foreach ($divisiones as $division)
                            <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }} >{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="turno_id">Turno</label>
                    <select id="turno_id" name="turno_id" class="form-control">
                        <option value="">Seleccione un turno</option>
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->id }}" {{ old('turno_id') == $turno->id ? 'selected' : '' }} >{{ $turno->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="colegio_id">Colegio</label>
                    <select id="colegio_id" name="colegio_id" class="form-control">
                        <option value="">Seleccione un colegio</option>
                        @foreach ($colegios as $colegio)
                            <option value="{{ $colegio->id }}" {{ old('colegio_id') == $colegio->id ? 'selected' : '' }} >
                            {{ $colegio->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="periodo_id">Periodo</label>
                    <select id="periodo_id" name="periodo_id" class="form-control">
                        <option value="">Seleccione un periodo</option>
                        @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->id }}" {{ old('periodo_id') == $periodo->id ? 'selected' : '' }} >{{ $periodo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Curso</button>
                 <a href=" {{ url('/admin/cursos')}}" class="btn btn-default">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
