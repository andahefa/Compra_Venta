@extends('layout')
@section('content')
   <div class="container">
                <h2><center><b>Inventario de Articulos</b></center></h2>
                 <a href="articulo/create"><button id="nuevoArticulo" class="btn btn-success add-more"><span class="glyphicon glyphicon-plus"> Nuevo</span></button></a>
                  <table id="articulos" class="table table-condensed table-bordered">
                    <thead>
                      <tr>
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
                        <td>{{$articulo['categoria']}}</td>
                        <td>{{$articulo['estado']}}</td>
                        <td>{{$articulo['marca']}}</td>
                        <td>{{$articulo['referencia']}}</td>
                        <td>{{$articulo['descripcion']}}</td>
                        <td>
                            <button type="button" name="editar" id="Editar" onclick="cargarArticulo('{{$articulo['id']}}','{{$articulo['categoria']}}','{{$articulo['estado']}}','{{$articulo['marca']}}','{{$articulo['referencia']}}','{{$articulo['descripcion']}}')" class="btn btn-primary">
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
                            <div class="form-group">
                              <label style="display: none">Id</label>
                              <input style="display: none" type="text" class="form-control input-sm" name="id" id="id">
                              <label>Categoria</label>
                              <select id="categoria" name="categoria" class="form-control">
                                    @foreach($categorias as $categoria)
                                   <option id="{{$categoria['nombre']}}" value="{{$categoria['id_categoria']}}">{{$categoria['nombre']}}</option>
                                    @endforeach
                              </select>
    
                                <label>Estado</label>
                               
                                <select class="form-control" id="estado" name="name">
                                     @foreach($estados as $estado)
                                    <option id="{{$estado['nombre']}}" value="{{$estado['id_estado_articulo']}}">{{$estado['nombre']}}</option>
                                     @endforeach
                                </select>
                            
                              <label>Marca</label>
                              <input type="text" class="form-control input-sm" name="marca" id="marca">
                              <label>Referencia</label>
                              <input type="text" class="form-control input-sm" name="referencia" id="referencia">
                              <label>Descripción</label>
                              <textarea rows="3" class="form-control input-sm" name="descripcion" id="descripcion"></textarea>

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
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="button" class="btn btn-success" data-dismiss="modal" value="Guardar" onclick="editarArticulo()"></input>
                        </div>
                      </div>
                      
                    </div>
                  </div>
@endsection