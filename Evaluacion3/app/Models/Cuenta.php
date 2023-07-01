<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuenta extends Authenticable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function perfil():BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }

    public function imagenes():HasMany
    {
        return $this->hasMany(Imagen::class);
    }
}
