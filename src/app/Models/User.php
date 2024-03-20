<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organizations()
    {
        $organizations = $this->hasMany(OrganizationMember::class);
        return $organizations;
    }

    public function organization()
    {
        return $this->belongsTo(OrganizationMember::class);
    }

    public function skills()
    {
        return $this->belongsToMany(OrganizationSkill::class, 'organization_member_skills', 'organization_member_id', 'organization_skill_id');
    }

    public function experience($project_id)
    {
        $user = $this;

        $experience = 0;
        $weight = 0;

        $user_roles = $user->roles()->pluck('name', 'id');
        $user_skills = $user->skills->pluck('name', 'id');

        if(!is_null($project_id)) {
            $project = Project::find($project_id);

            if(isset($project)) {
                $project_skills = json_decode($project->technologies_used);
                $project_roles = json_decode($project->needed_roles);
                
                foreach($project_roles as $role) {
                    if(isset($user_roles[$role])) {
                        $experience += 1;
                        $weight += (int)$role;
                    }
                }

                foreach($project_skills as $skill) {
                    if(isset($user_skills[$skill])) {
                        $experience += 1;
                        $weight += (int)$skill;
                    }
                }

                return ($weight * $experience) / 100;
            }
        } 

        return 0;
    }
}
