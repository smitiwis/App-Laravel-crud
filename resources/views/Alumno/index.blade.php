@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Lista Alumnos</h3>
          </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('alumno.create') }}" class="btn btn-info">Añadir Alumno</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
              <thead>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>sexo</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </thead>
              <tbody>
                @if($alumnos->count())
                @foreach($alumnos as $alumno)
                <tr>
                  <td>{{$alumno->nombre}}</td>
                  <td>{{$alumno->apellidos}}</td>
                  <td>{{$alumno->edad}}</td>
                  <td>{{$alumno->sexo}}</td>
                  <td>{{$alumno->grado}}</td>
                  <td>{{$alumno->seccion}}</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{action('AlumnoController@edit', $alumno->id)}}"><span class="glyphicon glyphicon-pencil"> Editar</span></a></td>
                  <td>
                    <form action="{{action('AlumnoController@destroy', $alumno->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">

                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"> Eliminar</span></button>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="8">No hay registro !!</td>
                </tr>
                @endif
              </tbody>

            </table>
          </div>
        </div>
        {{ $alumnos->links() }}
      </div>
    </div>
  </section>

  @endsection