<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratos;
use Path\To\Your\Log;
use DB;

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
        $datos = [];
        $i = 0;

        foreach ($contratos as $contrato) {
            $estadoContrato = DB::select('call estadoContrato(?)',[$contrato->id_estado_contrato]);
            $datos[$i]["idContrato"] = $contrato->id_contrato;
            $datos[$i]["numCedula"] = $contrato->num_cedula_cliente;
            $datos[$i]["estadoContrato"] = $estadoContrato[0]->nombre;
            $datos[$i]["valorPrestado"] = $contrato->valor_prestado;
            $datos[$i]["fechaPrestamo"] = $contrato->fecha_prestamo;
            $datos[$i]["intereses"] = $contrato->valor_intereses;

            $i = $i+1;      
        }
        return view('contratos') ->with(['datos' =>$datos]);
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
    public function edit($id)
    {
        //
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
