<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class MesaController extends Controller
{
    const PAGINATION=9;

    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');

        $mesa=Mesa::where('estado','!=','3')->where('estado','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('mesas.index',compact('mesa','buscarpor'));
    }

    public function create()
    {
        $mesa = new Mesa();
        $mesa->estado=1;
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa creada');
    }

    public function destroy($id)
    {
        $mesa=Mesa::findOrFail($id);
        $mesa->estado="3";
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa Eliminada');
    
    }
}
