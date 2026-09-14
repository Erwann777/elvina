<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Guest list for Elvina's Birthday Party — see who's coming to celebrate! 🎀" />
    <title>🎀 Guest List – Elvina's Birthday Party</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('partials.decorations')

<div class="page-wrap">
    <div class="party-banner">
        🎀 &nbsp; Elvina's Birthday Party — Guest List &nbsp; 🎀
    </div>

    <h1 class="fancy-title" style="margin-bottom:0.3rem;">👑 Our Fabulous Guests</h1>
    <p class="fancy-subtitle" style="margin-bottom:2rem;">Everyone who RSVPed for the party!</p>

    @php
        $joining  = $guests->where('attending', true)->count();
        $notJoining = $guests->where('attending', false)->count();
    @endphp

    {{-- STATS CARDS --}}
    <div style="display:flex; gap:1rem; flex-wrap:wrap; justify-content:center; margin-bottom:2rem; width:100%; max-width:680px;">
        <div style="background:linear-gradient(135deg,#e91e8c,#c2185b); border-radius:1.5rem; padding:1.2rem 2rem; color:white; text-align:center; flex:1; min-width:140px; box-shadow:0 8px 24px rgba(233,30,140,0.4);">
            <div style="font-size:2rem; font-weight:900; font-family:'Pacifico',cursive;">{{ $joining }}</div>
            <div style="font-weight:800; font-size:0.9rem; letter-spacing:0.05em;">🎉 Joining!</div>
        </div>
        <div style="background:linear-gradient(135deg,#c77dff,#9c27b0); border-radius:1.5rem; padding:1.2rem 2rem; color:white; text-align:center; flex:1; min-width:140px; box-shadow:0 8px 24px rgba(199,125,255,0.4);">
            <div style="font-size:2rem; font-weight:900; font-family:'Pacifico',cursive;">{{ $notJoining }}</div>
            <div style="font-weight:800; font-size:0.9rem; letter-spacing:0.05em;">😢 Can't Come</div>
        </div>
        <div style="background:linear-gradient(135deg,#ffd700,#f57f17); border-radius:1.5rem; padding:1.2rem 2rem; color:white; text-align:center; flex:1; min-width:140px; box-shadow:0 8px 24px rgba(255,215,0,0.4);">
            <div style="font-size:2rem; font-weight:900; font-family:'Pacifico',cursive;">{{ $guests->count() }}</div>
            <div style="font-weight:800; font-size:0.9rem; letter-spacing:0.05em;">✨ Total RSVPs</div>
        </div>
    </div>

    {{-- GUEST TABLE --}}
    <div style="background:white; border-radius:2rem; padding:1.8rem 2rem; max-width:680px; width:100%; box-shadow:0 20px 60px rgba(233,30,140,0.15); border:2px solid #ffd6ec; animation: slide-up 0.7s ease both;">
        @if($guests->isEmpty())
            <div style="text-align:center; padding:2rem; color:#c77dff; font-weight:700; font-size:1.1rem;">
                <div style="font-size:3rem; margin-bottom:0.5rem;">🎀</div>
                No RSVPs yet! Be the first to join the party!
            </div>
        @else
            <table class="guest-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Guest Name</th>
                        <th>Status</th>
                        <th>RSVPed On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guests as $i => $guest)
                    <tr>
                        <td style="color:#c77dff; font-weight:900;">{{ $i + 1 }}</td>
                        <td>
                            <span style="font-size:1.05rem;">{{ $guest->name }}</span>
                        </td>
                        <td>
                            @if($guest->attending)
                                <span class="badge-yes">🎉 Joining!</span>
                            @else
                                <span class="badge-no">😢 Can't Come</span>
                            @endif
                        </td>
                        <td style="font-size:0.85rem; color:#9e9e9e;">
                            {{ $guest->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div style="margin-top:1.5rem; text-align:center;">
        <a href="{{ url('/') }}" style="color:#e91e8c; font-weight:800; font-size:0.95rem; text-decoration:none; border-bottom:2px dashed #ff69b4; padding-bottom:2px;">
            ← Back to Invitation
        </a>
    </div>

    <footer class="party-footer">
        Made with 💖 for the most fabulous birthday girl — Elvina! 🎀
    </footer>
</div>
</body>
</html>
