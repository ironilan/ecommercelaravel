<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datosenvio extends Model
{
    use HasFactory;

    public function depart()
    {
        return $this->belongsTo(Departamento::class, 'departamento');
    }


    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function distrit()
    {
        return $this->belongsTo(Distrito::class, 'distrito');
    }
}
