<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }


   


    public function imagens()
    {
        return $this->hasMany(Imagen::class, 'producto_id');
    }

    public function infoproductos()
    {
        return $this->hasMany(Infoproducto::class);
    }


    // public function pesos()
    // {
    //     return $this->hasMany(Peso::class);
    // }

    public function precios()
    {
        return $this->hasMany(Precio::class);
    }


   


    /*
     * SCOPE
     */

    public function scopeCategoria($query, $id)
    {
        if($id)
            return $query->where('categoria_id', $id);
    }

    public function scopeSubcategoria($query, $id)
    {
        if($id)
            return $query->where('subcategoria_id', $id);
    }

    public function scopeMarca($query, $id)
    {
        if($id)
            return $query->where('marca_id', $id);
    }



    public function scopePrecio($query, $precio)
    {
        if($precio)
            //dd($precio);
            return $query->where('precio_actual', '<=', $precio);
    }


    public function scopeCriterio($query, $criterio)
    {
        if($criterio)
            //dd($precio);
            return $query->where('titulo', 'like', "%$criterio%");
    }




}

