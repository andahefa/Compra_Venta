@extends('layout')
@section('content')

      <div class="container">
                      <h2><center><b>Categorias</b></center></h2>
                     <div>
                        <button class="btn btn-success add-more" id="nuevaCategoria" onclick="crearCategoria()">
                            <span class="glyphicon glyphicon-plus"> Agregar</span>
                        </button>
                    </div>
                      <div>
                          <table class="table table-condensed table-bordered" id="categorias">
                             
                            <thead>
                              <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->nombre}}</td>
                                <td align="center">
                                    <button id="editar" class="btn btn-primary" onclick="editarCategoria('{{$categoria->id_categoria}}', '{{$categoria->nombre}}')" >
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </td>
                                <td align="center">
                                   <!--<form action="{{action('CategoriasController@destroy', $categoria->id_categoria )}}" method="DELETE">
                                        <button id="eliminar" class="btn btn-danger remove">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </form> -->

                                    {!! Form::open(['method' => 'DELETE','route' => ['categorias.destroy', $categoria->id_categoria],'style'=>'display:inline', 'onsubmit'=> 'return confirmDelete()']) !!}
                                    {{ Form::button('<span class="glyphicon glyphicon-remove"></span>', array('type' => 'submit', 'class' => 'btn btn-danger', 'id' => 'eliminar')) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                      </div>
                </div>
                   <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
                        <script >

                            /*Se valida que el registro se halla eliminado correctamente*/
                            @if(Session::has('success'))
                                        toastr.success("{{ Session::get('success') }}");
                                 
                              @endif
                            </script>
                   

                    <!-- Modal mensaje eliminacion de categoria-->
                    <div id="eliminarCategoria" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-body">
                        
                          </div>
                          
                        </div>

                      </div>
                    </div>
         
         <!-- Modal editar categoria-->

            <div id="editarCategoria" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Editar Categoria</h4>
                  </div>
                  
                  <form method="post" action="categorias/actualizar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                      <input type="text" name="idCategoria" id="idCategoria" style="display: none">
                      <label class="form.control">Nombre:</label>
                      <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </form>
                 
                </div>

              </div>
            </div>

            <!-- Modal Crear Categoria-->

            <div id="crearCategoria" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Nueva Categoria</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="categorias/crear">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <label class="form.control">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">Guardar</button>
                  </div>

                    </form>
                    
                </div>

              </div>
            </div>

            <script type="text/javascript">

                function confirmDelete()
                  {
                  var x = confirm("Esta seguro que desea borrarlo?");
                  if (x)
                    return true;
                  else
                    return false;
                  }


                 function editarCategoria(idCategoria, nombre){
                      $('#editarCategoria').modal('show');
                      $('#idCategoria').val(idCategoria);
                      $('#nombre').val(nombre);

                  }

                 function crearCategoria(){
                    $('#crearCategoria').modal('show');
                 }

            </script>
@endsection