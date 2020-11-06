<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = [
        'title',
        'description',
        'photo_path',
    ];
}
