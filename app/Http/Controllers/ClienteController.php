<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private function reglas()
    {
        return [
            'Nombre'    => 'required|string|max:50',
            'Apellido'  => 'required|string|max:50',
            'Fecha_Nac' => 'required|date|before_or_equal:today',
        ];
    }

    // Listado (READ)
    public function show()
    {
        $clientes = Cliente::withCount('pedidos')->orderBy('Id_Cliente')->get();
        return view('cliente.show', compact('clientes'));
    }

    // Formulario de nuevo cliente
    public function create()
    {
        return view('cliente.create');
    }

    // CREATE
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        Cliente::create($datos);
        return redirect()->route('cliente.show')->with('ok', 'Cliente creado');
    }

    // Formulario de edición
    public function edit(Cliente $cliente)
    {
        return view('cliente.update', compact('cliente'));
    }

    // UPDATE
    public function update(Request $request, Cliente $cliente)
    {
        $datos = $request->validate($this->reglas());

        $cliente->update($datos);
        return redirect()->route('cliente.show')->with('ok', 'Cliente actualizado');
    }

    // DELETE (los pedidos del cliente se eliminan en cascada por la llave foránea)
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.show')->with('ok', 'Cliente eliminado');
    }
}
