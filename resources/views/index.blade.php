            @extends('layout')
            @section('content')
               <div class="container">
                            <h2><center><b>Inventario de Articulos</b></center></h2>
                             <button id="nuevoArticulo" class="btn btn-success add-more" onclick="crearArticulo()"><span class="glyphicon glyphicon-plus"> Nuevo</span></button>
                              <table id="articulos" class="table table-condensed table-bordered">
                                <thead>
                                  <tr>
                                    <th>Nombre Cliente</th>
                                    <th>Cedula Cliente</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Marca</th>
                                    <th>Referencia</th>
                                    <th>Descripción</th>
                                    <th>Editar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($articulos as $articulo)
                                    <tr>
                                    <td style="display:none">{{$articulo['id']}}</td>
                                    <td>{{$articulo['nombres_cliente']}} {{$articulo['apellidos_cliente']}}</td>
                                    <td>{{$articulo['id_cliente']}}</td>
                                    <td>{{$articulo['categoria']}}</td>
                                    @if($articulo['estado'] == 'Sin Contrato')
                                     <td><p style="background: #F90000;padding: 1px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; text-align: center;">{{$articulo['estado']}}</p></td>
                                    @else
                                    <td><p style="background: #4A96D2;padding: 1px; color: #FFFFFF; border-radius: 7px 7px 7px 7px; text-align: center;">{{$articulo['estado']}}</p></td>
                                    @endif
                                                                                                        
                                    <td>{{$articulo['marca']}}</td>
                                    <td>{{$articulo['referencia']}}</td>
                                    <td>{{$articulo['descripcion']}}</td>
                                    <td>
                                        <button type="button" name="editar" id="Editar" onclick="editarArticulo('{{$articulo['id_cliente']}} - {{$articulo['nombres_cliente']}} {{$articulo['apellidos_cliente']}}','{{$articulo['id']}}', '{{$articulo['categoria']}}', '{{$articulo['estado']}}', '{{$articulo['marca']}}', '{{$articulo['referencia']}}', '{{$articulo['descripcion']}}')" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                          </div>
                            </div>
                              
                               <!-- Modal Producto-->
                            
                              <div class="modal fade" id="modalEditarArticulo" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <center><h4 class="modal-title"><b>Editar Articulo</b></h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="articulo/actualizar">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                          <label style="display: none">Id</label>
                                          <input style="display: none" type="text" class="form-control input-sm" name="id" id="id">
                                          <label class="form.control">Cliente</label>
                                          <select id="cliente" name="cliente" class="form-control">
                                                @foreach($clientes as $cliente)
                                               <option id="{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}" value="{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}">{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                                                @endforeach
                                          </select>
                                          <label class="form.control">Categoria</label>
                                          <select id="categoria" name="categoria" class="form-control">
                                                @foreach($categorias as $categoria)
                                               <option id="{{$categoria['nombre']}}" value="{{$categoria['id_categoria']}}">{{$categoria['nombre']}}</option>
                                                @endforeach
                                          </select>
                
                                            <label>Estado</label>
                                           
                                            <select class="form-control" id="estado" name="estado">
                                                 @foreach($estados as $estado)
                                                <option id="{{$estado['nombre']}}" value="{{$estado['id_estado_articulo']}}">{{$estado['nombre']}}</option>
                                                 @endforeach
                                            </select>
                                        
                                          <label>Marca</label>
                                          <input type="text" class="form-control" name="marca" id="marca">
                                          <label>Referencia</label>
                                          <input type="text" class="form-control" name="referencia" id="referencia">
                                          <label>Descripción</label>
                                          <textarea rows="3" class="form-control" name="descripcion" id="descripcion"></textarea>

                                              @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                         @endforeach
                                                    </ul>
                                                </div><br />
                                             @endif
                                        </div>
                                         </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button class="btn btn-success">Guardar</button>
                                    </div>
                                  </div>
                                    </form>
                                   
                                  
                                </div>
                              </div>

                        <!-- Modal Crear Contrato-->

                        <div id="crearArticulo" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" align="center">Nuevo Articulo</h4>
                              </div>
                              <div class="modal-body">
                                    <form method="post" action="articulo/store">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <label>Cliente:</label>
                                        <select class="form-control" id="cliente" name="cliente">
                                          
                                          @foreach($clientes as $cliente)
                                          <option>{{$cliente->num_cedula}} - {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                                          @endforeach
                                            
                                        </select>
                                        <label>Categoria</label>
                                        <select class="form-control" id="categoria" name="categoria">
                                            <option value="0">Seleccione...</option>
                                            @foreach($tipos as $t )
                                            <option value="{{$t->id_categoria}}">{{$t->nombre}}</option>
                                            @endforeach
                                        </select>
                                    
                                        <label>Marca</label>
                                        <input type="text" class="form-control" id="marca" name="marca">

                                        <label>Referencia</label>
                                        <input type="text" class="form-control" id="referencia" name="referencia">

                                        <label>Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion">


                                        <label>Estado</label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="0">Seleccione...</option>
                                            @foreach($estados as $estado)
                                            <option value="{{$estado->id_estado_articulo}}">{{$estado->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-success">Guardar</button>
                                        </div>
                                   
                                    </div>
                                    </form>
                                
                            </div>

                          </div>
                        </div>
                        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
                        <script type="text/javascript">
                            
                            function editarArticulo(cliente, id, categoria, estado, marca, referencia, descripcion){
                                $('#modalEditarArticulo').modal('show');
                                $('#id').val(id);
                                document.getElementById(cliente).selected = "true";
                                document.getElementById(categoria).selected = "true";
                                document.getElementById(estado).selected = "true";
                                $('#marca').val(marca);
                                $('#referencia').val(referencia);
                                $('#descripcion').val(descripcion);

                            }

                            function crearArticulo(){

                                $('#crearArticulo').modal('show');
                            }

                            /*Se valida que el registro se halla eliminado correctamente*/
                            @if(Session::has('success'))
                                toastr.success("{{ Session::get('success') }}");                         
                            @endif

                            function colorEstadoArticulo(){

                            }


                            
                        </script>
            @endsection