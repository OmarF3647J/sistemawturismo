<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class centrosturist extends Model
{
    /** @use HasFactory<\Database\Factories\CentrosturistFactory> */
    use HasFactory;

    

    protected $primaryKey = 'idcentur';

    protected $fillable = ['nomcentur', 'dircentur', 'descentur', 'rescentur','telcentur', 'corcentur','imgcentur', 'idproduct','activo'];
public const ACTIVO_VALUES = ['Si', 'No'];
    public function producto() : BelongsTo {
        return $this->belongsTo(producto::class, 'idproduct', 'idproduct');
    }

    public function serviciosturist() : BelongsToMany {
        return $this->belongsToMany(serviciosturist::class,'centrosturist_serviciosturist','idcentur','idsertur');
    }

    public function actividadturist() : BelongsToMany {
        return $this->belongsToMany(actividadturist::class,'centrosturist_actividadturist','idcentur','idacttur');
    }

    public function guiasturist() : BelongsToMany {
        return $this->belongsToMany(guiasturist::class,'centrosturist_guiasturist','idcentur','idguiatur');
    }
}
