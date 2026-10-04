<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePedidoController extends Controller
{
    private function reglas()
    {
        return [
            'Id_Articulo' => 'required|exists:articulos,Id_Articulo',
            'Cantidad'    => 'required|integer|min:1',
            'Descuento'   => 'nullable|numeric|min:0',
        ];
    }

    public function index(Pedido $pedido)
    {
        $detalles = DB::table('detalle_pedidos')
            ->join('articulos', 'articulos.Id_Articulo', '=', 'detalle_pedidos.Id_Articulo')
            ->where('detalle_pedidos.Id_Pedido', $pedido->Id_Pedido)
            ->select('detalle_pedidos.*', 'articulos.Nombre', 'articulos.Precio')
            ->get();

        $articulos = DB::table('articulos')->orderBy('Nombre')->get();

        return view('pedido.detalles', compact('pedido', 'detalles', 'articulos'));
    }

    public function store(Request $request, Pedido $pedido)
    {
        $datos = $request->validate($this->reglas());

        $existe = DB::table('detalle_pedidos')
            ->where('Id_Pedido', $pedido->Id_Pedido)
            ->where('Id_Articulo', $datos['Id_Articulo'])
            ->exists();

        if ($existe) {
            return back()->withErrors(['Id_Articulo' => 'Ese artículo ya está en el pedido.'])->withInput();
        }

        DB::table('detalle_pedidos')->insert([
            'Id_Pedido'   => $pedido->Id_Pedido,
            'Id_Articulo' => $datos['Id_Articulo'],
            'Cantidad'    => $datos['Cantidad'],
            'Descuento'   => $datos['Descuento'] ?? 0,
        ]);

        return redirect()->route('detalle.index', $pedido->Id_Pedido)->with('ok', 'Artículo agregado');
    }

    public function edit(Pedido $pedido, $articulo)
    {
        $detalle = DB::table('detalle_pedidos')
            ->join('articulos', 'articulos.Id_Articulo', '=', 'detalle_pedidos.Id_Articulo')
            ->where('detalle_pedidos.Id_Pedido', $pedido->Id_Pedido)
            ->where('detalle_pedidos.Id_Articulo', $articulo)
            ->select('detalle_pedidos.*', 'articulos.Nombre')
            ->first();

        abort_if(!$detalle, 404);

        return view('pedido.detalle-edit', compact('pedido', 'detalle'));
    }

    public function update(Request $request, Pedido $pedido, $articulo)
    {
        $datos = $request->validate([
            'Cantidad'  => 'required|integer|min:1',
            'Descuento' => 'nullable|numeric|min:0',
        ]);

        DB::table('detalle_pedidos')
            ->where('Id_Pedido', $pedido->Id_Pedido)
            ->where('Id_Articulo', $articulo)
            ->update([
                'Cantidad'  => $datos['Cantidad'],
                'Descuento' => $datos['Descuento'] ?? 0,
            ]);

        return redirect()->route('detalle.index', $pedido->Id_Pedido)->with('ok', 'Detalle actualizado');
    }

    public function destroy(Pedido $pedido, $articulo)
    {
        DB::table('detalle_pedidos')
            ->where('Id_Pedido', $pedido->Id_Pedido)
            ->where('Id_Articulo', $articulo)
            ->delete();

        return redirect()->route('detalle.index', $pedido->Id_Pedido)->with('ok', 'Artículo quitado del pedido');
    }
}