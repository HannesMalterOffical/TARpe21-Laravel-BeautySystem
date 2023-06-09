<?php

namespace App\Http\Controllers;

use App\Models\BookedBookings;
use Illuminate\Http\Request;

class BookedBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("bookings.index",[
            'bookings'=>Booking::all(),
            'services'=>Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookedBookings $bookedBookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookedBookings $bookedBookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookedBookings $bookedBookings)
    {
        $this->authorize('update', $booking);
        $validated = $request->validate([
            'booking_time' => 'required|date|after:today',
            'service_id' => 'gt:0',
        ]);
        $booking->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookedBookings $bookedBookings)
    {
        //
    }
}
