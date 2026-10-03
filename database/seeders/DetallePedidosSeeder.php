<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallePedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            ['Id_Articulo'=> 1,'Id_Pedido' => 1,'Cantidad' => 2,'Descuento' => 0.00],
            ['Id_Articulo'=> 2, 'Id_Pedido' => 2, 'Cantidad' => 1, 'Descuento' => 0.05],
            ['Id_Articulo'=> 3, 'Id_Pedido' => 3,'Cantidad' => 3, 'Descuento' => 0.10],
            ['Id_Articulo'=> 4,'Id_Pedido' => 4,'Cantidad' => 5, 'Descuento' => 0.00],
            ['Id_Articulo'=> 5,'Id_Pedido' =>5,'Cantidad' => 1, 'Descuento' => 0.15],
            ['Id_Articulo'=> 6,'Id_Pedido' =>6,'Cantidad' => 2,'Descuento' => 0.05],
            ['Id_Articulo'=> 7,'Id_Pedido' =>7,'Cantidad' => 4, 'Descuento' => 0.00],
            ['Id_Articulo'=> 8,'Id_Pedido' =>8, 'Cantidad' => 1, 'Descuento' => 0.20],
            ['Id_Articulo'=> 9, 'Id_Pedido' =>9, 'Cantidad' => 6, 'Descuento' => 0.10],
            ['Id_Articulo'=> 10,'Id_Pedido' => 10,'Cantidad' => 2, 'Descuento' => 0.00],
            ['Id_Articulo'=> 11, 'Id_Pedido' => 11, 'Cantidad' => 3, 'Descuento' => 0.05],
            ['Id_Articulo'=> 12, 'Id_Pedido' => 12, 'Cantidad' => 2, 'Descuento' => 0.10],
        );

        DB::table('detalle_pedidos')->insert($data);
    }
}
