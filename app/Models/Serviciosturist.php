<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serviciosturist extends Model
{
    /** @use HasFactory<\Database\Factories\ServiciosturistFactory> */
    use HasFactory;

    protected $primaryKey = 'idsertur';

    protected $fillable = ['nomsertur'];

    public function centrosturist() : BelongsToMany {
        return $this->belongsToMany(Centrosturist::class,'centrosturist_serviciosturist','idsertur','idcentur');
    }

}
