<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoricoPagos;
use DB;

class HistoricoPagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        //$historicoPagos = HistoricoPagos::Filtro($request->name)->get();
        /*$historicoPagos = DB::table('historico_pagos as h')
                    ->join('contratos as c', 'h.id_contrato', '=', 'c.id_contrato')
                    ->join('articulo_contrato as a', 'c.id_contrato', '=', 'a.id_contrato')
                    ->join('articulo as ar', 'ar.id_articulo', '=', 'a.id_articulo')
                    ->join('clientes as cli', 'ar.id_cliente', '=', 'cli.num_cedula')
                    ->select('h.*', 'cli.*')
                    ->distinct('h.id_historico')->get();*/

         $historicoPagos = HistoricoPagos::Filtro($request->name)->join('contratos as c', 'historico_pagos.id_contrato', '=', 'c.id_contrato')
                    ->join('articulo_contrato as a', 'c.id_contrato', '=', 'a.id_contrato')
                    ->join('articulo as ar', 'ar.id_articulo', '=', 'a.id_articulo')
                    ->join('clientes as cli', 'ar.id_cliente', '=', 'cli.num_cedula')
                    ->select('historico_pagos.*', 'cli.*')
                    ->distinct('')->get('historico_pagos.id_historico');

        $contratos = DB::table('contratos  as c')
                    ->join('articulo_contrato as ar', 'c.id_contrato', '=', 'ar.id_contrato')
                    ->join('articulo as art', 'ar.id_articulo', '=', 'art.id_articulo')
                    ->join('clientes as cl', 'cl.num_cedula', '=', 'art.id_cliente')
                    ->distinct('c.id_contrato')
                    ->select('c.*', 'cl.*')
                    ->get('pi.id_pago_interes');
  
        return View('historico_pagos')
                ->with(['historicoPagos'=>$historicoPagos, 'contratos'=>$contratos] );
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
