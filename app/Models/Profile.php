<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'birthday',
        'gender',
        'address',
        'phone',
        'facebook',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
