<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
    public function edit(Booking $booking): View
    {
        $this->authorize('update', $booking);
        $booking_time = date_create($booking->booking_time);
        $seconds = $booking_time->format('s');
        if($seconds > 0){
            $booking_time->sub(new DateInterval("PT".$seconds."S"));
            $booking->booking_time = $booking_time->format('c');
        }
        return view('bookings.edit',[
            'booking'=>$booking,
            'services'=>Service::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $this->authorize('update', $booking);
        $validated = $request->validate([
            'booking_time' => 'required|date|after:today',
            'service_id' => 'gt:0',
        ]);
        $booking->update($validated);

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect(route('bookings.index'));
    }
}
