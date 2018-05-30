  @extends('layout')
  @section('content')
            
         <script type="text/javascript">
               $( "#opcionInventarioArticulos" ).removeClass( "active" );
                $( "#opcionCategorias" ).removeClass( "active" );
                $( "#opcionClientes" ).addClass( "active" );
                $( "#opcionPagoIntereses" ).removeClass( "active" );
                $( "#opcionContratos" ).removeClass( "active" );
         </script>
                  <h2><center><b>Clientes</b></center></h2>
                  <div style="margin: 30px 0px -20px 0px;">
                   <button id="nuevoCliente" class="btn btn-success add-more" onclick="crearCliente()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                    {!! Form::open(['route' => 'clientesfiltro', 'method' => 'GET', 'class' => 'navbar-form pill-right']) !!}
                        <div class="input-group" style="margin: -71px 0px 0px 120px">
                        {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Search...', 'aria-describedby' => 'search']) !!}

                          <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                        </div>
                    {!! Form::close() !!}
                    </div>
                    <table id="articulos" class="table table-condensed table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Cedula</th>
                          <th class="text-center">Nombres</th>
                          <th class="text-center">Apellidos</th>
                          <th class="text-center">Telefono</th>
                          <th class="text-center">Dirección Residencia</th>
                          <th class="text-center">Editar</th>
                          <th class="text-center">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($clientes as $cliente)
                          <tr align="center">
                          <td>{{$cliente->num_cedula}}</td>
                          <td>{{$cliente->nombres}}</td>
                          <td>{{$cliente->apellidos}}</td>
                          <td>{{$cliente->telefono}}</td>
                          <td>{{$cliente->direccion_residencia}}</td>
                          <td>
                              <button type="button" name="editar" id="editar" onclick="cargarClienteModal('{{$cliente->num_cedula}}', '{{$cliente->nombres}}', '{{$cliente->apellidos}}', '{{$cliente->telefono}}', '{{$cliente->direccion_residencia}}')" class="btn btn-primary">
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
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="modal-body">
                        <input type="text" name="eidContrato" id="eidContrato" style="display: none">
                        <label class="form.control">Numero de Cedula:</label>
                        <input type="number" name="ecedula" id="ecedula" class="form-control">
                        <label class="form.control">Nombres:</label>
                        <input type="text" class="form-control" id="enombres" name="enombres">
                        <label class="form.control">Apellidos:</label>
                        <input type="text" name="eapellidos" id="eapellidos" class="form-control">
                        <label class="form.control">Telefono:</label>
                        <input type="number" name="etelefono" id="etelefono" class="form-control">
                        <label class="form.control">Dirección:</label>
                        <input type="text" name="edireccion" id="edireccion" class="form-control">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="limpiarModal()">Close</button>
                        <button class="btn btn-success" onclick="editarCliente()">Guardar</button>
                      </div>
                   
                  </div>

                </div>
              </div>

              <!-- Modal Crear Cliente-->

              <div id="crearCliente" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" id="header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" align="center">Nuevo Cliente</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="clientes/crear">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="modal-body">
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


                <div class="alert alert-success hide">Cliente Actualizado con exito</div>

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

                   function cargarClienteModal(cedula, nombres, apellidos, telefono, direccion){
                        $('#editarCliente').modal('show');
                        $('#ecedula').val(cedula);
                        $('#enombres').val(nombres);
                        $('#eapellidos').val(apellidos);
                        $('#etelefono').val(telefono);
                        $('#edireccion').val(direccion);
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

                   /*funcion que sirve para limpiar el modal de editar cliente
                   en caso tal de que halla quedato pintado el div de los mensajes
                   de validaciones al darle click en el boton cancelar*/             
                  function limpiarModal(){
                      var existDivErrores = document.getElementById("errores");

                                        if(existDivErrores != null){
                                            existDivErrores.remove();
                                        }
                  }

                  /*Funcion que permite editar un cliente en base de datos*/

                  function editarCliente(){

                        var cedula = $('#ecedula').val();
                        var nombres = $('#enombres').val();
                        var apellidos = $('#eapellidos').val();
                        var telefono = $('#etelefono').val();
                        var direccion = $('#edireccion').val();

                          $.ajax({
                              type:'post',
                              url:"clientes/actualizar",
                              data:{
                                  '_token': '{{csrf_token()}}',
                                  'cedula': cedula,
                                  'nombres': nombres,
                                  'apellidos': apellidos,
                                  'telefono': telefono,
                                  'direccion': direccion
                              },
                              success: function(result){
                                   
                                    alert("Cliente Actualizado Exitosamente!!");
                                    location.reload();
                                                                                       
                              },
                               error: function(data){                                    
                                  if((data.responseText)){
                                      //var errors = $.parseJSON(data.responseText);
                                    setTimeout(function () {

                                    $('#editarCliente').modal('show');
                                        var d = data.responseJSON;
                                               
                                                
                                        /* Se crea el nuevo div con la lista para empezar
                                        a escribir los errores de validaciones*/
                                        var div = "<div class='form.control alert alert-danger' id='errores' style='width: 90%; margin: 15px'><ul id='listaErrores'></ul></div>";
                                        $('.modal-body').before(div);
                                                
                                        /*Se agregan los errores de validaciones a la lista*/
                                        for (let i in d) {
                                                    
                                            var identificador = String("error"+i); 
                                            var newTr = "<li id="+identificador+">"+i+":"+d[i][0]+"</li>";
                                            $('#listaErrores').append(newTr);
                                        }
        
                                      }, 500);

                                      }

                                        /*Si el div de errores de validaciones existe, se elimina para volverlo 
                                        a escribir con los nuevos errores*/
                                        var existDivErrores = document.getElementById("errores");

                                        if(existDivErrores != null){
                                            existDivErrores.remove();
                                        }

                              }   

                          });              
                 
                  }            

              </script>
  @endsection