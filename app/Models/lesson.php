<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    protected $guarded = [];
    protected $table = 'lessons';

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
