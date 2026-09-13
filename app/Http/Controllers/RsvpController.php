<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'attending' => 'required|in:1,0',
        ]);

        Rsvp::create([
            'name'      => $validated['name'],
            'attending' => (bool) $validated['attending'],
        ]);

        $message = $validated['attending']
            ? "Yay! Can't wait to see you at the party, {$validated['name']}! 🎉"
            : "Aw, we'll miss you, {$validated['name']}! Thanks for letting us know. 💖";

        return redirect('/')->with('success', $message)->with('attending', (bool) $validated['attending']);
    }

    public function guests()
    {
        $guests = Rsvp::orderBy('created_at', 'desc')->get();
        return view('guests', compact('guests'));
    }
}
