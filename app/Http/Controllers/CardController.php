<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards;
        return view('client.cards', compact('cards'));
    }

    public function store()
    {
        request()->validate([
            'number' => 'required|string|size:16',
            'date_to' => 'required|date',
            'cvv' => 'required|string|size:3',
            'full_name' => 'required|string',
        ]);

        $card = Card::create(request()->collect()->merge(['user_id' => auth()->user()->id])->all());

        return redirect()->route('cards');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards');
    }
}
