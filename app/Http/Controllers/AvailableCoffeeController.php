<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class AvailableCoffeeController extends Controller
{
    public function index()
    {
        $availableCoffees = Coffee::where('available', true)->get();
        return view('available-coffees.index', compact('availableCoffees'));
    }
}
