<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\BookingRequest;
use App\Models\Site\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $data = $request->validated();

        // Проверка наличия брони
        $res = Booking::where([
            'quest_id' => $data['quest_id'],
            'booked_at' => $data['booked_at'],
        ])
            ->whereHas('status', function ($q) {
                $q->where('alias', '!=', 'cancel');
            })
        ->first();

        if ($res) {
            return back()
                ->withErrors(['msg' => 'Произошла ошибка, выбранное время занято'])
                ->withInput();
        }

        $booking = Booking::create($data);

        if ($booking) {
            $booking->load([
                'quest:id,title'
            ]);
            return view('site.bookings.success', compact('booking'));
        } else {
            return back()
                ->withErrors(['msg' => __('error.store')])
                ->withInput();
        }
    }
}
