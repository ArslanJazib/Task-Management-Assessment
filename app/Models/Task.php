<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id'
    ];

    protected $primaryKey = 'id';

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
