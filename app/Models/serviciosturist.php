<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class serviciosturist extends Model
{
    /** @use HasFactory<\Database\Factories\ServiciosturistFactory> */
    use HasFactory;

    protected $primaryKey = 'idsertur';

    protected $fillable = ['nomsertur'];

    public function centros() : BelongsToMany {
        return $this->belongsToMany(centrosturist::class,'centrosturist_serviciosturist','idsertur','idcentur');
    }

}
