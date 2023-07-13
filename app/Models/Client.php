<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Campos que se pueden modificar
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'company',
    ];
}
