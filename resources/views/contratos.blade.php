@extends('layout')
@section('content')

 <h2><center><b>Contratos</b></center></h2>
                 <button id="nuevoArticulo" class="btn btn-success add-more" onclick="crearContrato()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                  <table id="articulos" class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        <th>Cedula Cliente</th>
                        <th>Estado Contrato</th>
                        <th>Valor Prestado</th>
                        <th>Fecha Prestamo</th>
                        <th>Valor Intereses</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as $contrato)
                        <tr>
                        <td style="display:none">{{$contrato['idContrato']}}</td>
                        <td>{{$contrato['numCedula']}}</td>
                        <td>{{$contrato['estadoContrato']}}</td>
                        <td>{{$contrato['valorPrestado']}}</td>
                        <td>{{$contrato['fechaPrestamo']}}</td>
                        <td>{{$contrato['intereses']}}</td>
                        <td>
                            <button type="button" name="editar" id="Editar" onclick="editarContrato('{{$contrato['idContrato']}}', '{{$contrato['numCedula']}}', '{{$contrato['estadoContrato']}}', '{{$contrato['valorPrestado']}}', '{{$contrato['fechaPrestamo']}}', '{{$contrato['intereses']}}')" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
                </div>


                 <!-- Modal editar Contrato-->

            <div id="editarContrato" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Editar Contrato</h4>
                  </div>
                  
                  <form method="post" action="contratos/actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                      <input type="text" name="idContrato" id="idContrato" style="display: none">
                      <label class="form.control">Cedula:</label>
                      <input type="number" name="cedula" id="cedula" class="form-control">
                      <label class="form.control">Estado Contrato:</label>
                      <select class="form-control" id="estado" name="estado">
                        @foreach($estados as $estado)
                      	<option value="{{$estado->id_estado}}" id="{{$estado->nombre}}">{{$estado->nombre}}</option>
                        @endforeach
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
                        <option></option>
                        @foreach($clientes as $cliente)
                        <option>{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                        @endforeach
                          
                      </select>
                      <!--<input type="number" name="cedula" id="cedula" class="form-control">-->
                      <label class="form.control">Estado Contrato:</label>
                      <select class="form-control" id="estado" name="estado">
                        @foreach($estados as $estado)
                        <option value="{{$estado->id_estado}}" id="{{$estado->nombre}}">{{$estado->nombre}}</option>
                        @endforeach
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
            	
            	function confirmDelete()
                  {
                  var x = confirm("Esta seguro que desea borrarlo?");
                  if (x)
                    return true;
                  else
                    return false;
                  }


                 function editarContrato(idContrato, cedula, estadoContrato, valorPrestado, fechaPrestamo, valorIntereses){
                      $('#editarContrato').modal('show');
                      $('#idContrato').val(idContrato);
                      $('#cedula').val(cedula);
                      document.getElementById(estadoContrato).selected = "true";
                      $('#valorPrestado').val(valorPrestado);
                      $('#fechaPrestamo').val(fechaPrestamo);
                      $('#valorIntereses').val(valorIntereses);
                  }

                 function crearContrato(){
                    $('#crearContrato').modal('show');
                 }

                   /*Se valida que el registro se halla eliminado correctamente*/
                            @if(Session::has('success'))
                                        toastr.success("{{ Session::get('success') }}");
                                 
                              @endif
            </script>
@endsection