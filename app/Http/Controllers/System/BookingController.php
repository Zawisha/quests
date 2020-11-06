<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\BookingRequest;
use App\Models\System\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::oldest('booked_at')
        ->get();

        return view('system.bookings.index', compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookingRequest $request
     * @param Booking $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $data = $request->validated();
        $res = $booking->update($data);
        return response()->json($res);
    }

}
