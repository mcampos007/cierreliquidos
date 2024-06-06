@extends('layouts.app')

@section('title', 'Bienvenido a Cierre de Turnos Panel de Control')

@section('body-class', 'product-page')
@section('styles')
    <style>
        .custom-alert {
            width: 50%;
            margin-top: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="header header-filter"
        style="background-image: url(' {{ asset('img/demofondo.jpg') }}' ); background-size: cover; background-position: top center;">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="profile-tabs">


                <div class="nav-align-center">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">camera</i>
                                Turno Actual
                            </a>
                        </li>
                        <li>
                            <a href="#remitos" role="tab" data-toggle="tab">
                                <i class="material-icons">palette</i>
                                Turnos Cerrados
                            </a>
                        </li>


                    </ul>
                    <!-- Notifiaciones -->
                    @if (session('success'))
                        @if (session('notification'))
                            <div class="alert alert-success custom-alert" role="alert">
                                <strong>{{ session('notification') }}</strong>
                            </div>
                        @endif
                    @else
                        @if (session('notification'))
                            <div class="alert alert-danger custom-alert" role="alert">
                                <strong>{{ $notification }}</strong>
                            </div>
                        @endif
                    @endif

                    <div class="tab-content gallery">
                        <!-- Panel de Pedido Activo -->
                        <div class="tab-pane active" id="dashboard">
                            <hr>
                            @if (auth()->user()->role == 'user')
                                @if ($nuevo)
                                    <!-- Mostrar boton para turno Nuevo  -->
                                    <a href="{{ url('user/turnonuevo') }}" class="btn btn-primary btn-round">Ingresar Nuevo
                                        turno</a>
                                @else
                                    <!-- Mostrar los datos registrados actualmente  -->
                                    <span class="label label-info">Usuario {{ auth()->user()->name }}</span>
                                    <table class="table table-responsive-sm">
                                        <thead>

                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Turno</th>
                                                <th>Fecha</th>
                                                <th>Usuario</th>
                                                <th>Efectivo</th>
                                                <th>Cta.Cte.</th>
                                                <th>T. Visa</th>
                                                <th>Dbto visa</th>
                                                <th>Maestro</th>
                                                <th>Mastercard</th>
                                                <th>American </th>
                                                <th>Cheques</th>
                                                <th>Otros</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{ $turno->first() }}
                                            {{ auth()->user()->id }}
                                            @if ($turno->first()->user_id === auth()->user()->id)
                                                <td>{{ $turno->first()->id }}</td>
                                                <td>{{ $turno->first()->turno }}</td>
                                                <td>{{ $turno->first()->fecha }}</td>
                                                <td>{{ $turno->first()->user->name }}</td>
                                                <td>{{ $turno->first()->efectivo }}</td>
                                                <td>{{ $turno->first()->ctacte }}</td>
                                                <td>{{ $turno->first()->visa }}</td>
                                                <td>{{ $turno->first()->electron }}</td>
                                                <td>{{ $turno->first()->maestro }} </td>
                                                <td>{{ $turno->first()->mastercard }}</td>
                                                <td>{{ $turno->first()->american }}</td>
                                                <td>{{ $turno->first()->cheques }}</td>
                                                <td>{{ $turno->first()->otros }}</td>
                                                <td>
                                                    <form method="post" action="{{ url('/user/turno/' . $t->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="id" value="{{ $t->id }}" />
                                                        <a href="{{ url('/user/turno/edit/' . $t->id) }}" type="button"
                                                            rel="tooltip" title="Editar Importes"
                                                            class="btn btn-success btn-simple btn-xs">
                                                            <span class="material-icons md-dark">paid</span>
                                                        </a>
                                                        <a href=" {{ url('/user/turno/editaforadores/' . $t->id . '/edit') }}"
                                                            type="button" rel="tooltip" title="Editar Aforadores"
                                                            class="btn btn-success btn-simple btn-xs">
                                                            <span class="material-icons md-dark">format_list_numbered</span>
                                                        </a>
                                                        <a href=" {{ url('/user/turno/cerrarturno/' . $t->id) }}"
                                                            type="button" rel="tooltip" title="Cerrar Turno"
                                                            class="btn btn-success btn-simple btn-xs">
                                                            <span class="material-icons md-dark">thumb_up</span>

                                                        </a>
                                                        <button type="submit" rel="tooltip" title="Eliminar"
                                                            class="btn btn-danger btn-simple btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif

                                        </tbody>
                                    </table>
                                    <p class="h2"> <strong> </strong> </p>
                                @endif
                            @endif
                        </div>
                        <!-- Panel de Turnos Cerrados -->
                        {{ $turnoscerrados }}
                        <div class="tab-pane text-center" id="remitos">

                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($turnoscerrados as $turnoclose)
                                        <tr>
                                            <td class="text-center">{{ $turnoclose->id }}</td>
                                            <td class="text-center">{{ $turnoclose->turno }}</td>
                                            <td class="text-center">{{ $turnoclose->fecha }}</td>
                                            <td>
                                                <a href="{{ url('/admin/turno/edit/' . $turnoclose->id) }}" type="button"
                                                    rel="tooltip" title="Ver Importes"
                                                    class="btn btn-success btn-simple btn-xs">
                                                    <span class="material-icons md-dark">paid</span>
                                                </a>
                                                <a href="{{ url('/user/turno/edit/' . $turnoclose->id) }}" type="button"
                                                    rel="tooltip" title="Ver Aforadores"
                                                    class="btn btn-success btn-simple btn-xs">
                                                    <span class="material-icons md-dark">format_list_numbered</span>
                                                </a>
                                                <a href="{{ url('/user/turno/edit/' . $turnoclose->id) }}" type="button"
                                                    rel="tooltip" title="Imprimir Turno"
                                                    class="btn btn-success btn-simple btn-xs">
                                                    <span class="material-icons md-dark">print</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $turnoscerrados->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection
