
@extends('layout')
@section('content')

     <div class="container">
                        
                        <h4 align="center"><b>Nuevo Articulo</b></h4>

                        <div class="form-group">
                            <form method="post" action="/articulo/store">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label>Categoria</label>
                            <select class="form-control" id="categoria" name="categoria">
                                <option value="0">Seleccione...</option>
                                @foreach($tipos as $t )
                                <option value="{{$t->id_categoria}}">{{$t->nombre}}</option>
                                @endforeach
                            </select>
                        
                            <label>Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required="">

                            <label>Referencia</label>
                            <input type="text" class="form-control" id="referencia" name="referencia" required="">

                            <label>Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required="">


                            <label>Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="0">Seleccione...</option>
                                @foreach($estados as $estado)
                                <option value="{{$estado->id_estado_articulo}}">{{$estado->nombre}}</option>
                                @endforeach
                            </select>
                            <input id="btnGuardar" class="btn btn-success" type="submit" value="Guardar">
                            </input>
                            <a href="/index"><input type="button" id="btnCancelar" class="btn btn-default" value="Cancelar"></input></a>
                           
                        </div>
                        </form>
            </div>
                
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
@endsection






