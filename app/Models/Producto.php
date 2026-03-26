<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    protected $primaryKey = 'idproduct';

    protected $fillable = ['nomproduct'];

    public function centrosturist() : HasMany {
        return $this->hasMany(Centrosturist::class, 'idproduct', 'idproduct');
    }
}
