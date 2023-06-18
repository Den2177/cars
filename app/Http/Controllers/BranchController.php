<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('client.branches', compact('branches'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'image' => 'required|image',
        ]);


        Branch::create([
            'image' => $this->saveImage(),
            'name' => request('name'),
        ]);

        return redirect()->route('admin');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branch-edit', compact('branch'));
    }

    public function update(Branch $branch)
    {
        $this->upd($branch);
        return redirect()->route('admin');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin');
    }
}
