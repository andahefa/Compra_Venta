<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_Articulo;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categorias = Categoria_Articulo::orderBy('id_categoria')->get();
        return View('categorias')
                ->with(['categorias'=>$categorias]);
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
        $categoria = new Categoria_Articulo([
          'id_categoria' => 0,
          'nombre' => $request->get('nombre')
        ]);

        session()->flash('success','Categoria Creada Correctamente');
        $categoria->save();
        return redirect()->route('categorias.index');
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

         /*Validaciones de los campos*/

        $this->validate($request, [
        'nombre' => 'required'
        ]);

            $categoria = Categoria_Articulo::find($request->get('idCategoria'));
            $categoria->id_categoria = $request->get('idCategoria');
            $categoria->nombre = $request->get('nombre');

            $categoria->save();

            // redirect
            //Session::flash('message', 'Successfully updated nerd!');
            return 1;
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

        $categoria = Categoria_Articulo::where('id_categoria', '=', $id)->delete();
        session()->flash('success','Categoria Eliminada Correctamente');
        return redirect()->route('categorias.index');
                            
    }
}
