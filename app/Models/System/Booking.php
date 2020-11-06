<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $with = [
        'quest',
        'status'
    ];

    protected $dates = [
        'booked_at'
    ];

    protected $fillable = [
        'status_id',
    ];

    public function getFormatPhoneAttribute()
    {
        $value = $this->phone;

        $rest1 = mb_substr($value, 0, 1);
        $rest2 = mb_substr($value, 1, 3);
        $rest3 = mb_substr($value, 4, 3);
        $rest4 = mb_substr($value, 7, 2);
        $rest5 = mb_substr($value, 9, 2);

        $result = "{$rest1} ({$rest2}) {$rest3}-{$rest4}-{$rest5}";

        return $result;
    }

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
