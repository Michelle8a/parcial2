<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            ['Nombre'=> 'Karina',  'Apellido' => 'Ochoa',  'Fecha_Nac' => '1995-03-12'],
            ['Nombre'=> 'Daniela','Apellido'=> 'Fernanda', 'Fecha_Nac' =>'1992-07-25'],
            ['Nombre'=> 'Tatiana','Apellido' => 'Esmeralda', 'Fecha_Nac' => '1998-11-02'],
            ['Nombre' => 'Carlos','Apellido' =>'Alfaro','Fecha_Nac'=> '1990-01-18'],
            ['Nombre' => 'Diego', 'Apellido' =>'Mejia', 'Fecha_Nac' => '2000-05-30'],
            ['Nombre' => 'Pedro','Apellido' =>'Gomez',  'Fecha_Nac' => '1994-09-09'],
            ['Nombre'=> 'Laura','Apellido' => 'Flores','Fecha_Nac'=>'1997-12-21'],
            ['Nombre'=> 'Jose','Apellido'=>'Ramirez', 'Fecha_Nac' => '1991-04-14'],
            ['Nombre' => 'Carmen','Apellido' => 'Torres','Fecha_Nac' => '1996-08-07'],
            ['Nombre' => 'Miguel','Apellido' => 'Castillo','Fecha_Nac' => '1993-02-27'],
            ['Nombre' => 'Milton', 'Apellido' =>'Jimenez', 'Fecha_Nac' => '1999-10-16'],
            ['Nombre' => 'Ana', 'Apellido' => 'Maria', 'Fecha_Nac' => '1989-06-03'],
        );

        DB::table('clientes')->insert($data);
    }
}
