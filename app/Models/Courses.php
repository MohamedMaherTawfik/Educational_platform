<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table='courses';
    protected $fillable=[
        'title',
        'description',
        'price',
        'image',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
