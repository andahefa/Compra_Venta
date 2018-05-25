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
                          <th class="text-center">Valor Pago</th>
                          <th class="text-center">Fecha Pago</th>
                          <th class="text-center">Contrato</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($pagos as $pago)
                          <tr align="center">
                          <td id="idPago">{{$pago->id_pago_interes}}</td>
                          <td id="cliente">{{$pago->nombres}} {{$pago->apellidos}}</td>
                          <td id="idPago">{{$pago->valor_pago}}</td>
                          <td id="idPago">{{$pago->fecha_pago}}</td>
                          <td id="idPago">{{$pago->id_contrato}}</td>
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
                    <form method="post" action="pagos/crear">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label class="form.control">Id Contrato</label>
                        <input type="text" name="idContrato" id="idContrato" class="form-control">
                        <label class="form.control">Cliente</label>
                        <input type="text" name="cliente" id="cliente" class="form-control">
                        <label class="form.control">Valor Pago</label>
                        <input type="number" name="valorPago" id="valorPago" class="form-control">
                        <label class="form.control">Mes a Pagar</label>
                        <input type="month" name="mesPago" id="mesPago" class="form-control">
                        
                        <label class="form.control">Fecha Pago</label>
                        <input type="date" name="fechaPago" id="fechaPago" class="form-control">
                    
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="guardarYEditar" class="btn btn-success" onclick="" value="Guardar">Guardar</button>
                      </div>
                    </form>
                  </div>

                </div>
                <script >
                  
                  function cargarModal(tipo){
                    switch(tipo) {
                      case 1:
                          $('#crearYEditarPago').modal('show');
                          $('#tituloModalCrearYEditarPago').text('Nuevo Contrato');
                          break;
                      default:
                       
                  }                  
                }
                </script>
             
  @endsection