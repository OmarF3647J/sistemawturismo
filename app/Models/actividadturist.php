<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class actividadturist extends Model
{
    /** @use HasFactory<\Database\Factories\ActividadturistFactory> */
    use HasFactory;

    protected $primaryKey = 'idacttur';

    protected $fillable = ['nomacttur'];

    public function centros() : BelongsToMany {
        return $this->belongsToMany(centrosturist::class,'centrosturist_actividadturist','idacttur','idcentur');
    }

    public function guias() : BelongsToMany {
        return $this->belongsToMany(guiasturist::class,'guiasturist_actividadturist','idacttur','idguiatur');
    }

}
