<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            ['FechaPedido' => '2026-09-01 09:00:00','FechaEntrega'=> '2026-09-05 15:00:00', 'Observaciones' => 'Entregar en la manana','Id_Cliente' => 1],
            ['FechaPedido' => '2026-09-02 10:30:00','FechaEntrega'=> '2026-09-06 14:00:00','Observaciones' => 'Fragil','Id_Cliente' => 2],
            ['FechaPedido' => '2026-09-03 11:15:00', 'FechaEntrega'=> '2026-09-08 16:30:00','Observaciones' => 'Llamar antes de llegar','Id_Cliente' => 3],
            ['FechaPedido' => '2026-09-04 08:45:00', 'FechaEntrega'=> '2026-09-09 12:00:00', 'Observaciones' => 'Dejar con el vigilante','Id_Cliente' => 4],
            ['FechaPedido'=> '2026-09-05 13:20:00', 'FechaEntrega' => '2026-09-10 10:00:00', 'Observaciones' => 'Sin observaciones','Id_Cliente' => 5],
            ['FechaPedido' => '2026-09-06 16:00:00', 'FechaEntrega'=> '2026-09-11 17:00:00', 'Observaciones' => 'Entrega urgente','Id_Cliente' => 6],
            ['FechaPedido'=> '2026-09-07 09:30:00', 'FechaEntrega'=> '2026-09-12 11:30:00', 'Observaciones' => 'Regalo, incluir tarjeta','Id_Cliente' => 7],
            ['FechaPedido'=> '2026-09-08 14:10:00', 'FechaEntrega'=> '2026-09-13 13:00:00', 'Observaciones' => 'Pago contra entrega','Id_Cliente' => 8],
            ['FechaPedido'=> '2026-09-09 12:00:00', 'FechaEntrega'=> '2026-09-14 15:45:00','Observaciones' => 'Entregar a recepcion','Id_Cliente' => 9],
            ['FechaPedido'=> '2026-09-10 10:05:00', 'FechaEntrega' => '2026-09-15 09:30:00', 'Observaciones' => 'Cliente frecuente','Id_Cliente' => 10],
            ['FechaPedido' => '2026-09-11 15:40:00', 'FechaEntrega' => '2026-09-16 16:00:00', 'Observaciones'=>'Verificar direccion','Id_Cliente' => 11],
            ['FechaPedido' => '2026-09-12 11:50:00', 'FechaEntrega' => '2026-09-17 14:20:00','Observaciones'=>'Entregar en la tarde','Id_Cliente' => 12],
        );

        DB::table('pedidos')->insert($data);
    }
}
