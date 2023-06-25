<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'perfiles';
    public $timestamps = false;

    public function cuentas():HasMany
    {
        return $this->hasMany(Cuenta::class);
    }
}
