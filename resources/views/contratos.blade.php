  @extends('layout')
  @section('content')

   <h2><center><b>Contratos</b></center></h2>
                   <button id="nuevoArticulo" class="btn btn-success add-more" onclick="cargarModal(1)"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Cedula Cliente</th>
                          <th class="text-center">Nombres Cliente</th>
                          <th class="text-center">Apellidos Cliente</th>
                          <th class="text-center">Estado Contrato</th>
                          <th class="text-center">Articulos Asociados</th>
                          <th class="text-center">Valor Prestado</th>
                          <th class="text-center">Fecha Prestamo</th>
                          <th class="text-center">Valor Intereses</th>
                          <th class="text-center">Editar</th>
                          <th class="text-center">Ver Detalle</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($datos as $contrato)
                          <tr align="center">
                          <td style="display:none">{{$contrato['idContrato']}}</td>
                          <td>{{$contrato['cedulaCliente']}}</td>
                          <td>{{$contrato['nombres']}}</td>
                          <td>{{$contrato['apellidos']}}</td>
                          <td>{{$contrato['estadoContrato']}}</td>
                          <td> 
                            @foreach(explode(',', $contrato['articulo']) as $articulo) 
                                <p style="background: #A4A4A4;padding: 1px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; text-align: center;">{{$articulo}}</p>
                            @endforeach
                          </td>
                          <td>{{$contrato['valorPrestado']}}</td>
                          <td>{{$contrato['fechaPrestamo']}}</td>
                          <td>{{$contrato['intereses']}}</td>
                          <td>
                              <button type="button" name="editar" id="Editar" onclick="cargarModal(2)" class="btn btn-primary">
                              <span class="glyphicon glyphicon-edit"></span>
                              </button>
                          </td>
                          <td>
                           <div type="button" name="verDetalle" id="verDetalle" class="btn btn-warning">
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
                      <h4 class="modal-title" align="center"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="cidContrato" id="cidContrato" style="display: none">
                           
                        <div>
                        <div class="panel panel-default">
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
                                <th class="text-center">Seleccionar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!--
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
                              -->
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
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="recargarPagina()">Close</button>
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
                function recargarPagina(){
                  location.reload();
                }
                    /*funcion que me permite cargar el modal de crear y editar un contro. Adicional
                    carga los valores a los respectivos campos del modal dependiendo si es editar
                    o crear */
                   function cargarModal(accion){

                    switch(accion){
                      case 1:
                        $('#crearYEditarContrato').modal('show');
                        $('.modal-title').text('Nuevo Contrato');
                       
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

                          /*Se pinta el boton de ver detalle en la tabla*/
                          $row.append("<td><div style='text-align: center'><input type='button' name='verDetalle' class='btn btn-warning' value='Ver Detalle' style='padding: 1px 5px; font-size: 12px; text-align: center' onclick=\"detalleArticulo("+ "'" + idArticulo + "','" + nombres + " " + apellidos + "','" + cedula + "','"+ categoria + "','" + estado + "','" + marca + "','" + referencia + "','" + descripcion + "')\"></div></td>");
                          /*Se pinta el checkbox de cada fila*/
                          $row.append("<td><div style='text-align: center'><input type='checkbox' name='chk_"+ idArticulo + "' value=\"" + idArticulo + "," + nombres + " " + apellidos + "," + cedula + "," + categoria + "," + estado + "," + marca + "," + referencia + "," + descripcion +"\" style='margin: 5px 27px;'/></div></td>");
                          $('#tablaArticulosSinContrato').append($row);
                        }
                                
                        break;

                      case 2:

                        $('#crearYEditarContrato').modal('show');
                        $('.modal-title').text('Editar Contrato');

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

                      console.log("Nombres:"+nombres);
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

              </script>
  @endsection