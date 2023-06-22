<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Car;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $cars = Car::all();
        $bookings = Booking::all();
        $statuses = Status::all();

        return view('admin.index', compact('branches', 'cars', 'bookings', 'statuses'));
    }
}
