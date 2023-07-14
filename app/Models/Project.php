<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Campos que se pueden modificar
    protected $fillable = [
        'name',
        'client',
        'start_date',
        'end_date',
        'price',
        'priority',
        'admin',
        'collaborator',
        'description',
        'file',
    ];
}
