<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratos;
use App\Estado_Contrato;
use App\Clientes;
use App\Articulo;
use App\Articulo_Contrato;
use Path\To\Your\Log;
use DB;
use Illuminate\Support\Facades\Validator;
class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $contratos = Contratos::orderBy('id_contrato')->get();
        $estados = Estado_Contrato::orderBy('id_estado')->get();
        $articulos = DB::table('articulo')
                    ->join('categoria_articulo', 'articulo.id_categoria', '=', 'categoria_articulo.id_categoria')
                    ->join('estado_articulo', 'articulo.id_estado_articulo', '=', 'estado_articulo.id_estado_articulo')
                    ->join('clientes', 'articulo.id_cliente', '=', 'clientes.num_cedula')
                    ->where('estado_articulo.nombre', '=', 'Sin Contrato')
                    ->select('clientes.*','articulo.id_articulo','categoria_articulo.nombre as categoria', 'estado_articulo.nombre as estado', 'articulo.marca', 'articulo.referencia', 'articulo.descripcion' )
                    ->get();

        $datos = [];
        $i = 0;

        foreach ($contratos as $contrato) {

             $cedula = DB::table('articulo_contrato')
                    ->join('articulo', 'articulo_contrato.id_articulo', '=', 'articulo.id_articulo')
                    ->join('clientes', 'articulo.id_cliente', '=', 'clientes.num_cedula')
                    ->join('categoria_articulo', 'articulo.id_categoria', '=', 'categoria_articulo.id_categoria')
                    ->join('estado_articulo', 'articulo.id_estado_articulo', '=', 'estado_articulo.id_estado_articulo')
                    ->where('articulo_contrato.id_contrato', '=', $contrato->id_contrato)
                    ->select('clientes.*','articulo.*', 'categoria_articulo.nombre as nombre_categoria', 'estado_articulo.nombre as estadoarticulo')
                    ->get();

                    $j = 1;

                    if(count($cedula)>1){

                        $articulosAsociados = "";
                        foreach ($cedula as $c) {
                            if($j == 1){
                            
                                $datos[$i]["cedulaCliente"] = $c->num_cedula;
                                $datos[$i]["nombres"] = $c->nombres;
                                $datos[$i]["apellidos"] = $c->apellidos;
                                $articulosAsociados = $articulosAsociados.$c->num_cedula."-".$c->nombres."-".$c->apellidos."-".$c->telefono."-".$c->direccion_residencia."-".$c->id_articulo."-".$c->nombre_categoria."-".$c->estadoarticulo."-".$c->marca."-".$c->referencia."-".$c->descripcion;
                                $j++;
                            }
                            else {
                                $articulosAsociados = $articulosAsociados.",".$c->num_cedula."-".$c->nombres."-".$c->apellidos."-".$c->telefono."-".$c->direccion_residencia."-".$c->id_articulo."-".$c->nombre_categoria."-".$c->estadoarticulo."-".$c->marca."-".$c->referencia."-".$c->descripcion;
                                $datos[$i]["articulo"] = $articulosAsociados;
                                $j++;
                            }
                        }

                        $j++;
                    }
                    else{
                         foreach ($cedula as $c) {
                            
                            $datos[$i]["cedulaCliente"] = $c->num_cedula;
                            $datos[$i]["nombres"] = $c->nombres;
                            $datos[$i]["apellidos"] = $c->apellidos;
                            $datos[$i]["articulo"] = $c->num_cedula."-".$c->nombres."-".$c->apellidos."-".$c->telefono."-".$c->direccion_residencia."-".$c->id_articulo."-".$c->nombre_categoria."-".$c->estadoarticulo."-".$c->marca."-".$c->referencia."-".$c->descripcion;
                        }
                    }
            $estadoContrato = DB::select('call estadoContrato(?)',[$contrato->id_estado_contrato]);         
            $datos[$i]["idContrato"] = $contrato->id_contrato;
            $datos[$i]["estadoContrato"] = $estadoContrato[0]->nombre;
            $datos[$i]["valorPrestado"] = $contrato->valor_prestado;
            $datos[$i]["fechaPrestamo"] = $contrato->fecha_prestamo;
            error_log("fechaaa prestamooooo:".$contrato->fecha_prestamo);

            /*Se realiza consulta para obtener la fecha actual*/
            $arrayFechaActual = DB::select('SELECT SYSDATE() as fechaActual');
            $arrayFechaActual = explode(" ", $arrayFechaActual[0]->fechaActual);
            $dateFechaActual=date_create($arrayFechaActual[0]);
            $dateFechaContrato=date_create($contrato->fecha_prestamo);


            $intervalo = date_diff($dateFechaActual,$dateFechaContrato);
            /*Se obtiene la cantidad de meses sin pagar los intereses*/
            $datos[$i]["cuotasAtrasadas"] = $intervalo->format('%m');
            $datos[$i]["intereses"] = $contrato->valor_intereses;
            $datos[$i]["fechaVencimiento"] = $contrato->fecha_vencimiento_contrato;

            $i++;
        }

        return view('contratos') ->with(['datos' =>$datos, 'estados' => $estados, 'articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $value = $request->input('arrayDatos');
        $cedulaAnterior = 0;
        $estado = 0;
        for($i = 0; $i < count($value); $i++ ){

             $cedulaCliente = $value[$i][1];
             if($i == 0){
                $cedulaAnterior =(int)$cedulaCliente;
             }else if($cedulaAnterior != $cedulaCliente ){
                 $estado = 2;
             }
        }

        if($estado != 2){

            for($i = 0; $i < count($value); $i++ ){

                 $idArticulo = $value[$i][0];
                 $cedula = $value[$i][1];
                 $idEstadoContrato = $value[$i][2];
                 $valorPrestado = $value[$i][3];
                 $fechaPrestamo = $value[$i][4];
                 $valorIntereses = $value[$i][5];
  
                 $idContratoCreado;

                if($i==0){

                    $idContratoCreado = DB::table('contratos')->insertGetId(
                        array('id_contrato' => 0,
                        'id_estado_contrato' => $idEstadoContrato,
                        'valor_prestado' => $valorPrestado,
                        'fecha_prestamo' => $fechaPrestamo,
                        'valor_intereses' => $valorIntereses)
                    );
                }

                $articuloContrato = new Articulo_Contrato([
                    'id_articulo' => $idArticulo,
                    'id_contrato' => $idContratoCreado
                ]);
                
                $articuloContrato->save();
            }
             
        }else{
            return $estado;
        }

        $request->session()->flash('message', 'New customer added successfully.');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'200']);
    }
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        dd("Entre a showww");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
      $value = $request->input('arrayDatos');
        $cedulaAnterior = 0;
        $estado = 0;
        for($i = 0; $i < count($value); $i++ ){

             $cedulaCliente = $value[$i][2];
             if($i == 0){
                $cedulaAnterior =(int)$cedulaCliente;
             }else if($cedulaAnterior != $cedulaCliente ){
                 $estado = 2;
             }
        }

        if($estado != 2){

            for($i = 0; $i < count($value); $i++ ){
                error_log("Cantidad de articulosssssssss:".count($value));
                 $idContrato = $value[$i][0];
                 $idArticulo = $value[$i][1];
                 $cedula = $value[$i][2];
                 $idEstadoContrato = $value[$i][3];
                 $valorPrestado = $value[$i][4];
                 $fechaPrestamo = $value[$i][5];
                 $valorIntereses = $value[$i][6];
  
                 $idContratoCreado;

                if($i==0){

                    /*Se actualiza la tabla de contratos*/
                    $updates = DB::table('contratos')
                    ->where('id_contrato', '=', $idContrato)
                    ->update([
                        'id_estado_contrato' => $idEstadoContrato,
                        'valor_prestado' => $valorPrestado,
                        'fecha_prestamo' => $fechaPrestamo,
                        'valor_intereses' => $valorIntereses
                    ]);

                    /*Se eleminian los articulos que tiene actualmente
                    asociados el contrato*/

                     DB::table('articulo_contrato')
                    ->where('id_contrato', '=', $idContrato)
                    ->delete();
                }

             
                  /*Se inserta los nuevos articulos en la tabla articulo_contrato*/
                   DB::table('articulo_contrato')
                    ->insert([
                        'id_articulo' => $idArticulo,
                        'id_contrato' => $idContrato
                 ]);

               /* DB::update('update contratos set id_estado_contrato = ?, valor_prestado = ?,
                fecha_prestamo = ?, valor_intereses = ? where id_contrato = ? ');

                 DB::update('update articulo_contrato set id_articulo = ? where id_contrato = ?');
                $articuloContrato->save();*/
            }
             
        }else{
            return $estado;
        }

        $request->session()->flash('message', 'New customer added successfully.');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'200']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
