<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'client',
        'name',
        'start_date',
        'end_date',
        'price',
        'priority',
        'admin',
        'collaborator',
        'file',
    ];
}
