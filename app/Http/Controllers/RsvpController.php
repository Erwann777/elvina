<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index(Request $request)
    {
        // Check if THIS browser session has already submitted RSVP
        $userRsvp = $request->session()->get('my_rsvp');

        return view('welcome', compact('userRsvp'));
    }

    public function store(Request $request)
    {
        // If this session already submitted, redirect back
        if ($request->session()->has('my_rsvp')) {
            return redirect('/')->with('info', 'You have already submitted your RSVP! 🎀');
        }

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'attending' => 'required|in:1,0',
        ]);

        $rsvpData = [
            'name'      => $validated['name'],
            'attending' => (bool) $validated['attending'],
            'created_at'=> now()->toFormattedDateString(),
        ];

        Rsvp::create([
            'name'      => $rsvpData['name'],
            'attending' => $rsvpData['attending'],
        ]);

        // Store in THIS user's session — other browsers are not affected
        $request->session()->put('my_rsvp', $rsvpData);

        $message = $rsvpData['attending']
            ? "Yay! Can't wait to see you at the party, {$rsvpData['name']}! 🎉"
            : "Aw, we'll miss you, {$rsvpData['name']}! Thanks for letting us know. 💖";

        return redirect('/')->with('success', $message)->with('attending', $rsvpData['attending']);
    }

    public function guests()
    {
        $guests = Rsvp::orderBy('created_at', 'desc')->get();
        return view('guests', compact('guests'));
    }
}

