@extends('layout')
@section('content')

 <h2><center><b>Clientes</b></center></h2>
                 <button id="nuevoArticulo" class="btn btn-success add-more" onclick="crearContrato()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
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
                            <button type="button" name="editar" id="Editar" onclick="editarCliente()" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </td>
                        <td >
                            <button id="eliminar" class="btn btn-danger remove">
                              <span class="glyphicon glyphicon-remove"></span>
                            </button>     
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
                  
                  <form method="post" action="contratos/actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                      <input type="text" name="idContrato" id="idContrato" style="display: none">
                      <label class="form.control">Numero de Cedula:</label>
                      <input type="text" name="cedula" id="cedula">
                      <label class="form.control">Estado Contrato:</label>
                      <select class="form-control" id="estado" name="estado">
                    
                      <label class="form.control">Valor Prestado:</label>
                      <input type="number" name="valorPrestado" id="valorPrestado" class="form-control">
                      <label class="form.control">Fecha Prestamo:</label>
                      <input type="date" name="fechaPrestamo" id="fechaPrestamo" class="form-control">
                      <label class="form.control">Valor Intereses</label>
                      <input type="number" name="valorIntereses" id="valorIntereses" class="form-control">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </form>
                 
                </div>

              </div>
            </div>

            <!-- Modal Crear Contrato-->

            <div id="crearContrato" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Nuevo Contrato</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="contratos/crear">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="text" name="idContrato" id="idContrato" style="display: none">
                      <label class="form.control">Cliente:</label>
                      <select class="form-control" id="cliente" name="cliente">
                   
                          
                      </select>
                      <!--<input type="number" name="cedula" id="cedula" class="form-control">-->
                      <label class="form.control">Estado Contrato:</label>
                      <select class="form-control" id="estado" name="estado">
                      
                      </select>
                      <label class="form.control">Valor Prestado:</label>
                      <input type="number" name="valorPrestado" id="valorPrestado" class="form-control">
                      <label class="form.control">Fecha Prestamo:</label>
                      <input type="date" name="fechaPrestamo" id="fechaPrestamo" class="form-control">
                      <label class="form.control">Valor Intereses</label>
                      <input type="number" name="valorIntereses" id="valorIntereses" class="form-control">
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

                 function editarCliente(idContrato, cedula, nombres, apellidos, estadoContrato, valorPrestado, fechaPrestamo, valorIntereses){
                      $('#editarCliente').modal('show');
                      $('#idContrato').val(idContrato);
                      $('#cliente').val(cedula + " - " + nombres + " " + apellidos);
                      document.getElementById(estadoContrato).selected = "true";
                      $('#valorPrestado').val(valorPrestado);
                      $('#fechaPrestamo').val(fechaPrestamo);
                      $('#valorIntereses').val(valorIntereses);
                  }

                  /*Funcion que permite cargar el modal de crear contrato*/
                 function crearCliente(){
                    $('#crearContrato').modal('show');
                 }

                   /*Este if me permite validar los mensajes exitosos de las transacciones
                   tales como actualizaciones, creaciones, eliminaciones de contratos exitosamente*/
                            @if(Session::has('success'))
                                        toastr.success("{{ Session::get('success') }}");
                                 
                              @endif
            </script>
@endsection