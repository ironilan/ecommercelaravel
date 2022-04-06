<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidoentregado extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $casts = [
        'fecha_pago' => 'datetime'
    ];

    public function envio()
    {
        return $this->belongsTo(Envio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function pedidodetalles()
    {
        return $this->hasMany(Pedidodetalle::class);
    }



    public function datosenvios()
    {
        return $this->hasOne(Datosenvio::class, 'pedido_id', 'id');
    }
}
