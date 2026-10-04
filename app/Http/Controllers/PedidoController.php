<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Cliente;

class PedidoController extends Controller
{
    public function show()
    {
        $pedidos = Pedido::with('cliente')->get();
        return view('pedido.show', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('Nombre')->get();
        return view('pedido.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'FechaPedido'   => 'required|date',
            'FechaEntrega'  => 'required|date',
            'Observaciones' => 'nullable|string|max:150',
            'Id_Cliente' => 'required|exists:clientes,Id_Cliente',
        ]);

        Pedido::create($datos);
        return redirect()->route('pedido.show')->with('ok', 'Pedido creado');
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::orderBy('Nombre')->get();
        return view('pedido.update', compact('pedido', 'clientes'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $datos = $request->validate([
            'FechaPedido'   => 'required|date',
            'FechaEntrega'  => 'required|date',
            'Observaciones' => 'nullable|string|max:150',
            'Id_Cliente' => 'required|exists:clientes,Id_Cliente',
        ]);

        $pedido->update($datos);
        return redirect()->route('pedido.show')->with('ok', 'Pedido actualizado');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedido.show')->with('ok', 'Pedido eliminado');
    }
}