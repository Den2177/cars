<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $cars = Car::all();

        return view('admin.index', compact('branches', 'cars'));
    }
}
