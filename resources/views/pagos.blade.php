  @extends('layout')
  @section('content')

    <script type="text/javascript">
    /*Se eliminan las clases activas de cada opcion*/
    $( "#opcionInventarioArticulos" ).removeClass( "active" );
    $( "#opcionCategorias" ).removeClass( "active" );
    $( "#opcionClientes" ).removeClass( "active" );
    $( "#opcionPagoIntereses" ).addClass( "active" );
    $( "#opcionContratos" ).removeClass( "active" );
  </script>

   <h2><center><b>Pagos</b></center></h2>
                   <button id="nuevoArticulo" class="btn btn-success add-more" onclick="cargarModal(1)"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Id Pago</th>
                          <th class="text-center">Cliente</th>
                          <th class="text-center">Contrato</th>
                          <th class="text-center">Valor Pago</th>
                          <th class="text-center">Fecha Pago</th>
                          <th class="text-center">Cuota Pagada</th>
                          <th class="text-center">Editar</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($pagos as $pago)
                          <tr align="center">
                          <td id="idPago">{{$pago->id_pago_interes}}</td>
                          <td id="cliente">{{$pago->nombres}} {{$pago->apellidos}}</td>
                          <td id="idContrato">{{$pago->id_contrato}}</td>
                          <td id="valorPago">{{$pago->valor_pago}}</td>
                          <td id="fechaPago">{{$pago->fecha_pago}}</td>
                          <td id="cuotaPagada">{{$pago->cuota_pagada}}</td>
                          <td>     
                            <button id="editar" class="btn btn-primary" onclick="cargarModal(2)">
                              <span class="glyphicon glyphicon-edit"></span>
                            </button>
                          </td>
                          
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
                  </div>


                 
              <!-- Modal Crear y Editar Pagos-->

              <div id="crearYEditarPago" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg" style="width: 750px; margin: auto;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" align="center" id="tituloModalCrearYEditarPago"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="cIdPago" id="cIdPago" style="display: none">
                        <label class="form.control">Id Contrato</label>
                        <select name="cIdContrato" id="cIdContrato" class="form-control" onchange="clientes()">
                          <option id="seleccione" value="">Seleccione...</option>
                          @foreach($contratos as $contrato)
                          <option value="{{$contrato->id_contrato}}" id="{{$contrato->id_contrato}}">{{$contrato->id_contrato}}</option>
                          @endforeach
                        </select>
                        <label class="form.control">Cliente</label>
                        <input type="text" name="cCliente" id="cCliente" class="form-control">
                        <label class="form.control">Valor Pago</label>
                        <input type="number" name="cValorPago" id="cValorPago" class="form-control">
                        <label class="form.control">Mes a Pagar</label>
                        <input type="month" name="cMesPago" id="cMesPago" class="form-control">
                        <label class="form.control">Fecha Pago</label>
                        <input type="date" name="cFechaPago" id="cFechaPago" class="form-control">
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="guardarYEditar" class="btn btn-success" onclick="" value="Guardar">Guardar</button>
                      </div>
                  </div>

                </div>

                <!-- end Modal crear-->
                <script >
                  
                  function cargarModal(tipo){
                    switch(tipo) {
                      case 1:
                          $('#crearYEditarPago').modal('show');
                          $('#tituloModalCrearYEditarPago').text('Nuevo Pago');
                          $("#guardarYEditar").attr("onclick","crearPago()");
                          break;
                      case 2:
                       var id_pago = $('#idPago').text();
                       var id_contrato = $('#idContrato').text();
                       var fecha_pago = $('#fechaPago').text();
                       var valor_pago = $('#valorPago').text();
                       var cuota_pagada = $('#cuotaPagada').text();

                        $('#cIdPago').val(id_pago);
                        $('#cIdContrato').val(id_contrato);
                        $('#cFechaPago').val(fecha_pago);
                        $('#cValorPago').val(valor_pago);
                        $('#cMesPago').val(cuota_pagada);

                          $('#crearYEditarPago').modal('show');
                          $('#tituloModalCrearYEditarPago').text('Editar Pago');
                          $("#guardarYEditar").attr("onclick","editarPago()");


                      break;
                      default:
                       
                  }                  
                }

                function clientes(){

                  var opcionSelec = $('#idContrato').val();
                   var JSONObject = JSON.parse('<?php echo json_encode($contratos)?>');
                        for (var key in JSONObject) {
                            
                            var idCont = JSONObject[key]["id_contrato"];
                            var nombres = JSONObject[key]["nombres"];
                            var apellidos = JSONObject[key]["apellidos"];
                            if(idCont == opcionSelec){

                              $('#ccliente').val(nombres+" "+apellidos);
                            }
                            break;
                        }
                }

                function crearPago(){

                  var id_contrato = $('#cIdContrato').val();
                  var fecha_pago = $('#cFechaPago').val();
                  var valor_pago = $('#cValorPago').val();
                  var cuota_pagada = $('#cMesPago').val();

                     $.ajax({
                        
                              type:'post',
                              url:"pagos/crear",
                              data:{
                                  '_token': '{{csrf_token()}}',
                                  'id_contrato': id_contrato,
                                  'fecha_pago': fecha_pago,
                                  'valor_pago': valor_pago,
                                  'cuota_pagada': cuota_pagada
                              },
                             
                              success: function(result){
                                    
                                  alert("Pago Creado Exitosamente");
                                  location.reload();  
                                                                              
                              },
                               error: function(data){
                              }   

                          }); 
                }


                function editarPago(){

                        var id_pago = $('#idPago').text();
                        var id_contrato = $('#cIdContrato').val();
                        var fecha_pago = $('#cFechaPago').val();
                        var valor_pago = $('#cValorPago').val();
                        var cuota_pagada = $('#cMesPago').val();
               
                     $.ajax({
                        
                              type:'post',
                              url:"pagos/actualizar",
                              data:{
                                  '_token': '{{csrf_token()}}',
                                  'id_pago': id_pago,
                                  'id_contrato': id_contrato,
                                  'fecha_pago': fecha_pago,
                                  'valor_pago': valor_pago,
                                  'cuota_pagada': cuota_pagada
                              },
                             
                              success: function(result){
                                    
                                  alert("Pago Actualizado Exitosamente");
                                  location.reload();  
                                                                              
                              },
                               error: function(data){
                              }   

                          }); 

                }
                </script>
             
  @endsection