<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use App\Models\Orden;
use Illuminate\Http\Request;

class DetalleOrdenController extends Controller
{
    //
    const PAGINATION=9;

    public function index($idorden)
    {
        $dorden=DetalleOrden::where('idorden','=',$idorden)->paginate($this::PAGINATION);
        $orden=$idorden;
        return view('ordendetalle.index',compact('dorden','orden'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($ordenx)
    {
        $orden=$ordenx;
        return view('ordendetalle.create',compact('orden'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idorden)
    {
        //
        $data=request()->validate([
            'producto'=>'required',
            'unidad'=> 'required',
            'cantidad'=> 'required',
        ],
        [
            'producto.required' => 'Ingrese producto requerido.',
            'unidad.required' => 'Ingrese el tipo de unidad de producto.',
            'cantidad.required'=> 'Ingrese la cantidad a solicitar',
        ]);
        $dorden = new DetalleOrden();
        $dorden->idorden=$idorden;
        $dorden->producto=$request->producto;
        $dorden->unidad=$request->unidad;
        $dorden->cantidad=$request->cantidad;
        $dorden->save();
        return redirect()->route('ordendetalle.index',$idorden)->with('datos','Producto registrado en la orden.');
    }

}
