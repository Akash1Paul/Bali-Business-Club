<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table='userdetails';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'pseudo',
        'd_où_viens_tu',
        'es_tu_installé_à_Bali',
        'depuis_combien_de_temps',
        'pour_combien_de_temps_seras_tu_à_Bali',
        'wpnumber',
        'instagram',
        'tictok',
        'linkedin',
        'tes_meilleures_skills',
        'ton_parcours',
        'tes_hobbies_à_bali',
        'profile_pic'
    ];
}
