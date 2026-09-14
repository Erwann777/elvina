<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RsvpController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $cacheKey = 'rsvp_ip_' . md5($ip);
        $userRsvp = Cache::get($cacheKey);

        return view('welcome', compact('userRsvp'));
    }

    public function store(Request $request)
    {
        $ip = $request->ip();
        $cacheKey = 'rsvp_ip_' . md5($ip);

        if (Cache::has($cacheKey)) {
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

        // Cache permanently for this IP
        Cache::forever($cacheKey, $rsvpData);

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

