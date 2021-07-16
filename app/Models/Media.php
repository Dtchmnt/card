<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Media extends Model
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
        'twitter',
        'slug',
        'in'
    ];

    use Sluggable;

    /**
     * @return \bool[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
