  @extends('layout')
  @section('content')
  <script>
    /*Se eliminan las clases activas de cada opcion*/
    $( "#opcionInventarioArticulos" ).removeClass( "active" );
    $( "#opcionCategorias" ).removeClass( "active" );
    $( "#opcionClientes" ).removeClass( "active" );
    $( "#opcionPagoIntereses" ).removeClass( "active" );
    $( "#opcionContratos" ).addClass( "active" );
  </script>
   <h2><center><b>Contratos</b></center></h2>
                   <button id="nuevoArticulo" class="btn btn-success add-more" onclick="cargarModal(1, null)"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="display: none">Cedula Cliente</th>
                          <th class="text-center">Id Contrato</th>
                          <th class="text-center">Cliente</th>
                          <th class="text-center">Estado Contrato</th>
                          <th class="text-center">Articulos Asociados</th>
                          <th class="text-center">Valor Prestado</th>
                          <th class="text-center" style="display: none">Fecha Prestamo</th>
                          <th class="text-center">Fecha Vencimiento</th>
                          <th class="text-center" style="display: none">Valor Intereses</th>
                          <th class="text-center">Cuotas Vencidas</th>
                          <th class="text-center">Editar</th>
                          <th class="text-center">Ver Detalle</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($datos as $contrato)
                          <tr align="center">
                          <td id="idContrato">{{$contrato['idContrato']}}</td>
                          <td id="cedula{{$contrato['idContrato']}}" style="display: none">{{$contrato['cedulaCliente']}}</td>
                          <td id="nombres{{$contrato['idContrato']}}" style="display: none">{{$contrato['nombres']}}</td>
                          <td id="apellidos{{$contrato['idContrato']}}" style="display: none">{{$contrato['apellidos']}}</td>
                          <td id="nombreCompleto{{$contrato['idContrato']}}" >{{$contrato['nombres']}} {{$contrato['apellidos']}}</td>
                          <td id="estadoContrato{{$contrato['idContrato']}}">{{$contrato['estadoContrato']}}</td>
                          <td> 
                            <!--recorre los articulos que tiene asociados el contrato-->
                            @foreach(explode(',', $contrato['articulo']) as $articulo) 
                            <!--recorre los atributos del contrato y busca las categorias de los 
                              articulos que estan asociados al contrato-->
                                <?php $a = explode('-', $articulo); ?> 
                                <p style="background: #A4A4A4;padding: 1px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; text-align: center;">{{$a[6]}}</p>
                            
                            @endforeach
                          </td>
                          <td id="valorPrestado{{$contrato['idContrato']}}">{{$contrato['valorPrestado']}}</td>
                          <td id="fechaPrestamo{{$contrato['idContrato']}}" style="display: none">{{$contrato['fechaPrestamo']}}</td>
                          <td id="fechaVencimiento{{$contrato['idContrato']}}">{{$contrato['fechaVencimiento']}}</td>
                          <td id="intereses{{$contrato['idContrato']}}" style="display: none">{{$contrato['intereses']}}</td>
                          <div style="float: left; clear: none;" id="divCuotasVencidas"><td id="cuotasVencidas">{{$contrato['cuotasAtrasadas']}} <button name="btnCuotasVencidas" class="btn btn-danger" value="Cuotas" style="padding: 2px 4px">cuotas</button></td></div>
                          <td>
                              <button type="button" name="editar" id="Editar" onclick="cargarModal(2,'{{$contrato['idContrato']}}')" class="btn btn-primary">
                              <span class="glyphicon glyphicon-edit"></span>
                              </button>
                          </td>
                          <td>
                           <div type="button" name="verDetalle" id="verDetalle" class="btn btn-warning" style="padding: 2px 10px" onclick="cargarModal(3,'{{$contrato['idContrato']}}')">
                              <span class="glyphicon glyphicon-zoom-in"></span>
                           </div>
                          </td>
                          </tr>

                          @endforeach
                      </tbody>
                    </table>
                </div>
                  </div>


                 
              <!-- Modal Crear y Editar Contrato-->

              <div id="crearYEditarContrato" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg" style="width: 750px; margin: auto;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" align="center" id="tituloModalCrearYEditar"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="cidContrato" id="cidContrato" style="display: none">
                           
                        <div>
                        <div class="panel panel-primary" id="panelArticulosSinAsociar">
                          <!-- Default panel contents -->
                          <div class="panel-heading" align="center"><b>Articulos Sin Asociar</b></div>
                          <div class="col-sm-12 col-xs-12">
                            <!--<button id="adicionarArticulos" class="btn btn-success add-more" onclick="adicionarArticulos()" style="margin: 20px 0px 0px 590px; padding: 4px 6px"><span class="glyphicon glyphicon-plus"> Adicionar</span></button>-->
                            <input type="button" name="cAdicionar" class="btn btn-success" value="Adicionar" style="margin: 10px 0px 0px 590px; padding: 4px 10px;" onclick="adicionarArticulos()">
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
                                <th class="text-center" id="seleccionarTablaArticulosSinContrato">Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody id="bodyArticulosSinContrato">

                            </tbody>
                          </table>
                          </div>
                          </div>

                        </div>

                        <div>
                        <div class="panel panel-primary" id="panelArticulosAsociados">
                          <!-- Default panel contents -->
                          <div class="panel-heading" align="center"><b>Articulos Seleccionados</b></div>
                            <div class="col-sm-12 col-xs-12">
                            <button id="cEliminarArticulo" name="cEliminarArticulo" class="btn btn-danger add-more" style="margin: 20px 0px 0px 590px; padding: 4px 10px" onclick="eliminarArticulos()"> Eliminar</button>
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
                                <th class="text-center" id="seleccionarTablaArticulosAgregados">Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody id="bodyArticulosAgregados">
                              
                           
                            </tbody>
                          </table>
                          </div>
                          </div>

 
                          </div>
                       
                        <!--<input type="number" name="cedula" id="cedula" class="form-control">-->
                        <label class="form.control" id="labelEstadoContrato">Estado Contrato:</label>
                        <select class="form-control" id="cEstado" name="cEstado">
                          @foreach($estados as $estado)
                          <option value="{{$estado->id_estado}}" id="{{$estado->nombre}}">{{$estado->nombre}}</option>
                          @endforeach
                        </select>
                        <label class="form.control">Valor Prestado:</label>
                        <input type="number" name="cValorPrestado" id="cValorPrestado" class="form-control">
                        <label class="form.control">Fecha Prestamo:</label>
                        <input type="date" name="cFechaPrestamo" id="cFechaPrestamo" class="form-control">
                        <label class="form.control">Valor Intereses</label>
                        <input type="number" name="cValorIntereses" id="cValorIntereses" class="form-control" style="width: 45%; margin: 0px; color: #555;" readonly="">
                        <input type="button" class="btn btn-info" value="Calcular" id="cCalcular" name="cCalcular" style="margin: -32px 315px 15px; padding: 4px 8px;" onclick="calcularIntereses(cValorPrestado.value,cValorIntereses.id)"></input>
                    
                    </div>
                    <div class="modal-footer">
                      <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="guardarYEditar" class="btn btn-success" onclick="" value="Guardar">Guardar</button>
                    </div>
                      
                  </div>

                </div>


  <div id="cuotasVencidas" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>



                <!-- Modal detalle de articulo-->

                 <div id="detalleArticulo" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-sm" style="width: 35%">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" onclick="cerrarModal('#detalleArticulo')">&times;</button>
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
                function recargarPagina(){
                  location.reload();
                }
                    /*funcion que me permite cargar el modal de crear y editar un contro. Adicional
                    carga los valores a los respectivos campos del modal dependiendo si es editar
                    o crear */
                   function cargarModal(accion, idContrato){

                    $('#bodyArticulosSinContrato').empty();
                     $('#bodyArticulosAgregados').empty();

                    switch(accion){
                      case 1:
                        $('#crearYEditarContrato').modal('show');
                        $('#tituloModalCrearYEditar').text('Nuevo Contrato');
                       
                       //Se recibe el objeto $articulos enviado desde el controlador 
                       var articulos = '<?php echo $articulos?>';


                       var JSONObject = JSON.parse(articulos);
                       var idArticulo, cedula, nombres, apellidos, categoria, estado, marca, referencia, descripcion ;
                       
                       //key, es la posicion del objeto
                        for (var key in JSONObject) {

                          /*Se declaran la variables donde van a quedar almacenados los valores del objeto en esa
                          iteracion*/

                          idArticulo = JSONObject[key]["id_articulo"];
                          cedula = JSONObject[key]["num_cedula"];
                          nombres = JSONObject[key]["nombres"];
                          apellidos = JSONObject[key]["apellidos"];
                          categoria = JSONObject[key]["categoria"];
                          estado = JSONObject[key]["estado"];
                          marca = JSONObject[key]["marca"];
                          referencia = JSONObject[key]["referencia"];
                          descripcion = JSONObject[key]["descripcion"];

                          //Se crea la fila con sus respectivas columas y se agrega a la tabla
                          $row = $("<tr id="+idArticulo+"-articulosSinContrato></tr>");
                          $row.append("<td style='display:none'>"+idArticulo+"</td>");
                          $row.append("<td style='text-align: center'>"+ nombres + " " +apellidos+"</td>");
                          $row.append("<td style='text-align: center'>"+ cedula +"</td>");
                          $row.append("<td style='text-align: center'>"+ categoria +"</td>");
                          $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ estado + "</p></div></td>");
                          $row.append("<td style='display:none'>"+ marca +"</td>");
                          $row.append("<td style='display:none'>"+ referencia +"</td>");
                          $row.append("<td style='display:none'>"+ descripcion +"</td>");

                          /*Se pinta el boton de ver detalle en la tabla*/
                          $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + idArticulo + "','" + nombres + " " + apellidos + "','" + cedula + "','"+ categoria + "','" + estado + "','" + marca + "','" + referencia + "','" + descripcion + "')\"></div></td>");
                          /*Se pinta el checkbox de cada fila*/
                          $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ idArticulo + "' value=\"" + idArticulo + "," + nombres + " " + apellidos + "," + cedula + "," + categoria + "," + estado + "," + marca + "," + referencia + "," + descripcion +"\" style='margin: 5px 27px;'/></div></td>");
                          $('#tablaArticulosSinContrato').append($row);

                          $("#guardarYEditar").attr("onclick","guardarContrato()");
                        }
                                
                        break;

                      case 2:

                        $('#crearYEditarContrato').modal('show');
                        $('#tituloModalCrearYEditar').text('Editar Contrato');
                        document.getElementById($('#estadoContrato'+idContrato).text()).selected = "true";
                        $('#cFechaPrestamo').val($('#fechaPrestamo'+idContrato).text());
                        $('#cValorPrestado').val($('#valorPrestado'+idContrato).text());
                    
                        $('#cValorIntereses').val($('#intereses'+idContrato).text());
      
                        var JSONObject = JSON.parse('<?php echo json_encode($datos)?>');
                        for (var key in JSONObject) {
                            
                            var idCont = JSONObject[key]["idContrato"];
                            
                            var nombres = JSONObject[key]["nombres"];
                            var apellidos = JSONObject[key]["apellidos"];
                            var cedula = JSONObject[key]["cedulaCliente"];
                            var articulos = JSONObject[key]["articulo"].split(",");


                            var atributosArticulo, idArticulo, categoriaArticulo, estado, marca, referencia, descripcion;
                            if(idContrato == idCont){
                              for(var i = 0; i < articulos.length; i++){
                                  atributosArticulo = articulos[i].split("-");
                                  idArticulo = atributosArticulo[5];
                                  categoriaArticulo = atributosArticulo[6];
                                  estado = atributosArticulo[7];
                                  marca = atributosArticulo[8];
                                  referencia = atributosArticulo[9];
                                  descripcion = atributosArticulo[10];

                                  var $row = $("<tr id="+idArticulo+"-articulosAgregados></tr>");
                                  $row.append("<td style='display:none'>"+idArticulo+"</td>");
                                  $row.append("<td style='text-align: center'>" + nombres + " " + apellidos + "</td>");
                                  $row.append("<td style='text-align: center'>" + cedula + "</td>");
                                  $row.append("<td style='text-align: center'>"+ categoriaArticulo +"</td>");
                                  $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ estado + "</p></div></td>");

                                  /*Se pinta el boton de ver detalle en la tabla*/
                                  $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + idArticulo + "','" + nombres + " " + apellidos + "','" + cedula + "','" + categoriaArticulo + "','" + estado + "','" + marca + "','" + referencia + "','" + descripcion + "')\"></div></td>");
                                  /*Se pinta el checkbox de cada fila*/
                                  $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ idArticulo + "' id='chk_"+ idArticulo + "' value=\"" + idArticulo + "," + nombres + " " + apellidos + "," + cedula + "," + categoriaArticulo + "," + estado + "," + marca + "," + referencia + "," + descripcion +"\" style='margin: 5px 27px;'/></div></td>");

                                   /*Se elimina la fila del articulo en la tabla de articulos*/
                                  $('#tablaArticulosAgregados').append($row);
                                  $("#guardarYEditar").attr("onclick","editarContrato("+idContrato+")");
                              }

                              break;
                            
                          }

                        }

                        /*Se capturan los id's de los articulos que estan en la tabla de articilos
                        seleccionados para identificarlos y no adicionarlos en la tabla articulos sin
                        asocias*/
                        var idArticulos = [];
                        var i = 0;

                        $('#tablaArticulosAgregados tr').each(function() {

                          if(i>0){
                            idArticulos.push($(this).find("td").eq(0).html());

                          }

                          i++;
                                    
                        });
                       var articulos = '<?php echo $articulos?>';
                       var JSONObject = JSON.parse(articulos);
                       var idArticulo, cedula, nombres, apellidos, categoria, estado, marca, referencia, descripcion ;
                       
                       //key, es la posicion del objeto
                        for (var key in JSONObject) {

                          /*Se declaran la variables donde van a quedar almacenados los valores del objeto en esa
                          iteracion*/

                          idArticulo = JSONObject[key]["id_articulo"];
                          /*Se busca el articulo en la tabla de articulos adicionados, si no esta
                          se crea la fila en la tabla de articulos sin asociar */
                            if(idArticulos.indexOf(idArticulo.toString()) < 0){

                              cedula = JSONObject[key]["num_cedula"];
                              nombres = JSONObject[key]["nombres"];
                              apellidos = JSONObject[key]["apellidos"];
                              categoria = JSONObject[key]["categoria"];
                              estado = JSONObject[key]["estado"];
                              marca = JSONObject[key]["marca"];
                              referencia = JSONObject[key]["referencia"];
                              descripcion = JSONObject[key]["descripcion"];

                              //Se crea la fila con sus respectivas columas y se agrega a la tabla
                              $row = $("<tr id="+idArticulo+"-articulosSinContrato></tr>");
                              $row.append("<td style='display:none'>"+idArticulo+"</td>");
                              $row.append("<td style='text-align: center'>"+ nombres + " " +apellidos+"</td>");
                              $row.append("<td style='text-align: center'>"+ cedula +"</td>");
                              $row.append("<td style='text-align: center'>"+ categoria +"</td>");
                              $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ estado + "</p></div></td>");
                              $row.append("<td style='display:none'>"+ marca +"</td>");
                              $row.append("<td style='display:none'>"+ referencia +"</td>");
                              $row.append("<td style='display:none'>"+ descripcion +"</td>");

                              /*Se pinta el boton de ver detalle en la tabla*/
                              $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + idArticulo + "','" + nombres + " " + apellidos + "','" + cedula + "','"+ categoria + "','" + estado + "','" + marca + "','" + referencia + "','" + descripcion + "')\"></div></td>");
                              /*Se pinta el checkbox de cada fila*/
                              $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ idArticulo + "' id='chk_"+ idArticulo + "' value=\"" + idArticulo + "," + nombres + " " + apellidos + "," + cedula + "," + categoria + "," + estado + "," + marca + "," + referencia + "," + descripcion +"\" style='margin: 5px 27px;'/></div></td>");
                              $('#tablaArticulosSinContrato').append($row);

                              $("#guardarYEditar").attr("onclick","editarContrato("+idContrato+")");

                             
                            }
                      
                        }
                        break;

                        case 3:

                        $('#crearYEditarContrato').modal('show');
                        $('#tituloModalCrearYEditar').text('Detalle Contrato');
                        
                        $('#cValorPrestado').val($('#valorPrestado'+idContrato).text());
                        $('#cFechaPrestamo').val($('#fechaPrestamo'+idContrato).text());
                        $('#cValorIntereses').val($('#intereses'+idContrato).text());

                        var JSONObject = JSON.parse('<?php echo json_encode($datos)?>');
                        for (var key in JSONObject) {
                            
                            var idCont = JSONObject[key]["idContrato"];
                            var nombres = JSONObject[key]["nombres"];
                            var apellidos = JSONObject[key]["apellidos"];
                            var cedula = JSONObject[key]["cedulaCliente"];
                            var articulos = JSONObject[key]["articulo"].split(",");

                            /*Se eliminan los elementos que no son necesarios para el modal de ver detalle
                            del contrato*/

                            $('#cEliminarArticulo').remove();
                            $('#panelArticulosSinAsociar').remove();
                            $('#cEstado').remove();
                            $("<input id='cEstado' class='form-control' style='color: #555;' readonly></input>").insertAfter("#labelEstadoContrato");
                            $('#cEstado').val($('#estadoContrato'+idContrato).text());
                            $('#tablaArticulosAgregados').append($row);
                            $('#cEstado').attr('readonly', 'true');
                            $('#cValorPrestado').attr('readonly', 'true');
                            $('#cValorPrestado').attr('style', 'color: #555');
                            $('#cFechaPrestamo').attr('readonly', 'true');
                            $('#cFechaPrestamo').attr('style', 'color: #555');
                            $('#cCalcular').remove();
                            $('#guardarYEditar').remove();
                            $('#seleccionarTablaArticulosAgregados').remove();
                            
                            var atributosArticulo, idArticulo, categoriaArticulo, estado, marca, referencia, descripcion;
                            if(idContrato == idCont){
                              for(var i = 0; i < articulos.length; i++){
                                  atributosArticulo = articulos[i].split("-");
                                  idArticulo = atributosArticulo[5];
                                  categoriaArticulo = atributosArticulo[6]; 
                                  console.log("Categoria Articulo:"+categoriaArticulo);
                                  estado = atributosArticulo[7];
                                  marca = atributosArticulo[8];
                                  referencia = atributosArticulo[9];
                                  descripcion = atributosArticulo[10];

                                  var $row = $("<tr id="+idArticulo+"-articulosAgregados></tr>");
                                  $row.append("<td style='display:none'>"+idArticulo+"</td>");
                                  $row.append("<td style='text-align: center'>" + nombres + " " + apellidos + "</td>");
                                  $row.append("<td style='text-align: center'>" + cedula + "</td>");
                                  $row.append("<td style='text-align: center'>"+ categoriaArticulo +"</td>");
                                  $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ estado + "</p></div></td>");

                                  /*Se pinta el boton de ver detalle en la tabla*/
                                  $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + idArticulo + "','" + nombres + " " + apellidos + "','" + cedula + "','" + categoriaArticulo + "','" + estado + "','" + marca + "','" + referencia + "','" + descripcion + "')\"></div></td>");
                               

                                  $('#tablaArticulosAgregados').append($row);
                                  $("#close").attr("onclick","recargarPagina()");
                            
                              }

                              break;
                            
                          }

                        }
                         break;

                      }
                    
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

                                $row = $("<tr id="+datos[0]+"-articulosAgregados></tr>");
                                $row.append("<td style='display:none'>"+datos[0]+"</td>");
                                $row.append("<td style='text-align: center'>" + datos[1] + "</td>");
                                $row.append("<td style='text-align: center'>" + datos[2] + "</td>");
                                $row.append("<td style='text-align: center'>"+ datos[3] +"</td>");
                                $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ datos[4] + "</p></div></td>");

                                /*Se pinta el boton de ver detalle en la tabla*/
                                $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + datos[0] + "','" + datos[1] + "','" + datos[2] + "','" + datos[3] + "','" + datos[4] + "','" + datos[5] + "','" + datos[6] + "','" + datos[7] + "')\"></div></td>");
                                /*Se pinta el checkbox de cada fila*/
                                $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ datos[0] + "' value=\"" + datos[0] + "," + datos[1] + "," + datos[2] + "," + datos[3] + "," + datos[4] + "," + datos[5] + "," + datos[6] + "," + datos[7] +"\" style='margin: 5px 27px;'/></div></td>");

                                 /*Se elimina la fila del articulo en la tabla de articulos*/
                                $('#'+datos[0]+'-articulosSinContrato').remove();
                                $('#tablaArticulosAgregados').append($row);
                              
                             
                              }
                        });
                    }

                    function eliminarArticulos(){

                          $("input:checkbox:checked").each(function() {
                             //alert($(this).val());
                             var datos = $(this).val().split(",");
                             if(datos[1] != null){

                                $row = $("<tr id="+datos[0]+"-articulosSinContrato></tr>");
                                $row.append("<td style='display:none'>"+datos[0]+"</td>");
                                $row.append("<td style='text-align: center'>" + datos[1] + "</td>");
                                $row.append("<td style='text-align: center'>" + datos[2] + "</td>");
                                $row.append("<td style='text-align: center'>"+ datos[3] +"</td>");
                                $row.append("<td><div style='text-align: center'><p style='background: #F90000;padding: 2px 0px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; font-size: 12px; text-align: center;''>"+ datos[4] + "</p></div></td>");

                                /*Se pinta el boton de ver detalle en la tabla*/
                                $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + datos[0] + "','" + datos[1] + "','" + datos[2] + "','" + datos[3] + "','" + datos[4] + "','" + datos[5] + "','" + datos[6] + "','" + datos[7] + "')\"></div></td>");
                                /*Se pinta el checkbox de cada fila*/
                                $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ datos[0] + "' value=\"" + datos[0] + "," + datos[1] + "," + datos[2] + "," + datos[3] + "," + datos[4] + "," + datos[5] + "," + datos[6] + "," + datos[7] +"\" style='margin: 5px 27px;'/></div></td>");

                                 /*Se elimina la fila del articulo en la tabla de articulos*/
                                $('#'+datos[0]+'-articulosAgregados').remove();
                                $('#tablaArticulosSinContrato').append($row);
                              
                    
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
                                    else if(result.status == '200'){
                                      alert("Contrato Creado Exitosamente");
                                      location.reload();  
                                    }                                              
                              },
                               error: function(data){
                              }   

                          }); 
                    }              

                    function editarContrato(idContrato){
                      
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
                          datos[i-1] = ([idContrato,idArticulo,cedula,idEstadoContrato,valorPrestado,fechaPrestamo,valorIntereses]);
                        }
                        i++;
                     });

                       $.ajax({
                        
                              type:'post',
                              url:"contratos/actualizar",
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
                                    else if(result.status == '200'){
                                      alert("Contrato Actualizado Exitosamente");
                                      location.reload();  
                                    }                                              
                              },
                               error: function(data){
                              }   

                          }); 
                    } 

              </script>
  @endsection