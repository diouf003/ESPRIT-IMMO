<?php

namespace App\Models;


use App\Models\Role;
use App\Models\Location;
use App\Models\Paiement;
use App\Models\Permission;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'sexe',
        'pieceTdentite',
        'NPI',
        'telephone1',
        'telephone2',
        'email',
        'password',
        'photo',



    ];

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

    public function Paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, "user_role", "user_id", "role_id");
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, "us_per", "user_id", "permission_id");
    }

    //deux function

    public function hasRole($role)
    {
        return $this->roles()->where("nom", $role)->first() !== null;
    }
    public function hasAnyRoles($roles)
    {
        return $this->roles()->whereIn("nom", $roles)->first() !== null;
    }

    //fonction propriete getAllRoleNamesAttribute

    public function getAllRoleNamesAttribute()
    {
        return $this->roles->implode("nom", ' | ');
    }
}
