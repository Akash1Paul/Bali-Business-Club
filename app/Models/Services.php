<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table  = 'services';
    protected $fillable = [
        'name',
        'duration',
        'about',
        'promo_code',
        'discount',
        'image',
        'popularity'
    ];
}
