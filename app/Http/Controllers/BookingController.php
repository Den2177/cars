<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards;
        $cars = Car::filter();

        return view('client.booking', compact('cards', 'cars'));
    }

    public function store()
    {
        request()->validate([
            'cars' => 'required|array',
            'price' => 'required',
            'date_to' => 'required|date',
            'date_from' => 'required|date',
            'card_id' => 'required',
        ]);

        $booking = Booking::create(request()->collect()->except('cars')->merge(['user_id' => auth()->user()->id])->all());
        $booking->cars()->attach(request('cars'));

        return redirect()->route('history.list');
    }

    public function updateStatus(Booking $booking)
    {
        $booking->update([
            'status_id' => request('status_id'),
        ]);

        return redirect()->route('admin');
    }
}
