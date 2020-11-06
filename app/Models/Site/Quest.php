<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public function active_bookings()
    {
        return $this->hasMany(Booking::class)
            ->whereHas('status', function ($q) {
                $q->where('alias', '!=', 'cancel')
                ->whereDate('booked_at', '>=', today());
            });
    }
}
