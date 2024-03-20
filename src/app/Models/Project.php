<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function members()
    {
        return $this->belongsToMany(OrganizationMember::class, 'project_organization_member');
    }
}
