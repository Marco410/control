@extends('layouts.app_admin')

@section('stylesheet')
<link href="{{{ asset('css/admin/calendario.css') }}}" rel="stylesheet">
<link href="{{{ asset('css/admin/loader.css') }}}" rel="stylesheet">
<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="{{{ asset('js/plugins/prism/prism.css') }}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{{ asset('js/plugins/chartist-js/chartist.min.css') }}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{{ asset('js/plugins/fullcalendar/css/fullcalendar.min.css') }}}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('title', 'Calendario')

@section('content')

<!--start container-->
<div class="container">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light light-blue darken-4 modal-trigger" data-position="left">
      <i class="fas fa-cog"></i>
    </a>
    <ul>
      <li>
        <a class="btn-floating waves-effect waves-light light-blue darken-1 modal-trigger tooltipped" href="#cal-modal" data-position="left" data-tooltip="Relación de grupos con calificaciones asignadas" id="btn_add_evento">
          <i class="large material-icons">people_outline</i>
        </a>
      </li>
      <li>
        <a class="btn-floating waves-effect waves-light red darken-3 tooltipped" data-position="left" data-tooltip="Cerrar semestre (envía los datos de calificaciones a kardex)" href="{{route('a_kardex')}}" ><i class="fas fa-times"></i></a>
      </li>
      <li>
        <a class="btn-floating waves-effect waves-light light-blue darken-4 modal-trigger tooltipped" href="#task-modal" data-position="left" data-tooltip="Crear nuevo evento" id="btn_add_evento">
          <i class="large material-icons">add</i>
        </a>
      </li>
    </ul>
  </div>


  <div class="section">
    <div class="row contenedor">
      <div class="col m6 push-m3 s12">
        <h5>Control de Calendario Escolar</h5>
      </div>
    </div>
    <div class="divider"></div>
    <div id="full-calendar">
      <div class="row">
        <div class="col s12 m4 l3">

          <div id="task-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
              <div class="row">
                <div class="col m6 push-m3 s12" style="text-align: center;">
                  <h4>Registrar evento</h4>
                </div>
              </div>
              <div class="row">

                <form class="col s12" id="form_evento" action="{{route('evento_nuevo')}}" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="input-field col m6 s12">
                      <input id="event" type="text" name="nombre" class="validate">
                      <label for="event">Nombre del evento</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <label for="fecha1">Fecha de inicio </label>
                      <input type="text" name="inicio" class="datepicker" id="fstart">
                    </div>
                    <div class="input-field col m3 s12">
                      <label for="fecha2">Fecha de cierre </label>
                      <input type="text" name="fin" class="datepicker" id="fend">
                    </div>
                    <div id="color" class="input-field col m6 s12">
                      <select name="color">
                        <option value="#f44336">Color rojo</option>
                        <option value="#e91e63">Color rosa</option>
                        <option value="#9c27b0">Color purpura</option>
                        <option value="#673ab7">Color purpura obscuro</option>
                        <option value="#3f51b5">Color indigo</option>
                        <option value="#2196f3"  default selected>Color azul</option>
                        <option value="#03a9f4">Color azul claro</option>
                        <option value="#00bcd4">Color cian</option>
                        <option value="#009688">Color turquesa</option>
                        <option value="#4caf50">Color verde</option>
                        <option value="#8bc34a">Color verde claro</option>
                        <option value="#ffeb3b">Color lima</option>
                        <option value="#ffeb3b">Color amarillo</option>
                        <option value="#ffc107">Color ambar</option>
                        <option value="#ff9800">Color naranja</option>
                        <option value="#ff5722">Color naranja obscuro</option>
                        <option value="#795548">Color cafe</option>
                        <option value="#9e9e9e">Color gris</option>
                        <option value="#607d8b">Color verde-azul</option>
                        <option value="#ffffff">Color negro</option>
                        <option value="#000000">Color blanco</option>
                      </select>
                    </div>
                  </div>


                  <div class="modal-footer">
                    <button class="btn light-blue darken-4 left" type="submit" id="registrar_evento">Registrar Evento
                      <i class="material-icons right">send </i>
                    </button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">
                      <i class="material-icons blue-text text-darken-4"> fullscreen_exit </i>
                      <b> Salir </b></a>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div id="cal-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
              <div class="row">
                <div class="col m6 push-m3 s12" style="text-align: center;">
                  <h4>Asignación de calificaciones</h4>

                  <span>Asegúrese de que cada profesor halla registrado calificaciones a sus grupos antes del cierre de semestre.</span>
                </div>
              </div>
              <div class="row">

                <div class="col m6 s12">
                  <h6>Grupos con calificaciones finales asignadas</h6>
                  <table id="example" class="responsive-table striped">
                      <thead>
                          <tr>
                            <th>ID grupo</th>
                            <th>Profesor</th>
                            <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($yas as $y)
                          <tr>
                            <td>{{ $y->id_grupo }}</td>
                            <td>{{ $y->nombres }} {{ $y->apaterno }} {{ $y->amaterno }}</td>
                            <td>
                              <button type="button" class="btn waves-effect waves-light btn-large tooltipped"  data-tooltip="Este profesor ya ha registrado al menos una calificación" name="button">Calificado</button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>

                <div class="col m6 s12">
                  <h6>Grupos sin calificaciones finales asignadas</h6>
                  <table id="example" class="responsive-table striped">
                      <thead>
                          <tr>
                            <th>ID grupo</th>
                            <th>Profesor</th>
                            <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($nop as $n)
                          <tr>
                            <td>{{ $n->id_grupo }}</td>
                            <td>{{ $n->nombres }} {{ $n->apaterno }} {{ $n->amaterno }}</td>
                            <td>
                              <button type="button" class="btn waves-effect waves-light red darken-3 btn-large tooltipped" data-tooltip="Este profesor no ha registrado calificaciones" name="button">No calificado</button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
        <div class="col m10 push-m1 s10">
          <div id='calendar'></div>
          <div id="loader"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row contenedor">
    <div class="col m8 push-m2 s12">
      <h5>Configuración del periodo escolar actual</h5>
    </div>
    <table id="example" class="responsive-table striped" style="width:100%">
      <thead>
        <tr>
          <th>Periodo actual</th>
          <th>Fecha inicio</th>
          <th>Fecha terminación</th>
          <th>Director</th>
          <th>Jefe de control escolar</th>
          <th>Fecha y hora de registro</th>
          <th>Fecha y hora de actualización</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$configuracion->periodo_actual}}</td>
          <td>{{$configuracion->fecha_inicio}}</td>
          <td>{{$configuracion->fecha_terminacion}}</td>
          <td>{{$configuracion->director}}</td>
          <td>{{$configuracion->Jefe_control_escolar}}</td>
          <td>{{$configuracion->created_at}}</td>
          <td>{{$configuracion->updated_at}}</td>
          <td> <a href="#modal5" class="waves-effect waves-light btn modal-trigger tooltipped" data-position="bottom" data-tooltip="Actualizar la configuración del periodo escolar actual">Modificar</a>

            <div id="modal5" class="modal modal-fixed-footer">
              <div class="modal-content">
                <form class="col  s12 m12" id="form_materia" action="{{route('modifica_configuracion')}}" method="post">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="col m4 push-m4 s12">
                      <h4 style="text-align:center;">Modificar Periodo Escolar Actual</h4>
                    </div>
                  </div>

                  <div class="row">

                    <div class="input-field col m4 s12 ">
                      <select class="" name="periodo" id="periodo">
                        <option value="" disabled>Elige una opcion</option>
                        <option value="Agosto-Diciembre {{ now()->year }}">Agosto-Diciembre {{ now()->year }}</option>
                        <option value="Enero-Junio {{ now()->year }}">Enero-Junio {{ now()->year }}</option>
                      </select>
                      <label for="periodo">Periodo</label>
                    </div>

                    <div class="input-field col m4 s12 ">
                      <!--<i class="material-icons prefix">date_range</i>-->
                      <label for="fecha_inicio">Fecha de inicio </label>
                      <input type="text" name="finicio" id="fecha_inicio"  class="datepicker" value="{{$configuracion->fecha_inicio}}" >
                    </div>

                    <div class="input-field col m4 s12 ">
                      <!--<i class="material-icons prefix">date_range</i>-->
                      <label for="fecha_terminacion">Fecha de terminación </label>
                      <input type="text" name="fterm" class="datepicker" id="fecha_terminacion" value="{{$configuracion->fecha_terminacion}}">
                    </div>

                    <div class="input-field col m4 s12 ">
                      <!--<i class="material-icons prefix">account_circle</i>-->
                      <input type="text" id="director" name="director" class="validate" value="{{$configuracion->director}}" required>
                      <label for="director">Director</label>
                    </div>

                    <div class="input-field col m4 s12 ">
                      <!--<i class="material-icons prefix">account_circle</i>-->
                      <input type="text" id="jefe_control" name="jefe_control" class="validate" value="{{$configuracion->Jefe_control_escolar}}" required>
                      <label for="jefe_control">Jefe de Control Escolar</label>
                    </div>





                    <div class="input-field col m4 s12">
                      <button class="btn light-blue darken-4" type="submit" id="actualizar_periodo">Actualizar
                        <i class="material-icons right">send </i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!--end container-->


            @endsection

            @section('scripts')
            <!--prism-->
            <script type="text/javascript" src="{{{ asset('js/plugins/prism/prism.js') }}}"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="{{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}}"></script>

            <!-- chartist -->
            <script type="text/javascript" src="{{{ asset('js/plugins/chartist-js/chartist.min.js') }}}"></script>

            <!-- Calendar Script -->
            <script type="text/javascript" src="{{{ asset('js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') }}}"></script>
            <script type="text/javascript" src="{{{ asset('js/plugins/fullcalendar/lib/moment.min.js') }}}"></script>
            <script type="text/javascript" src="{{{ asset('js/plugins/fullcalendar/js/fullcalendar.min.js') }}}"></script>
            <script type="text/javascript" src="{{{ asset('js/plugins/fullcalendar/fullcalendar-script.js') }}}"></script>
            <script type="text/javascript" src="{{{ asset('js/plugins/fullcalendar/lang/es.js') }}}"></script>

            <script type="text/javascript" src="{{{ asset('js/picker.js') }}}"></script>

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.tooltipped');

              });
              window.onload = function() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("calendar").style.display = "block";
              };
            </script>
            @endsection
