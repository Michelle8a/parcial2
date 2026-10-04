<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    private function reglas()
    {
        return [
            'Nombre'         => 'required|string|max:50',
            'Descripcion'    => 'required|string|max:150',
            'CantInventario' => 'required|integer|min:0',
            'Precio'         => 'required|numeric|min:0',
        ];
    }

    // Listado (READ)
    public function show()
    {
        $articulos = Articulo::orderBy('Id_Articulo')->get();

        // Cuántos pedidos usan cada artículo: [Id_Articulo => total]
        $usos = DB::table('detalle_pedidos')
            ->select('Id_Articulo', DB::raw('COUNT(*) as total'))
            ->groupBy('Id_Articulo')
            ->pluck('total', 'Id_Articulo');

        return view('articulo.show', compact('articulos', 'usos'));
    }

    // Formulario de nuevo artículo
    public function create()
    {
        return view('articulo.create');
    }

    // CREATE
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        Articulo::create($datos);
        return redirect()->route('articulo.show')->with('ok', 'Artículo creado');
    }

    // Formulario de edición
    public function edit(Articulo $articulo)
    {
        return view('articulo.update', compact('articulo'));
    }

    // UPDATE
    public function update(Request $request, Articulo $articulo)
    {
        $datos = $request->validate($this->reglas());

        $articulo->update($datos);
        return redirect()->route('articulo.show')->with('ok', 'Artículo actualizado');
    }

    // DELETE (sus líneas en detalle_pedidos se eliminan en cascada por la llave foránea)
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulo.show')->with('ok', 'Artículo eliminado');
    }
}
