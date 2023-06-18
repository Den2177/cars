<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store()
    {
        request()->validate([
            'model' => 'required|string',
            'number' => 'required',
            'description' => 'required|string',
            'branch_id' => 'required',
            'priceForSession' => 'required',
            'image' => 'required|image',
        ]);

        $data = request()->all();

        $data['image'] = $this->saveImage();

        Car::create($data);

        return redirect()->route('admin');
    }

    public function update(Car $car)
    {
        $this->upd($car);
        return redirect()->route('admin');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('admin');
    }

    public function edit(Car $car)
    {
        $branches = Branch::all();
        return view('admin.car-edit', compact('car', 'branches'));
    }
}
