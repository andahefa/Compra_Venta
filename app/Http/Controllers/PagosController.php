<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoIntereses;
use DB;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pagos = DB::table('pago_intereses as pi')
                    ->join('articulo_contrato as ac', 'pi.id_contrato', '=', 'ac.id_contrato')
                    ->join('articulo as ar', 'ac.id_articulo', '=', 'ar.id_articulo')
                    ->join('clientes as cli', 'cli.num_cedula', '=', 'ar.id_cliente')
                    ->select('pi.id_pago_interes','pi.*', 'cli.*')
                    ->distinct()->get('pi.id_pago_interes');

  
        return View('pagos')
                ->with(['pagos'=>$pagos]);
          
        
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

        $pagos = new PagoIntereses([
          'id_pago_interes' => 0,
          'id_contrato' => $request->get('idContrato'),
          'fecha_pago' => $request->get('fechaPago'),
          'valor_pago' => $request->get('valorPago'),
          'id_contrato' => $request->get('idContrato'),
          'cuota_pagada' => $request->get('mesPago')
        ]);

        $pagos->save();
        session()->flash('success','Pago Creada Correctamente');
        return redirect()->route('pagos.index');
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
