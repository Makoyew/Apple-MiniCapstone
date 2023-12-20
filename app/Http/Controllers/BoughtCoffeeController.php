<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class BoughtCoffeeController extends Controller
{
    public function index(Request $request)
    {
        $boughtCoffees = Coffee::where('available', false)->get();

        $statusMessage = 'Coffee bought successfully!';

        $request->session()->flash('status', $statusMessage);

        return view('coffees.bought', compact('boughtCoffees'));
    }

}
