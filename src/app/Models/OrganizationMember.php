<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class OrganizationMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'organization_member_roles');
    }

    public function skills()
    {
        return $this->belongsToMany(OrganizationSkill::class, 'organization_member_skills');
    }
}
