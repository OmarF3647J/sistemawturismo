<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actividadturist extends Model
{
    /** @use HasFactory<\Database\Factories\ActividadturistFactory> */
    use HasFactory;

    protected $primaryKey = 'idacttur';

    protected $fillable = ['nomacttur'];
    public function centrosturist() : BelongsToMany {
        return $this->belongsToMany(Centrosturist::class,
        'centrosturist_actividadturist','idacttur','idcentur');
    }
    public function guiasturist() : BelongsToMany {
        return $this->belongsToMany(Guiasturist::class,
        'guiasturist_actividadturist','idacttur','idguiatur');
    }
}
