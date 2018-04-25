  @extends('layout')
  @section('content')

   <h2><center><b>Contratos</b></center></h2>
                   <button id="nuevoArticulo" class="btn btn-success add-more" onclick="crearContrato()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th>Cedula Cliente</th>
                          <th>Nombres Cliente</th>
                          <th>Apellidos Cliente</th>
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
                          <td>{{$contrato['estadoContrato']}}</td>
                          <td>{{$contrato['valorPrestado']}}</td>
                          <td>{{$contrato['fechaPrestamo']}}</td>
                          <td>{{$contrato['intereses']}}</td>
                          <td>
                              <button type="button" name="editar" id="Editar" onclick="editarContrato('{{$contrato['idContrato']}}', '{{$contrato['numCedula']}}', '{{$contrato['nombresCliente']}}', '{{$contrato['apellidosCliente']}}', '{{$contrato['estadoContrato']}}', '{{$contrato['valorPrestado']}}', '{{$contrato['fechaPrestamo']}}', '{{$contrato['intereses']}}')" class="btn btn-primary">
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
                        <label class="form.control">Cliente:</label>
                        <select class="form-control" id="cliente" name="cliente" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
                           unselectable="on"
                           onselectstart="return false;" 
                           onmousedown="return false;">>
                          
                          @foreach($clientes as $cliente)
                          <option>{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                          @endforeach
                            
                        </select>
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
                        <input type="number" name="valorIntereses" id="valorIntereses" class="form-control" style="width: 50%; margin: 0px; color: #787878;" readonly="">
                        <input type="button" class="btn btn-warning" value="Calcular" style="margin: -56px 0px 0px 295px; padding: 4px 8px;" onclick="calcularIntereses(valorPrestado.value, valorIntereses.id )"></input>
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
                <div class="modal-dialog modal-lg" style="width: 750px; margin: auto;">

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
                          @foreach($clientes as $cliente)
                          <option>{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                          @endforeach
                            
                        </select>
                           
                        <div>
                        <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading" align="center"><b>Articulos</b></div>
                          <div class="col-sm-12 col-xs-12">
                            <!--<button id="adicionarArticulos" class="btn btn-success add-more" onclick="adicionarArticulos()" style="margin: 20px 0px 0px 590px; padding: 4px 6px"><span class="glyphicon glyphicon-plus"> Adicionar</span></button>-->
                            <input type="button" name="" class="btn btn-success" value="adicionar" style="margin: 10px 0px 0px 590px; padding: 4px 10px;" onclick="adicionarArticulos()">
                            <input type="button" name="" value="Buscar" class="btn" style="margin: -50px 0px 0px 490px; padding: 4px 10px">
                            <input type="text" class="form-control" style="width: 50%; margin: -50px 0px 0px 144px; padding: 4px 10px;height: 31px" name="" placeholder="Search">
                          </div>
                          

                          <div class="panel-body">
                             <!-- Table -->
                          <table class="table" style="width: 100%">
                                <thead>
                              <tr>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Marca</th>
                                <th>Referencia</th>
                                <th>Ver Detalle</th>
                                <th>Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($articulos as $articulo)
                                <tr>
                                <td style="display:none">{{$articulo->id_articulo}}</td>
                                <td>{{$articulo->categoria}}</td>
                                <td>{{$articulo->estado}}</td>
                                <td>{{$articulo->marca}}</td>
                                <td>{{$articulo->referencia}}</td>
                                <td><input type="button" name="verDetalle" class="btn btn-warning" value="Ver Detalle" style="padding: 1px 5px; font-size: 12px" align="center"></td>
                                <td><input type="checkbox" class="" name="chk_{{$articulo->id_articulo}}" value="{{$articulo->id_articulo}},{{$articulo->categoria}},{{$articulo->estado}},{{$articulo->marca}},{{$articulo->referencia}}" style="margin: 5px 27px" /></td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          </div>
                          </div>

                        </div>

                        <div>
                        <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading" align="center"><b>Articulos Seleccionados</b></div>
                            <div class="col-sm-12 col-xs-12">
                            <button id="aliminarArticulo" class="btn btn-danger add-more" style="margin: 20px 0px 0px 590px; padding: 4px 6px"><span class="glyphicon glyphicon-remove"> Eliminar</span></button>
                          </div>
                          <div class="panel-body">
                             <!-- Table -->
                          <table class="table" id="tablaArticulosAgregados" style="width: 100%">
                                <thead>
                              <tr>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Marca</th>
                                <th>Referencia</th>
                                <th>Ver Detalle</th>
                                <th>Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                           
                            </tbody>
                          </table>
                          </div>
                          </div>

 
                          </div>
                       
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
                        <input type="number" name="cvalorIntereses" id="cvalorIntereses" class="form-control" style="width: 45%; margin: 0px; color: #787878;" readonly="">
                        <input type="button" class="btn btn-info" value="Calcular" style="margin: -32px 315px 15px; padding: 4px 8px;" onclick="calcularIntereses(valorPrestado.value,cvalorIntereses.id)"></input>
                    
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

                   function editarContrato(idContrato, cedula, nombres, apellidos, estadoContrato, valorPrestado, fechaPrestamo, valorIntereses){
                        $('#editarContrato').modal('show');
                        $('#idContrato').val(idContrato);
                        $('#cliente').val(cedula + " - " + nombres + " " + apellidos);
                        document.getElementById(estadoContrato).selected = "true";
                        $('#valorPrestado').val(valorPrestado);
                        $('#fechaPrestamo').val(fechaPrestamo);
                        $('#valorIntereses').val(valorIntereses);
                    }

                    /*Funcion que permite cargar el modal de crear contrato*/
                   function crearContrato(){
                      $('#crearContrato').modal('show');
                   }

                     /*Este if me permite validar los mensajes exitosos de las transacciones
                     tales como actualizaciones, creaciones, eliminaciones de contratos exitosamente*/
                              @if(Session::has('success'))
                                          toastr.success("{{ Session::get('success') }}");
                                   
                                @endif

                    function calcularIntereses(valorPrestado, idElemento){
            
                      var valorIntereses = parseFloat(valorPrestado)/100*10;
                      $('#'+idElemento).val(valorIntereses);

                    }

                    function adicionarArticulos(){

                        $("input:checkbox:checked").each(function() {
                             //alert($(this).val());
                             var datos = $(this).val().split(",");
                             if(datos[1] != null){

                              var table = document.getElementById("tablaArticulosAgregados");
                              var row = table.insertRow(table.rows.length);
                              var cell1 = row.insertCell(0);
                              var cell2 = row.insertCell(1);
                              var cell3 = row.insertCell(2);
                              var cell4 = row.insertCell(3);
                              var cell5 = row.insertCell(4);
                              var cell6 = row.insertCell(5);
                            

                              cell1.innerHTML = datos[1];
                              cell2.innerHTML = datos[2];
                              cell3.innerHTML = datos[3];
                              cell4.innerHTML = datos[4];
                              cell5.innerHTML = "<td><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px' align='center'></td>";
                              cell6.innerHTML = "<td><input type='checkbox' name='check1' style='margin: 5px 27px' /></td>"
                             
                           }
                        });
                    }

                                          

              </script>
  @endsection