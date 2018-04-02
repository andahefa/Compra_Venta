<!DOCTYPE html>
<html lang="en">
    <head>

    <style>
    
      #articulos{
        margin: 20px;
      }

    </style>        
        <!-- META SECTION -->
        <title>Control Inventario</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE --> 

        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>                                   
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Administración</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">John Doe</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="/index"><span class="glyphicon glyphicon-list"></span> <span class="xn-text">Inventario Articulos</span></a>                        
                    </li>
                     <li>
                        <a href="/categorias"><span class="glyphicon glyphicon-tags"></span> <span class="xn-text">Categoria</span></a>                        
                    </li>                      
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>                        
                        <ul>
                            <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>                            
                            <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>
                            <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>                            
                            <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>
                            <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>
                            <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>
                            <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>
                            <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>
                            <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>                            
                            <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>
                            <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB --> 

                <!-- Se incluye la vista inventario-->                      

                <div class="container">
                <h2><center><b>Inventario de Articulos</b></center></h2>
                <a href="articulo/create"><button id="nuevoArticulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"> Nuevo Articulo</span></button></a>
                 <a href="articulo/create"><button id="nuevoArticulo" class="btn btn-primary">Nuevo Articulo</button></a>
                <div>
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
                            <button type="button" name="editar" id="Editar" onclick="cargarArticulo('{{$articulo['id']}}','{{$articulo['categoria']}}','{{$articulo['estado']}}','{{$articulo['marca']}}','{{$articulo['referencia']}}','{{$articulo['descripcion']}}')" class="btn">
                            <span class="glyphicon glyphicon-edit"></span> Editar
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
                
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <script type="text/javascript">

        function cargarArticulo(id,categoria,estado,marca,referencia,descripcion){

            $('#modalEditarArticulo').modal('show');
            $('#id').val(id);
            document.getElementById(categoria).selected = "true";
            document.getElementById(estado).selected = "true";
            $('#marca').val(marca);
            $('#referencia').val(referencia);
            $('#descripcion').val(descripcion);

        }

        function editarArticulo(){

            var id = $('#id').val();
            var categoria = $('#categoria').val();
            var estado = $('#estado').val();
            var marca = $('#marca').val();
            var referencia = $('#referencia').val();
            var descripcion = $('#descripcion').val();

                $.ajax({
                    type:'post',
                    url:"articulo/actualizar",
                    data:{
                        '_token': '{{csrf_token()}}',
                        'id': id,
                        'categoria':categoria,
                        'estado':estado,
                        'marca':marca,
                        'referencia':referencia,
                        'descripcion':descripcion
                    },
                    success: function(result){

                        alert('actualizado con exito');
                        location.reload();
                    },
                     error: function(data){

                             /*Se validan que no existan mensages de errores,
                               si existe se eliminan*/
                         
                            var mensaje = document.getElementById("errorMarca");
                            if(mensaje != null){
                                mensaje.remove();
                            }
                            mensaje = document.getElementById("errorReferencia");
                            if(mensaje != null){
                                mensaje.remove();
                            }
                            mensaje = document.getElementById("errorDescripcion");
                            if(mensaje != null){
                                mensaje.remove();
                            }

                            if((data.responseText)){

                                var errors = $.parseJSON(data.responseText);
        
                                setTimeout(function () {
                                    $('#modalEditarArticulo').modal('show');

                                    if(errors.marca){
                                    
                                        var newTr = "<div><label id ='errorMarca' class='label label-danger'><strong>Warning! </strong>"+errors.marca+"</label></div>";
                                        $('#marca').after(newTr);
                                    }
                                    if(errors.referencia){
                                    
                                        var newTr = "<div><label id ='errorReferencia' class='label label-danger'><strong>Warning! </strong>"+errors.referencia+"</label></div>";
                                        $('#referencia').after(newTr);
                                    }
                                    if(errors.descripcion){

                                        var newTr = "<div><label class = 'label label-danger' id ='errorDescripcion'><strong>Warning! </strong>"+errors.descripcion+"</label></div>";
                                         $('#descripcion').after(newTr);
                                    }
                            }, 500);

                            }
                            

                    }   

                });

               
        }

        </script>

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS 
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
         END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->       


    </body>
</html>






