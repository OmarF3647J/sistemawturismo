<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class guiasturist extends Model
{
    /** @use HasFactory<\Database\Factories\GuiasturistFactory> */
    use HasFactory;
    protected $primaryKey = 'idguiatur';

    protected $fillable = ['nomguiatur', 'telguiatur', 'corguiatur'];

    public function centrosturist() : BelongsToMany {
        return $this->belongsToMany(centrosturist::class,'centrosturist_guiasturist','idguiatur','idcentur');
    }

    public function actividadturist() : BelongsToMany {
        return $this->belongsToMany(actividadturist::class,'guiasturist_actividadturist','idguiatur','idacttur');
    }
}
