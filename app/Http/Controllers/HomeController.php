<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('client.home', compact('branches'));
    }
}
