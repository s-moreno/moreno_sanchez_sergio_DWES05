<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    // Tabla de la BD asociada con el modelo
    protected $table = 'categorias';

    // Llave primaria del modelo en la tabla de de la BD
    protected $primaryKey = 'id_categoria';

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Atributos que NO serán visibles en la serialización
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Definir la relación entre los modelos categorias y productos
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id_categoria', 'id_categoria');
    }
}
