<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoIntereses;
use App\Contratos;
use DB;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //


        /*$pagos = DB::table('pago_intereses as pi')
                    ->join('articulo_contrato as ac', 'pi.id_contrato', '=', 'ac.id_contrato')
                    ->join('articulo as ar', 'ac.id_articulo', '=', 'ar.id_articulo')
                    ->join('clientes as cli', 'cli.num_cedula', '=', 'ar.id_cliente')
                    ->select('pi.id_pago_interes','pi.*', 'cli.*')
                    ->distinct()->get('pi.id_pago_interes');*/

                     $pagos = PagoIntereses::filtro($request->name)->join('articulo_contrato as ac', 'pago_intereses.id_contrato', '=', 'ac.id_contrato')
                    ->join('articulo as ar', 'ac.id_articulo', '=', 'ar.id_articulo')
                    ->join('clientes as cli', 'cli.num_cedula', '=', 'ar.id_cliente')
                    ->select('pago_intereses.id_pago_interes','pago_intereses.*', 'cli.*')
                    ->distinct()->get('pago_intereses.id_pago_interes');

        $contratos = DB::table('contratos  as c')
                    ->join('articulo_contrato as ar', 'c.id_contrato', '=', 'ar.id_contrato')
                    ->join('articulo as art', 'ar.id_articulo', '=', 'art.id_articulo')
                    ->join('clientes as cl', 'cl.num_cedula', '=', 'art.id_cliente')
                    ->distinct('c.id_contrato')
                    ->select('c.*', 'cl.*')
                    ->get('pi.id_pago_interes');




  
        return View('pagos')
                ->with(['pagos'=>$pagos, 'contratos' =>$contratos]);
          
        
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
          'id_contrato' => $request->id_contrato,
          'fecha_pago' => $request->fecha_pago,
          'valor_pago' => $request->valor_pago,
          'cuota_pagada' => $request->cuota_pagada
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
    public function edit(Request $request)
    {
        //  

            $pago = PagoIntereses::find($request->id_pago);
            $pago->id_contrato = $request->id_contrato;
            $pago->fecha_pago = $request->fecha_pago;
            $pago->valor_pago = $request->valor_pago;
            $pago->cuota_pagada = $request->cuota_pagada;

            $pago->save();

            session()->flash('success','Pago Modificado Correctamente');
            return redirect()->route('pagos.index');
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
