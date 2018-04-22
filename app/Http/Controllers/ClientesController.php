<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $result;
    function __construct(\stdClass $result){
        $this->result = $result;
    }

    public function index()
    {
        //
        $clientes = Clientes::orderBy('num_cedula')->get();
           return view('clientes')
            ->with(['clientes' =>$clientes] );
          
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

        $cliente = new Clientes([
          'num_cedula' => $request->get('cedula'),
          'nombres' => $request->get('nombres'),
          'apellidos' => $request->get('apellidos'),
          'telefono' => $request->get('telefono'),
          'direccion_residencia' => $request->get('direccion')

        ]);

        
        $cliente->save();
        session()->flash('success','Cliente Creado Correctamente');
        return redirect()->route('clientes.index');

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

        error_log("Entreeeeeeeeeeeee al controladorrrr");
        error_log($request);
            $this->validate($request,[
                'cedula' => 'required',
                'nombres' => 'required',
                'apellidos' => 'required',
                'telefono' => 'required',
                'direccion' => 'required'
            ]);

        /*
        $validator = Validator::make($request->all(), [
        'cedula' => 'required',
        'nombres' => 'required',
        'apellidos' => 'required',
        'telefono' => 'required',
        'direccion' => 'required'
        ]);*/

            $cliente = Clientes::find($request->get('cedula'));
            $cliente->nombres = $request->get('nombres');
            $cliente->apellidos = $request->get('apellidos');
            $cliente->telefono = $request->get('telefono');
            $cliente->direccion_residencia = $request->get('direccion');


            $cliente->save();
            session()->flash('success','Cliente Modificado Correctamente');
            return redirect()->route('clientes.index');
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

        $cliente = Clientes::where('num_cedula', '=', $id)->delete();
        session()->flash('success','Cliente Eliminado Correctamente');
        return redirect()->route('clientes.index');
                            
    }
}
