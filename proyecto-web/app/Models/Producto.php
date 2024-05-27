<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'categories_id',
        'modelo',
        'marca',
        'precio',
        'clave',
        'descripcion',
        'imagen',
        'disponible',
    ];
    public function categoria(){
        return $this->belongsTo(Categories::class, 'categories_id');
    }
}
