<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Mesa;
use App\Models\plato;
use App\Models\Pedido;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    //
    const PAGINATION=5;
    public function index(Request $request)
    {
        $pedidos=Pedido::where('estado','=','Registrado')->paginate($this::PAGINATION);
        return view('pedidos.index',compact('pedidos'));
    }
    public function show()
    {
        $pedidos=Pedido::where('estado','!=','Registrado')->paginate($this::PAGINATION);
        return view('pedidos.historial',compact('pedidos'));
    }

    public function create()
    {
        $platos=plato::all();
        $clientes=Cliente::all();
        $mesas=Mesa::where('estado','=','1')->get();
        return view('pedidos.create',compact('platos','clientes','mesas'));
    }



    public function store(Request $request){
        $pedido=new Pedido();
            $pedido->dni=$request->dni;
            $pedido->fecha=$request->fecha;
            $pedido->idmesa=$request->idmesa;
            $pedido->estado='Registrado';
            $pedido->total=$request->total;
            $pedido->save();
            $mesa=Mesa::findOrFail($request->idmesa);
            $mesa->estado='0';
            $mesa->save();
            /* Grabar Detalle */
            //$detalleventa=$request->get('detalles');
            $idplato = $request->get('idplato');
            $cantidad = $request->get('cantidad');
            $precio = $request->get('precio');
            $especificacion = $request->get('especificacion');
            $subtotal = $request->get('subtotal');
            $cont = 0;
                while ($cont<count($idplato)) {
                    $detalle=new Detalle();
                    $detalle->idpedido = $pedido->idpedido;
                    $detalle->idplato = $idplato[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->precio = $precio[$cont];
                    $detalle->especificacion = $especificacion[$cont];
                    $detalle->subtotal = $subtotal[$cont];
                    $detalle->save();
                    $cont=$cont+1;
                }
        return redirect()->route('pedidos.index')->with('datos','Pedido registrado al sistema.');
    }   

    public function edit($id)
    {
        $pedido=Pedido::findOrFail($id);
        $detalles=Detalle::where('idpedido','=',$id)->get();
        return view('pedidos.edit',compact('detalles','pedido'));
    }

    public function pagar($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->estado="Cancelado";
        $pedido->save();
        $mesa=Mesa::findOrFail($pedido->idmesa);
        $mesa->estado='1';
        $mesa->save();
        //$pedido=Pedido::where('idpedido','=','id');
        $detalles=Detalle::where('idpedido','=',$id)->get();
        $pdf = PDF::loadView('pedidos.pdf',['pedido'=>$pedido,'detalles'=>$detalles,'mesa'=>$mesa]);
        return $pdf->download('boleta.pdf');
        //return $pdf->stream('boleta.pdf');
        return redirect()->route('pedidos.index')->with('datos','Pedido Pagado.'); 
        
        
    }
    public function destroy($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->estado="Eliminado";
        $pedido->save();
        return redirect()->route('pedidos.index')->with('datos','Pedido Eliminado');
    }

    
}
