<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'perfil_nome',
    ];

    // Perfil tem um Usuário
    public function usuario(): HasOne
    {
        return $this->hasOne(User::class, 'id_perfil');
    }
}