<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cars = [];

        foreach($user->bookings as $booking) {
            foreach($booking->cars as $car) {
                $cars[] = $car;
            }
        }

        return view('client.profile', compact('user', 'cars'));
    }
}
