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
        'description',
        'status',
        'file',
    ];

    // Relación uno a muchos con la tabla clients
    public function client(){
        return $this->belongsTo(Client::class, 'client');
    }

    // Relación uno a muchos con la tabla users
    public function admin(){
        return $this->belongsTo(User::class, 'admin');
    }

    // Relación muchos a muchos con la tabla users a través de la tabla collaborator_project
    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'collaborator_project', 'project_id', 'collaborator_id');
    }

    // Función para obtener los pagos de los colaboradores
    public function collaboratorPayments()
    {
        return $this->belongsToMany(User::class, 'collaborator_project' , 'project_id', 'collaborator_id')
            ->withPivot('payment')
            ->withTimestamps();
    }
}
