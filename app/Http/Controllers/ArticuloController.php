<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria_Articulo;
use App\Estado_Articulo;
use App\Clientes;
use DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $estados = Estado_Articulo::orderBy('id_estado_articulo')->get();
        $categorias = Categoria_Articulo::orderBy('id_categoria')->get();
        $cateArtic = Categoria_Articulo::orderBy('id_categoria')->get();
        $estados = Estado_Articulo::orderBy('id_estado_articulo')->get();

        $articulos = DB::table('articulo')
                    ->join('clientes', 'articulo.id_cliente', '=', 'clientes.num_cedula')
                    ->select('articulo.*', 'clientes.*')
                    ->get();
        $clientes = Clientes::orderBy('num_cedula')->get();
        error_log("Clientessss:".$clientes);

        $datos = [];
        $i = 0;
        foreach ($articulos as $articulo) {

           $categoriaArticulo = DB::select('call idCategoria(?)',[$articulo->id_categoria]);
           $estado = DB::select('call nombreEstado(?)',[$articulo->id_estado_articulo]);

            $datos[$i]["id"] = $articulo->id_articulo;
            $datos[$i]["idCategoria"] = $categoriaArticulo[0]->id_categoria;
            $datos[$i]["categoria"] = $categoriaArticulo[0]->nombre;
            $datos[$i]["idEstado"] = $estado[0]->id_estado_articulo;
            $datos[$i]["estado"] = $estado[0]->nombre;
            $datos[$i]["marca"] = $articulo->marca;
            $datos[$i]["referencia"] = $articulo->referencia;
            $datos[$i]["descripcion"] = $articulo->descripcion;
            $datos[$i]["id_cliente"] = $articulo->id_cliente;
            $datos[$i]["nombres_cliente"] = $articulo->nombres;
            $datos[$i]["apellidos_cliente"] = $articulo->apellidos;

          
           $i= $i+1; 
        }

       
        return view('index')
            ->with(['articulos' =>$datos, 'estados' => $estados, 'categorias' => $categorias, 'tipos' =>$cateArtic, 'estados' => $estados, 'clientes' => $clientes] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cateArtic = Categoria_Articulo::orderBy('id_categoria')->get();
        $estados = Estado_Articulo::orderBy('id_estado_articulo')->get();

          return view('createArticulo')
            ->with(['tipos' =>$cateArtic, 'estados' => $estados]);
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
        $articulo = new Articulo([
          'id_articulo' => 0,
          'id_categoria' => $request->get('categoria'),
          'id_estado_articulo' => $request->get('estado'),
          'marca' => $request->get('marca'),
          'referencia' => $request->get('referencia'),
          'descripcion' => $request->get('descripcion'),
          'id_cliente' => $cedula[0]
        ]);

        $articulo->save();
        session()->flash('success','Articulo Creado Correctamente');
        return redirect()->route('articulos.index');
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

            // store
         
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {       

        /*Validaciones de los campos*/
        $this->validate($request, [
        'categoria' => 'required',
        'estado' => 'required',
        'marca' => 'required',
        'referencia' => 'required',
        'descripcion' => 'required'
        ]);
            $cedula = explode("-", $request->get('cliente'));
            $articulo = Articulo::find($request->id);
            $articulo->id_categoria = $request->categoria;
            $articulo->id_estado_articulo = $request->estado;
            $articulo->marca = $request->marca;
            $articulo->referencia = $request->referencia;
            $articulo->descripcion = $request->descripcion;
            $articulo->id_cliente = $cedula[0];

            $articulo->save();

            session()->flash('success','Articulo Actualizado Correctamente');
            return redirect()->route('articulos.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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

    public function consultar($dato){

    }
}
