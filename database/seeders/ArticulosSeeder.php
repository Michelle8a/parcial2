<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $data = array(
            ['Nombre'=>'Camisa','Descripcion'=>'Camisa de algodon', 'CantInventario'=>50, 'Precio'=>15.99],
            ['Nombre'=>'Pantalon','Descripcion' => 'Pantalon de mezclilla','CantInventario' => 40, 'Precio' => 25.50],
            ['Nombre'=> 'Zapatos','Descripcion' => 'Zapatos deportivos','CantInventario' => 30, 'Precio' => 45.00],
            ['Nombre'=> 'Gorra','Descripcion' => 'Gorra ajustable','CantInventario' => 60, 'Precio' => 8.75],
            ['Nombre' => 'Mochila','Descripcion' => 'Mochila resistente', 'CantInventario' => 25, 'Precio' => 32.00],
            ['Nombre'=> 'Reloj','Descripcion' => 'Reloj de pulsera','CantInventario'=> 20, 'Precio' => 55.90],
            ['Nombre' => 'Lentes','Descripcion' => 'Lentes de sol', 'CantInventario'=> 35, 'Precio' => 18.25],
            ['Nombre'=> 'Chaqueta','Descripcion' =>'Chaqueta impermeable','CantInventario' => 15, 'Precio' => 60.00],
            ['Nombre'=> 'Calcetines','Descripcion' =>'Paquete de 3 calcetines','CantInventario' => 80, 'Precio' => 6.50],
            ['Nombre'=> 'Cinturon','Descripcion' => 'Cinturon de cuero', 'CantInventario' =>45, 'Precio' => 12.80],
            ['Nombre' => 'Bufanda','Descripcion'=> 'Bufanda de lana', 'CantInventario' =>22, 'Precio' => 14.40],
            ['Nombre' => 'Guantes','Descripcion'=>'Guantes termicos','CantInventario' => 28, 'Precio' => 9.99],
        );

        DB::table('articulos')->insert($data);
    }
}