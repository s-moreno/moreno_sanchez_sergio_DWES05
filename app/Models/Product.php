<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Tabla de la BD asociada con el modelo
    protected $table = 'productos';

    // Llave primaria del modelo en la tabla de de la BD
    protected $primaryKey = 'id_producto';

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'stock_actual',
        'stock_minimo',
        'id_categoria'
    ];

    // Atributos que NO serán visibles en la serialización
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Definir la relación entre los modelos productos y categorías
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }
}
