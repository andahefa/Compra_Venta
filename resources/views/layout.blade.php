<!DOCTYPE html>
<html lang="en">
    <head>

    <style>
    
    /* estilos vista index*/

    
      #articulos{
        margin: 20px;
        width: 92%;
      }

      #nuevoArticulo{
        margin: 0px 0px 0px 20px;
      }

      #nuevoCliente{

        margin: 0px 0px 0px 20px;
       }

      #Editar{
        padding: 2px 10px;
      }

      /*Estilos vista categirias*/
      #categorias{
        width: 70%;
        margin: 70px 0px 0px 120px;
      }

      #editar{
        padding: 2px 12px;
      }

      #eliminar{
        padding: 2px 12px;
      }

      #nuevaCategoria{
        margin: 10px 0px 0px 120px;
        position: absolute;
        /*left: 65%;*/
        padding: 4px 9px;
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
        
        <!--<link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>-->
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}"/>
        <!-- EOF CSS INCLUDE --> 

        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
          <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{ action('ArticuloController@index') }}">Administración</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{asset('images/users/avatar.jpg')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{asset('images/users/avatar.jpg')}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Administrador</div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active" id="opcionInventarioArticulos">
                        <a href="/index"><span class="glyphicon glyphicon-list"></span> <span class="xn-text">Inventario Articulos</span></a>                        
                    </li>
                     <li id="opcionCategorias">
                        <a href="/categorias"><span class="glyphicon glyphicon-tags"></span> <span class="xn-text">Categoria Articulo</span></a>                        
                    </li>
                      <li id="opcionContratos">
                        <a href="/contratos"><span class="glyphicon glyphicon-list-alt"></span> <span class="xn-text">Contratos</span></a>                        
                    </li>
                    <li id="opcionClientes">
                        <a href="/clientes"><span class="glyphicon glyphicon-user"></span> <span class="xn-text">Clientes</span></a>                        
                    </li> 
                    <li id="opcionPagoIntereses">
                        <a href="/pagos"><span class="glyphicon glyphicon-usd"></span> <span class="xn-text">Pago Intereses</span></a>                        
                    </li>
                    <li id="opcionHistoricoPagoIntereses">
                        <a href="/historicoIntereses"><span class="glyphicon glyphicon-tasks"></span> <span class="xn-text">Historico Pago Intereses</span></a>                        
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
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="pruebaaa" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ action('ArticuloController@index') }}">Inventario Articulos</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB --> 

                <!-- contenido-->                      
                <div class="container">
                    @yield('content')
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
                            <a href="{{action('HomeController@logout')}}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <script type="text/javascript">

    /*

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
                               /*
                         
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
        */
      

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

        <script type='text/javascript' src="{{asset('js/plugins/icheck/icheck.min.js')}}" ></script>        
        <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/morris/morris.min.js')}}"></script>       
        <script type="text/javascript" src="{{asset('js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{asset('js/plugins/owl/owl.carousel.min.js')}}"></script>                 
        
        <script type="text/javascript" src="{{asset('js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="{{asset('js/settings.js')}}"></script>-->
        
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('js/actions.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->       


    </body>
</html>






