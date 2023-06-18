<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Booking $booking)
    {
        return view('client.history', compact('booking'));
    }

    public function showBookings()
    {
        $bookings = auth()->user()->bookings;
        return view('client.bookings-history', compact('bookings'));
    }
}
