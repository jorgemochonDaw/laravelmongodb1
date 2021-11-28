<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $primaryKey = '_id';
    protected $fillable = ['_id', 'title', 'description', 'age']; //categoria para meter todo uno a uno
    protected $collection = 'libros_coleccion';

    protected function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo(Category::class);
    }
}
