@extends('layouts.app_coordinador')

@section('stylesheet')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css" rel="stylesheet">

<link href="{{{ asset('css/style_dashboard.css') }}}" rel="stylesheet">
<link href="{{{ asset('css/coordinador/profesores.css') }}}" rel="stylesheet">
<link href="{{{ asset('css/admin/alumnos.css') }}}" rel="stylesheet">
@endsection

@section('title', 'Profesores')


@section('content')
  <div class="row contenedor">
    <div class="col m6 push-m3 s12">
      <h5>Profesores de Carrera</h5>
    </div>
  </div>
  <div class="container">
    <table id="example" class="responsive-table striped" style="width:100%">
          <thead>
              <tr>
                  <th>Nombre de Usuario</th>
                  <th>Nombre Completo</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Correo Electronico</th>
              </tr>
          </thead>
          <tbody>
                <tr>
                  <td>anubis</td>
                  <td>sadf asdfsa asdf</td>
                  <td>asdfa</td>
                  <td>asdfas@dfasd.com</td>
              </tr>
          </tbody>
      </table>
  </div>
@endsection

@section('scripts')
  <script src="{{{ asset('js/datatables.js') }}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
@endsection
