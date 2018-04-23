<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratos;
use App\Estado_Contrato;
use App\Clientes;
use App\Articulo;
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
                    ->select('articulo.id_articulo','categoria_articulo.nombre as categoria', 'estado_articulo.nombre as estado', 'articulo.marca', 'articulo.referencia', 'articulo.descripcion' )
                    ->get();
        $clientes = DB::select('Select * from clientes');
        $datos = [];
        $i = 0;

        foreach ($contratos as $contrato) {

            $nombreCliente = DB::select("Select * from clientes where num_cedula = '".$contrato->num_cedula_cliente."'" );
            $estadoContrato = DB::select('call estadoContrato(?)',[$contrato->id_estado_contrato]);         
            $datos[$i]["idContrato"] = $contrato->id_contrato;
            $datos[$i]["numCedula"] = $contrato->num_cedula_cliente;
            $datos[$i]["estadoContrato"] = $estadoContrato[0]->nombre;
            $datos[$i]["valorPrestado"] = $contrato->valor_prestado;
            $datos[$i]["fechaPrestamo"] = $contrato->fecha_prestamo;
            $datos[$i]["intereses"] = $contrato->valor_intereses;
            $datos[$i]["nombresCliente"] = $nombreCliente[0]->nombres;
            $datos[$i]["apellidosCliente"] = $nombreCliente[0]->apellidos;

            $i = $i+1;      
        }
        return view('contratos') ->with(['datos' =>$datos, 'estados' => $estados, 'clientes' => $clientes, 'articulos' => $articulos]);
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
        //

        $cedula = explode("-", $request->get('cliente'));
        $contrato = new Contratos([
          'id_contrato' => 0,
          'num_cedula_cliente' => $cedula[0],
          'id_estado_contrato' => $request->get('estado'),
          'valor_prestado' => $request->get('valorPrestado'),
          'fecha_prestamo' => $request->get('fechaPrestamo'),
          'valor_intereses' => $request->get('valorIntereses')
          
        ]);

        
        $contrato->save();
        session()->flash('success','Contrato Creado Correctamente');
        return redirect()->route('contratos.index');



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

        $this->validate($request, [
        'cliente' => 'required',
        'estado' => 'required',
        'valorPrestado' => 'required',
        'fechaPrestamo' => 'required',
        'valorIntereses' => 'required'
        ]);
            $cedula = explode("-", $request->get('cliente'));
            $contrato = Contratos::find($request->get('idContrato'));
            $contrato->id_estado_contrato = $request->get('idContrato');
            $contrato->num_cedula_cliente = $cedula[0];
            $contrato->id_estado_contrato = $request->get('estado');
            $contrato->valor_prestado = $request->get('valorPrestado');
            $contrato->fecha_prestamo = $request->get('fechaPrestamo');
            $contrato->valor_intereses = $request->get('valorIntereses');

            $contrato->save();

            session()->flash('success','Contrato Modificado Correctamente');
            return redirect()->route('contratos.index');
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
