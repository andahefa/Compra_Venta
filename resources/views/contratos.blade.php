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
                              <button type="button" name="editar" id="Editar" onclick="editarContrato('{{$contrato['idContrato']}}', '{{$contrato['estadoContrato']}}', '{{$contrato['valorPrestado']}}', '{{$contrato['fechaPrestamo']}}', '{{$contrato['intereses']}}')" class="btn btn-primary">
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
                  
                      <div class="modal-body">
                        <input type="text" name="idContrato" id="idContrato" style="display: none">
                        <!--<label class="form.control">Cliente:</label>
                        <select class="form-control" id="cliente" name="cliente" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
                           unselectable="on"
                           onselectstart="return false;" 
                           onmousedown="return false;">>

                        </select>-->
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
                        <input type="text" name="cidContrato" id="cidContrato" style="display: none">
                           
                        <div>
                        <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading" align="center"><b>Articulos</b></div>
                          <div class="col-sm-12 col-xs-12">
                            <!--<button id="adicionarArticulos" class="btn btn-success add-more" onclick="adicionarArticulos()" style="margin: 20px 0px 0px 590px; padding: 4px 6px"><span class="glyphicon glyphicon-plus"> Adicionar</span></button>-->
                            <input type="button" name="cAdicionar" class="btn btn-success" value="Adicionar" style="margin: 10px 0px 0px 590px; padding: 4px 10px;" onclick="adicionarArticulos()">
                            <input type="button" name="cBtnBuscar" id="cBtnBuscar" value="Buscar" class="btn" style="margin: -50px 0px 0px 490px; padding: 4px 10px">
                            <input type="text" class="form-control" style="width: 50%; margin: -50px 0px 0px 144px; padding: 4px 10px;height: 31px" name="cTxtBuscar" id="cTxtBuscar" placeholder="Search">
                          </div>

                          <div class="panel-body">
                             <!-- Table -->
                          <table class="table" id="tablaArticulosSinContrato" style="width: 100%">
                                <thead style="text-align: center">
                              <tr>
                                <th class="text-center">Nombre Cliente</th>
                                <th class="text-center">Cedula Cliente</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Ver Detalle</th>
                                <th class="text-center">Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($articulos as $articulo)
                                <tr id="{{$articulo->id_articulo}}-articulosSinContrato">
                                <td style="display:none">{{$articulo->id_articulo}}</td>
                                <td style="text-align: center">{{$articulo->nombres}} {{$articulo->apellidos}}</td>
                                <td style="text-align: center">{{$articulo->num_cedula}}</td>
                                <td style="text-align: center">{{$articulo->categoria}}</td>
                                <td><div style="text-align: center"><p style="background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;">{{$articulo->estado}}</p></div></td>
                                <td><div style="text-align: center"><input type="button" name="verDetalle" class="btn btn-warning" value="Ver Detalle" style="padding: 1px 5px; font-size: 12px; text-align: center" onclick="detalleArticulo('{{$articulo->id_articulo}}','{{$articulo->nombres}} {{$articulo->apellidos}}', '{{$articulo->num_cedula}}', '{{$articulo->categoria}}', '{{$articulo->estado}}', '{{$articulo->marca}}', '{{$articulo->referencia}}', '{{$articulo->descripcion}}')"></div></td>
                                <td><div style="text-align: center"><input type="checkbox" class="" name="chk_{{$articulo->id_articulo}}" value="{{$articulo->id_articulo}},{{$articulo->nombres}} {{$articulo->apellidos}},{{$articulo->num_cedula}},{{$articulo->categoria}},{{$articulo->estado}}, {{$articulo->marca}}, {{$articulo->referencia}}, {{$articulo->descripcion}}" style="margin: 5px 27px;"/></div></td>
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
                            <button id="cEliminarArticulo" name="cEliminarArticulo" class="btn btn-danger add-more" style="margin: 20px 0px 0px 590px; padding: 4px 6px"><span class="glyphicon glyphicon-remove"> Eliminar</span></button>
                          </div>
                          <div class="panel-body">
                             <!-- Table -->
                          <table class="table" id="tablaArticulosAgregados" style="width: 100%">
                                <thead>
                              <tr>
                                <th class="text-center">Nombre Cliente</th>
                                <th class="text-center">Cedula Cliente</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Ver Detalle</th>
                                <th class="text-center">Seleccionar</th>
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
                        <select class="form-control" id="cEstado" name="cEstado">
                          @foreach($estados as $estado)
                          <option value="{{$estado->id_estado}}" id="{{$estado->id_estado}}">{{$estado->nombre}}</option>
                          @endforeach
                        </select>
                        <label class="form.control">Valor Prestado:</label>
                        <input type="number" name="cValorPrestado" id="cValorPrestado" class="form-control">
                        <label class="form.control">Fecha Prestamo:</label>
                        <input type="date" name="cFechaPrestamo" id="cFechaPrestamo" class="form-control">
                        <label class="form.control">Valor Intereses</label>
                        <input type="number" name="cValorIntereses" id="cValorIntereses" class="form-control" style="width: 45%; margin: 0px; color: #787878;" readonly="">
                        <input type="button" class="btn btn-info" value="Calcular" id="cCalcular" name="cCalcular" style="margin: -32px 315px 15px; padding: 4px 8px;" onclick="calcularIntereses(cValorPrestado.value,cValorIntereses.id)"></input>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-success" onclick="guardarContrato()" value="Guardar">Guardar</button>
                    </div>
                      
                  </div>

                </div>


                <!-- Modal detalle de articulo-->

                 <div id="detalleArticulo" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-sm" style="width: 35%">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" align="center" style="font-size: 16px">Detalle Articulo</h4>
                              </div>
                              <div class="modal-body">

                                        <label style="font-size: 13px">Nombres Cliente:</label>
                                        <input type="text" id="nombresCliente" name="nombresCliente" class="form-control" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Cedula Cliente:</label>
                                        <input type="text" id="cedulaCliente" name="cedulaCliente" class="form-control" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Categoria Articulo:</label>
                                        <input type="text" class="form-control" id="categoria" name="categoria" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Estado Articulo:</label>
                                        <input type="text" class="form-control" id="destado" name="destado" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Marca:</label>
                                        <input type="text" class="form-control" id="marca" name="marca" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Referencia:</label>
                                        <input type="text" class="form-control" id="referencia" name="referencia" style="height: 25px; font-size: 13px; color: #787878" readonly="">
                                        <label style="font-size: 13px">Descripción:</label>
                                        <!--<input type="text" class="form-control" id="descripcion" name="descripcion" style="height: 25px; font-size: 13px; color: #787878" readonly="">-->
                                        <textarea rows="4" cols="50" name="descripcion" id="descripcion" form="usrform" class="form-control" style="height: 25px; font-size: 13px; color: #787878" readonly=""></textarea>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" onclick="cerrarModal('#detalleArticulo')" style="padding: 2px 8px">Close</button>
                                        </div>
                                   
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

                    /*Funcion que se encarga de calcular los intereses
                    del contrato*/
                    function calcularIntereses(valorPrestado, idElemento){
            
                      var valorIntereses = parseFloat(valorPrestado)/100*10;
                      $('#'+idElemento).val(valorIntereses);

                    }

                    /*Funcion que permite adicionar los articulos a la tabla de articulos
                    seleccionados*/
                    function adicionarArticulos(){

                        $("input:checkbox:checked").each(function() {
                             //alert($(this).val());
                             var datos = $(this).val().split(",");
                             if(datos[1] != null){

                              var table = document.getElementById("tablaArticulosAgregados");
                              var row = table.insertRow(table.rows.length);
                              row.id = datos[0]+":articulosAgregados";
                              row.style = 'text-align: center';

                              var cell1 = row.insertCell(0);
                              cell1.style = "display:none";
                              var cell2 = row.insertCell(1);
                              var cell3 = row.insertCell(2);
                              var cell4 = row.insertCell(3);
                              
                              var cell5 = row.insertCell(4);
                              var cell6 = row.insertCell(5);
                              var cell7 = row.insertCell(6);

                              cell1.innerHTML = datos[0];
                              cell2.innerHTML = datos[1];
                              cell3.innerHTML = datos[2];
                              cell4.innerHTML = datos[3];
                              cell5.innerHTML = datos[4];

                              /*Se pinta el boton de ver detalle en la tabla
                              articulos agregados*/
                              cell6.innerHTML = "<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+datos[0]+",'"+datos[1]+"','"+datos[2]+"','"+datos[3]+"','"+datos[4]+"','"+datos[5]+"','"+datos[6]+"','"+datos[7]+"')\"></div></td>";

                              /*Se pinta el checkbox en la tabla articulos agregados*/
                              cell7.innerHTML = "<td><input type='checkbox' name='check1' style='margin: 5px 27px' /></td>"

                              /*Se elimina la fila del articulo en la tabla de articulos*/
                              $('#'+datos[0]+'-articulosSinContrato').remove();
                              
                             
                              }
                        });
                    }

                    /*Funcion que permita cargar el detalle del articulo en el modal*/
                    function detalleArticulo(idArticulo, nombres, cedula, categoria, estado, marca, referencia, descripcion){
                      $('#detalleArticulo').modal('show');
                      $('#nombresCliente').val(nombres);
                      $('#cedulaCliente').val(cedula);
                      $('#categoria').val(categoria);
                      $('#destado').val(estado);
                      $('#marca').val(marca);
                      $('#referencia').val(referencia);
                      $('#descripcion').val(descripcion);

                    }

                    /*Funcion que permite cerrar un modal especificamente*/
                    function cerrarModal(id){
                      $(id).modal('toggle');
                    }

                    /*Permite que al cerrar el modal de ver detalle
                    no se pierda el scroll del modal de crear contrato*/
                    $('.modal').on('hidden.bs.modal', function (e) {
                      if($('.modal').hasClass('in')) {
                      $('body').addClass('modal-open');
                    }    
                    });
                              
                    function guardarContrato(){
                      
                      var datos = [];
                      var idEstadoContrato = $('#cEstado').val();
                      var valorPrestado = $('#cValorPrestado').val();
                      var fechaPrestamo = $('#cFechaPrestamo').val();
                      var valorIntereses = $('#cValorIntereses').val();

                      var i = 0;
                      
                      /*$('#tablaArticulosAgregados tr').each(function() {
                    
                      $(this).find("td").each(function(){
                        var idArticulo = $(this).html(); 
                        datos[i] = ([idArticulo,idEstadoContrato,valorPrestado,fechaPrestamo,valorIntereses]);
                        //datos[i] = {idArticulo:idArticulo,idEstadoContrato:idEstadoContrato,valorPrestado:valorPrestado,fechaPrestamo:fechaPrestamo,valorIntereses:valorIntereses};
                        i++;
                          /*esta linea sirve para que solo objenca el id del proudcto asociado y se salga*/
                        /*return false; 
                      });


                    });*/


                    $('#tablaArticulosAgregados tr').each(function() {
                      if(i>0){
                        var idArticulo = $(this).find("td").eq(0).html();
                        var cedula = $(this).find("td").eq(2).html();
                        datos[i-1] = ([idArticulo,cedula,idEstadoContrato,valorPrestado,fechaPrestamo,valorIntereses]);
                      }
                      i++;
                  });
                       $.ajax({
                        
                              type:'post',
                              url:"contratos/crear",
                               headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                              },
                              dataType: "JSON",
                              data:{
                                  'arrayDatos': datos
                              },
                             
                              success: function(result){
                                    
                                    if(result == 2){
                                      alert("Los articulos seleccionados deben pertenecer al mismo cliente");
                                    }
                                    else{
                                      location.reload();  
                                    }
                                                                                       
                              },
                               error: function(data){                                    

                              }   

                          }); 
                    }              

              </script>
  @endsection