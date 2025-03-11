<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quizes extends Model
{
    protected $guarded = [];
    protected $table = 'quizes';
    public function lesson()
    {
        return $this->belongsTo(lesson::class);
    }
}
