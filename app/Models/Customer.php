<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document',
        'name',
        'lastname',
        'email',
        'phone',
        'user_id'
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // /**
    //  * Los atributos que deben convertirse a tipos nativos.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->lastname}";
    }
}
