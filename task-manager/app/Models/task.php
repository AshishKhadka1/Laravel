<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{

    // Columns allowed for mass assignment
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    // Relationship: A Task belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
