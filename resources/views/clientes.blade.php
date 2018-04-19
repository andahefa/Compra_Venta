@extends('layout')
@section('content')

 <h2><center><b>Clientes</b></center></h2>
                 <button id="nuevoCliente" class="btn btn-success add-more" onclick="crearCliente()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                  <table id="articulos" class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Dirección Residencia</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                        <td>{{$cliente->num_cedula}}</td>
                        <td>{{$cliente->nombres}}</td>
                        <td>{{$cliente->apellidos}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->direccion_residencia}}</td>
                        <td>
                            <button type="button" name="editar" id="Editar" onclick="editarCliente('{{$cliente->num_cedula}}', '{{$cliente->nombres}}', '{{$cliente->apellidos}}', '{{$cliente->telefono}}', '{{$cliente->direccion_residencia}}')" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </td>
                        <td >
                        {!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy', $cliente->num_cedula],'style'=>'display:inline', 'onsubmit'=> 'return confirmDelete()']) !!}
                                      {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', array('type' => 'submit', 'class' => 'btn btn-danger', 'id' => 'eliminar')) }}
                                      {!! Form::close() !!}     
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
                </div>


                 <!-- Modal editar Contrato-->

            <div id="editarCliente" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Editar Cliente</h4>
                  </div>
                  
                  <form method="post" action="clientes/actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                      <input type="text" name="idContrato" id="idContrato" style="display: none">
                      <label class="form.control">Numero de Cedula:</label>
                      <input type="number" name="cedula" id="cedula" class="form-control">
                      <label class="form.control">Nombres:</label>
                      <input type="text" class="form-control" id="nombres" name="nombres">
                      <label class="form.control">Apellidos:</label>
                      <input type="text" name="apellidos" id="apellidos" class="form-control">
                      <label class="form.control">Telefono:</label>
                      <input type="number" name="telefono" id="telefono" class="form-control">
                      <label class="form.control">Dirección:</label>
                      <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </form>
                 
                </div>

              </div>
            </div>

            <!-- Modal Crear Cliente-->

            <div id="crearCliente" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Nuevo Cliente</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="clientes/crear">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                      <input type="text" name="idContrato" id="idContrato" style="display: none">
                      <label class="form.control">Numero de Cedula:</label>
                      <input type="number" name="cedula" id="cedula" class="form-control">
                      <label class="form.control">Nombres:</label>
                      <input type="text" class="form-control" id="nombres" name="nombres">
                      <label class="form.control">Apellidos:</label>
                      <input type="text" name="apellidos" id="apellidos" class="form-control">
                      <label class="form.control">Telefono:</label>
                      <input type="number" name="telefono" id="telefono" class="form-control">
                      <label class="form.control">Dirección:</label>
                      <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </form>
                    
                </div>

              </div>
            </div>

              <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
            <script>

            	/*Funcion que permite visualizar un alert cuando se va a eliminar un contrato*/
            	
            	function confirmDelete()
                  {
                  var x = confirm("Esta seguro que desea borrarlo?");
                  if (x)
                    return true;
                  else
                    return false;
                  }

                  /*funcion que me permite cargar el modal de editar y adicional
                  carga los valores a los respectivos campos del modal*/

                 function editarCliente(cedula, nombres, apellidos, telefono, direccion){
                      $('#editarCliente').modal('show');
                      $('#cedula').val(cedula);
                      $('#nombres').val(nombres);
                      $('#apellidos').val(apellidos);
                      $('#telefono').val(telefono);
                      $('#direccion').val(direccion);
                  }

                  /*Funcion que permite cargar el modal de crear contrato*/
                 function crearCliente(){
                    $('#crearCliente').modal('show');
                 }

                   /*Este if me permite validar los mensajes exitosos de las transacciones
                   tales como actualizaciones, creaciones, eliminaciones de contratos exitosamente*/
                            @if(Session::has('success'))
                                        toastr.success("{{ Session::get('success') }}");
                                 
                              @endif

            </script>
@endsection