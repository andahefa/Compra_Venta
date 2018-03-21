<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria_Articulo;
use App\Estado_Articulo;
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
        $articulos = Articulo::orderBy('id_articulo')->get();
        $estados = Estado_Articulo::orderBy('id_estado_articulo')->get();
        $categorias = Categoria_Articulo::orderBy('id_categoria')->get();
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
          
           $i= $i+1; 
        }

       
        return view('index')
            ->with(['articulos' =>$datos, 'estados' => $estados, 'categorias' => $categorias] );
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

          return view('create')
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
        $articulo = new Articulo([
          'id_articulo' => 0,
          'id_categoria' => $request->get('categoria'),
          'id_estado_articulo' => $request->get('estado'),
          'marca' => $request->get('marca'),
          'referencia' => $request->get('referencia'),
          'descripcion' => $request->get('descripcion')
        ]);

        $articulo->save();
        return redirect('articulo/create');
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
    public function edit($id)
    {
        //

           $articulo = Articulo::find($id);
            $articulo->name = Input::get('name');
            $articulo->email = Input::get('email');
            $articulo->nerd_level = Input::get('nerd_level');
            $articulo->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('/index');

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

    public function consultar($dato){

    }
}
