<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'user_id', 'role_id');
    }
}
