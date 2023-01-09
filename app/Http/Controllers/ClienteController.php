<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class ClienteController extends Controller
{
    const PAGINATION=9;

    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $cliente=Cliente::where('estado','=','1')->where('nombres',
        'like','%'.$buscarpor."%")->paginate($this::PAGINATION);
        return view('clientes.index',compact('cliente','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('clientes.create');
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
            'dni'=>'required|digits:8|unique:clientes,dni',
            'nombres'=> 'required|max:50|unique:clientes,nombres',
            'telefono'=> 'required|digits:9|unique:clientes,telefono',
            'tipo'=>'required|max:15',
            'direccion'=>'max:100',
            
        ],
        [
            'dni.required' => 'Ingrese dni del cliente',
            'dni.max' => 'El dni debe tener 8 caracteres',
            'dni.unique' => 'Ya existe un cliente con dicho dni',
            'nombres.required' => 'Ingrese nombre del cliente para registrarse.',
            'nombres.max' => 'El nombre del cliente puede tener maximo 50 caracteres.',
            'nombres.unique' => 'Ya existe un usuario con el mismo nombre',
            'telefono.required' => 'Ingrese telefono',
            'telefono.max' => 'El telefono debe tener 9 caracteres',
            'telefono.unique' => 'Ya existe un cliente con dicho telefono',
            'tipo.required' => 'Ingrese tipo de cliente',
            'direccion.max' => 'La direccion debe tener como maximo 100 caracteres',
        ]);
        $cliente = new Cliente();
        $cliente->dni=$request->dni;
        $cliente->nombres=$request->nombres;
        $cliente->telefono=$request->telefono;
        $cliente->tipo=$request->tipo;
        $cliente->direccion=$request->direccion;
        $cliente->estado='1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente registrado al sistema.');
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
        $cliente=Cliente::findOrFail($id);
        return view('clientes.edit',compact('cliente'));
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
        $data=request()->validate([
            'dni'=>'digits:8',
            'nombres'=> 'required|max:50',
            'telefono'=> 'required|digits:9',
            'tipo'=>'required|max:15',
            'direccion'=>'max:100',
            
        ],
        [
            'dni.max' => 'El dni debe tener 8 caracteres',
            'nombres.required' => 'Ingrese nombre del cliente para registrarse.',
            'nombres.max' => 'El nombre del cliente puede tener maximo 50 caracteres.',
            'telefono.required' => 'Ingrese telefono',
            'telefono.max' => 'El telefono debe tener 9 caracteres',
            'tipo.required' => 'Ingrese tipo de cliente',
            'direccion.max' => 'La direccion debe tener como maximo 100 caracteres',
        ]);
        $cliente= Cliente::findOrFail($id);
        $cliente->nombres=$request->nombres;
        $cliente->telefono=$request->telefono;
        $cliente->tipo=$request->tipo;
        $cliente->direccion=$request->direccion;
        $cliente->estado=1;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente= Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente Eliminado');
    }

}
