<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'img',
        'phone',
        'telegram',
        'whats',
        'viber',
        'facebook',
        'instagram',
        'in'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
