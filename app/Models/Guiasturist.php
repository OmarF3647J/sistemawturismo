<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guiasturist extends Model
{
    /** @use HasFactory<\Database\Factories\GuiasturistFactory> */
    use HasFactory;
    protected $primaryKey = 'idguiatur';

    protected $fillable = ['nomguiatur', 'nomresguiatur', 'telguiatur', 'corguiatur', 'imgguiatur'];

    public function centrosturist() : BelongsToMany {
        return $this->belongsToMany(Centrosturist::class,'centrosturist_guiasturist','idguiatur','idcentur');
    }

    public function actividadturist() : BelongsToMany {
        return $this->belongsToMany(Actividadturist::class,'guiasturist_actividadturist','idguiatur','idacttur');
    }
}
