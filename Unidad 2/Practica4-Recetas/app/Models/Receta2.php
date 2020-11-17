<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta2 extends Model
{
    // Campos que se agregarán
    protected $fillable = [
        'receta', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    // Obtiene la categoria de la receta via Foreign key (FK)
    public function categoria(){
        //Belongs To se refiere a una relación 1:1 donde una receta está asociada a una categoria
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la información del usuario via FK
    public function autor(){
        return $this->belongsTo(User::class, 'user_id'); //FK de esta tablas
    }
    
}
