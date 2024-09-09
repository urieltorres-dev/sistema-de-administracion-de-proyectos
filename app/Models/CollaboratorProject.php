<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorProject extends Model
{
    use HasFactory;

    protected $table = 'collaborator_project';

    protected $fillable = [
        'collaborator_id',
        'project_id',
        'payment',
    ];

    public function collaborator()
    {
        return $this->belongsTo(User::class, 'collaborator_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
