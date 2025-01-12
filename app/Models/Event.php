<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='events';
    protected $fillable = [
        'date',
        'name',
        'last_name',
        'form',
        'to',
        'address',
        'city',
        'about',
        'image',
        'price'
    ];
}
