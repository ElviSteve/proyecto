<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;


class OrdenController extends Controller
{
    //
    const PAGINATION=9;

    public function index(Request $request)
    {
        $orden=Orden::where('estado','=','1')->paginate($this::PAGINATION);
        return view('ordenes.index',compact('orden'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('ordenes.create');
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
        $data=request()->validate([
            'fecha'=>'required',
            'encargado'=> 'required',
        ],
        [
            'fecha.required' => 'Ingrese fecha de la orden',
            'encargado.required' => 'Ingrese el nombre del encargado',
        ]);
        $orden = new Orden();
        $orden->fecha=$request->fecha;
        $orden->encargado=$request->encargado;
        $orden->estado="1";
        $orden->save();
        return redirect()->route('ordenes.index')->with('datos','Orden registrada en el sistema.');
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
    // public function edit($id)
    // {
    //     $cliente=Cliente::findOrFail($id);
    //     return view('clientes.edit',compact('cliente'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden= Orden::findOrFail($id);
        $orden->estado='0';
        $orden->save();
        return redirect()->route('ordenes.index')->with('datos','Orden Eliminado');
    }
}
