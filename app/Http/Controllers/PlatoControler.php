<?php

namespace App\Http\Controllers;

use App\Models\plato;
use App\Models\categoria;
use Illuminate\Http\Request;

class PlatoControler extends Controller
{
    const PAGINATION=6;
    public function index(Request $request)
    {
        $busqueda =$request->get('buscarpor');   
        $plato=plato::where('estado','=','1')->where('nombreplato','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
        return view('platos.index',compact('plato','busqueda'));
   }


   public function entrada(Request $request)
   {
       $busqueda =$request->get('buscarpor');   
       $platoEntrada=plato::where('idcategoria','=','1')->where('estado','=','1')->where('nombreplato','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
       return view('platos.Entradaindex',compact('platoEntrada','busqueda'));
  }

  public function principal(Request $request)
  {
      $busqueda =$request->get('buscarpor');   
      $platoprincipal=plato::where('idcategoria','=','2')->where('estado','=','1')->where('nombreplato','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
      return view('platos.Principalindex',compact('platoprincipal','busqueda'));
 }
 public function postre(Request $request)
 {
     $busqueda =$request->get('buscarpor');   
     $platoPostre=plato::where('idcategoria','=','3')->where('estado','=','1')->where('nombreplato','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
     return view('platos.Postreindex',compact('platoPostre','busqueda'));
}

public function bebida(Request $request)
{
    $busqueda =$request->get('buscarpor');   
    $bebida=plato::where('idcategoria','=','4')->where('estado','=','1')->where('nombreplato','like','%'.$busqueda.'%')->paginate($this::PAGINATION);
    return view('platos.bebidaindex',compact('bebida','busqueda'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view('platos.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombreplato'=>'required|max:50|unique:plato,nombreplato',
            'descripcion'=> 'required|max:50',
            'precio'=>'required',
            'idcategoria'=>'required',
        ],
        [
            'nombreplato.required' => 'Ingrese nombre del plato',
            'nombreplato.max' => 'El plato debe tener maximo 50 caracteres',
            'nombreplato.unique' => 'Ya existe dicho plato',
            'descripcion.required' => 'Ingrese descripcion del plato',
            'descripcion.max' => 'La descripcion del debe tener maximo 50 caracteres',
            'precio.required' => 'Ingrese precio del plato',
            'idcategoria.required' => 'Ingrese categoria del plato',
        ]);
        $plato = new plato();
        $plato->nombreplato=$request->nombreplato;
        $plato->imagen=$request->imagen;
        $plato->descripcion=$request->descripcion;
        $plato->precio=$request->precio;
        $plato->estado='1';
        $plato->idcategoria=$request->idcategoria;
        $plato->save();
        return redirect()->route('plato.index')->with('datos','registro');
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
        $plato = plato::findorfail($id);
        $categoria = Categoria::all();
        return view('platos.edit',compact('plato','categoria'));
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
        $data=request()->validate([
            'nombreplato'=>'required|max:50',
            'descripcion'=> 'required|max:50',
            'precio'=>'required',
            'idcategoria'=>'required',
        ],
        [
            'nombreplato.required' => 'Ingrese nombre del plato',
            'nombreplato.max' => 'El plato debe tener maximo 50 caracteres',
            'descripcion.required' => 'Ingrese descripcion del plato',
            'descripcion.max' => 'La descripcion del debe tener maximo 50 caracteres',
            'precio.required' => 'Ingrese precio del plato',
            'idcategoria.required' => 'Ingrese categoria del plato',
        ]);
        $plato = plato::findorfail($id);
        $plato->nombreplato=$request->nombreplato;
        $plato->imagen=$request->imagen;
        $plato->descripcion=$request->descripcion;
        $plato->precio=$request->precio;
        $plato->idcategoria=$request->idcategoria;
        $plato->save();
        return redirect()->route('plato.index')->with('datos','registro actualizado');
    }

    public function confirmar($id){
        $plato = plato::findorfail($id);
        return view('platos.confirmar',compact('plato'));
    }

    public function destroy($id)
    {
        $plato=plato::findorfail($id);
        $plato->estado='0';
        $plato->save();
        return redirect()->route('plato.index')->with('datos','Registro eliminado');
    }
}
