<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = '_id';
    protected $fillable = ['_id','title'];
    protected $collection = 'categories_coleccion';
    public function libros() {
        return $this->hasMany(Libro::class);
    }
}
