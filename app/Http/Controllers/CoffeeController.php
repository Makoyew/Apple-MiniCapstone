<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLog;
use App\Listeners\LogListener;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::all();
        return view('coffees.index', compact('coffees'));
    }

    public function create()
    {
        return view('coffees.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'description' => 'nullable',
                'available' => 'boolean',
            ]);

            $coffee = Coffee::create($request->all());

            $statusMessage = 'Coffee created successfully!';

            $request->session()->flash('status', $statusMessage);

            $log_entry = Auth::user()->name . " Added a " . $coffee->name . " Coffee ";
            event(new UserLog($log_entry));

            return redirect()->route('coffees.index');
        } catch (\Exception $e) {
            dd($request->all(), $e->getMessage());
        }
    }


    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', compact('coffee'));
    }

    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'available' => 'boolean',
        ]);

        $coffee->update($request->all());

        $statusMessage = 'Coffee updated successfully!';

        $request->session()->flash('status', $statusMessage);

        $log_entry = Auth::user()->name . " Edited a " . $coffee->name . " Coffee ";
        event(new UserLog($log_entry));

        return redirect()->route('coffees.index');
    }

    public function show(Coffee $coffee)
    {
    return view('coffees.show', compact('coffee'));
    }

    public function destroy(Request $request, Coffee $coffee)
    {
        $coffee->delete();

        $statusMessage = 'Coffee deleted successfully!';

        $request->session()->flash('status', $statusMessage);

        $log_entry = Auth::user()->name . " Deleted a " . $coffee->name . " Coffee ";
        event(new UserLog($log_entry));

        return redirect()->route('coffees.index');
    }

    public function buy(Request $request, Coffee $coffee)
    {
        $coffee->update(['available' => false]);

        $log_entry = Auth::user()->name . " Bought a " . $coffee->name . " Coffee ";
        event(new UserLog($log_entry));

        return redirect()->route('coffees.bought');
    }
}
