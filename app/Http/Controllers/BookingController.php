<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
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
        $validated = $request->validate([
            'booking_time' => 'required|date|after:today',
            'service_id' => 'gt:0',
        ]);
        $booking = new Booking;
        $booking->booking_time = $validated['booking_time'];
        $booking->service()->associate(Service::find($validated['service_id']));
        $booking->server()->associate($request->user());
        $booking->save();

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
