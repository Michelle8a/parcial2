<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';       
    protected $primaryKey = 'Id_Pedido';
    public $timestamps = false;

    protected $fillable = ['FechaPedido', 'FechaEntrega', 'Observaciones', 'Id_Cliente'];

    protected $casts = [
        'FechaPedido'  => 'datetime',
        'FechaEntrega' => 'datetime',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'Id_Cliente', 'Id_Cliente');
    }
}
