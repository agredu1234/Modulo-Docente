@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="h1 text-center">Reporte de Asistencia - <b>Parcial 01</b></h1>
  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="curso" class="col-sm-4 col-form-label">Curso</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control" id="curso" value="Aplicaciones Web">
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="docente" class="col-sm-4 col-form-label">Docente</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control" id="docente" value="Jaime Suasnabar">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12 col-md-6 row">
          <label for="semestre" class="col-sm-6 col-form-label">Semestre Académico</label>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" id="semestre" value="2019-II">
          </div>
        </div>
        <div class="form-group col-12 col-md-6 row">
          <label for="fecha" class="col-sm-4 col-form-label">Fecha de Reporte</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="fecha" readonly value="10/11/2019">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="text-center">
        <tr>
          <th rowspan="2" scope="col">Nro</th>
          <th rowspan="2" colspan="6">Apellidos y Nombres</th>
          <th colspan="8">Asistencias</th>
          <th rowspan="2">% Asistencia</th>
        </tr>
        <tr>
          @for ($i = 0; $i < 8; $i++)
          <th>T{{ $i+1 }}</th>
          @endfor
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 30; $i++)
          <tr>
            <td scope="col">{{ $i + 1 }}</td>
            <td colspan="6">Estudiante {{ $i + 1 }}</td>
            @for ($a = 0; $a < 8; $a++)
              <td>P</td>
            @endfor
            <td>100%</td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>
@endsection