  @extends('layout')
  @section('content')

    <script type="text/javascript">
    /*Se eliminan las clases activas de cada opcion*/
    $( "#opcionInventarioArticulos" ).removeClass( "active" );
    $( "#opcionCategorias" ).removeClass( "active" );
    $( "#opcionClientes" ).removeClass( "active" );
    $( "#opcionPagoIntereses" ).removeClass( "active" );
    $( "#opcionContratos" ).removeClass( "active" );
    $('#opcionHistoricoPagoIntereses').addClass('active');
  </script>

   <h2><center><b>Histórico Pagos</b></center></h2>
                    {!! Form::open(['route' => 'historicofiltro', 'method' => 'GET', 'class' => 'navbar-form pill-right']) !!}
                        <div class="input-group" style="margin: 20px 0px 0px 4px">
                        {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Search...', 'aria-describedby' => 'search']) !!}

                          <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                        </div>
                    {!! Form::close() !!}
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Id Historico</th>
                          <th class="text-center">Id Pago Interes</th>
                          <th class="text-center">Cliente</th>
                          <th class="text-center">Contrato</th>
                          <th class="text-center">Valor Pago</th>
                          <th class="text-center">Fecha Pago</th>
                          <th class="text-center">Cuota Pagada</th>
                          <th class="text-center">Fecha Ultima Modificación</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($historicoPagos as $pago)
                          <tr align="center">
                          <td id="idHistorico">{{$pago->id_historico}}</td>
                          <td id="idPago">{{$pago->id_pago_interes}}</td>
                          <td id="cliente">{{$pago->nombres}} {{$pago->apellidos}}</td>
                          <td id="idContrato">{{$pago->id_contrato}}</td>
                          <td id="valorPago">{{$pago->valor_pago}}</td>
                          <td id="fechaPago">{{$pago->fecha_pago}}</td>
                          <td id="cuotaPagada">{{$pago->cuota_pagada}}</td>
                          <td id="cuotaPagada">{{$pago->fecha_ultima_modificacion}}</td>
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