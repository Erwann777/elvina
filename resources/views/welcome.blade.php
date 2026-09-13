<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="You're invited to Elvina's magical 17th birthday party! RSVP to let us know if you can join the fun! 🎀🎉" />
    <title>🎀 Elvina's 17th Birthday – You're Invited!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

{{-- ===== FALLING PARTICLES CANVAS ===== --}}
<canvas id="particles-canvas"></canvas>

{{-- ===== FLOATING EMOJI DECORATIONS ===== --}}
<div class="floating-deco animate-drift" style="top:5%; left:3%; animation-duration:7s;">🎀</div>
<div class="floating-deco animate-drift" style="top:8%; right:5%; animation-duration:9s; animation-delay:-3s;">👑</div>
<div class="floating-deco animate-drift" style="top:20%; left:8%; animation-duration:8s; animation-delay:-1s;">🌸</div>
<div class="floating-deco animate-drift" style="top:15%; right:10%; animation-duration:10s; animation-delay:-4s;">🦋</div>
<div class="floating-deco animate-drift" style="bottom:15%; left:5%; animation-duration:11s; animation-delay:-2s;">🎂</div>
<div class="floating-deco animate-drift" style="bottom:10%; right:4%; animation-duration:8s; animation-delay:-5s;">🌷</div>
<div class="floating-deco animate-sparkle" style="top:40%; left:2%; animation-duration:3s;">✨</div>
<div class="floating-deco animate-sparkle" style="top:60%; right:3%; animation-duration:2.5s; animation-delay:-1s;">💫</div>
<div class="floating-deco animate-drift" style="bottom:30%; right:8%; animation-duration:9s; animation-delay:-6s;">🎁</div>
<div class="floating-deco animate-drift" style="bottom:40%; left:10%; animation-duration:7s; animation-delay:-2s;">🎈</div>

<div class="page-wrap">

    {{-- TOP BANNER --}}
    <div class="party-banner animate-ribbon-wave">
        🌟 &nbsp; A Fancy Nancy Celebration &nbsp; 🌟
    </div>

    {{-- ===== HERO PHOTO SECTION ===== --}}
    <div class="hero-section animate-bounce-in">
        <div class="hero-image-wrap">
            <div class="hero-image-glow"></div>
            <img src="/elvina-birthday.jpg" alt="Elvina's 17th Birthday" class="hero-photo" />
            <div class="hero-crown">👑</div>
        </div>
        <div class="hero-badge">
            <span class="hero-badge-text">Turning</span>
            <span class="hero-badge-number">17</span>
            <span class="hero-badge-sub">Same girl... Bigger dreams ✨</span>
        </div>
    </div>

    {{-- MAIN TITLE --}}
    <div class="animate-bounce-in" style="text-align:center; margin-bottom:0.5rem; animation-delay:0.2s;">
        <h1 class="fancy-title">Elvina's Birthday! 🎂</h1>
        <p class="fancy-subtitle">You are cordially invited to the most fabulous party of the year 💖</p>
        <p class="fancy-tagline">"Pretty Girls Make Great Days" 🎀</p>
    </div>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        @php $attending = session('attending'); @endphp
        <div class="flash-success" role="alert">
            <span class="flash-icon">{{ $attending ? '🎉' : '💌' }}</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- ===== INVITATION CARD ===== --}}
    <div class="invitation-card" style="animation-delay:0.3s;">
        <span class="card-corner tl animate-sparkle">🌸</span>
        <span class="card-corner tr animate-sparkle" style="animation-delay:-1s;">🌸</span>
        <span class="card-corner bl animate-sparkle" style="animation-delay:-0.5s;">💎</span>
        <span class="card-corner br animate-sparkle" style="animation-delay:-1.5s;">💎</span>

        <div style="text-align:center; margin-bottom:1.2rem;">
            <span style="font-size:3.5rem;" class="animate-heart-beat">🎀</span>
            <h2 style="font-family:'Pacifico',cursive; font-size:clamp(1.4rem,4vw,2rem); color:#e91e8c; margin:0.3rem 0 0.1rem;">
                You're Invited!
            </h2>
            <p style="color:#c77dff; font-weight:700; font-size:0.95rem; letter-spacing:0.08em; text-transform:uppercase;">
                ~ A Very Fancy Birthday Party ~
            </p>
        </div>

        <div class="fancy-divider"><span>🌺</span><span>🌺</span><span>🌺</span></div>

        <div style="margin:1rem 0;">
            <div class="info-row">
                <span class="info-icon">🎂</span>
                <div>
                    <span class="info-label">Celebrating:</span>
                    <span>Elvina's 17th — Same Girl, Bigger Dreams!</span>
                </div>
            </div>
            <div class="info-row">
                <span class="info-icon">📅</span>
                <div>
                    <span class="info-label">Date:</span>
                    <span>Saturday, September 20, 2026</span>
                </div>
            </div>
            <div class="info-row">
                <span class="info-icon">⏰</span>
                <div>
                    <span class="info-label">Time:</span>
                    <span>3:00 PM – 7:00 PM</span>
                </div>
            </div>
            <div class="info-row">
                <span class="info-icon">📍</span>
                <div>
                    <span class="info-label">Venue:</span>
                    <span>The Pink Palace Garden, Jl. Bunga Melati No. 8, Jakarta</span>
                </div>
            </div>
            <div class="info-row">
                <span class="info-icon">👗</span>
                <div>
                    <span class="info-label">Dress Code:</span>
                    <span>Fancy &amp; Fabulous — Pink is encouraged! 💗</span>
                </div>
            </div>
        </div>

        <div class="fancy-divider"><span>✨</span><span>✨</span><span>✨</span></div>

        <p style="text-align:center; color:#4a0e3b; font-weight:700; font-size:0.98rem; font-style:italic; margin-top:0.8rem;">
            "Come join us for an afternoon of glitter, giggles, and gorgeous memories!"
        </p>
    </div>

    {{-- ===== RSVP FORM ===== --}}
    <div class="rsvp-form-wrap">
        <div class="rsvp-inner-card">
            <h2 class="form-title">💌 RSVP Here!</h2>
            <p style="text-align:center; color:#4a0e3b; font-weight:700; margin-bottom:1.4rem; font-size:0.98rem;">
                Will you be joining us? Let us know so we can save you a spot! 🎊
            </p>

            @if($errors->any())
                <div style="background:#fff0f5; border:2px solid #ff69b4; border-radius:1rem; padding:0.8rem 1.2rem; margin-bottom:1rem; color:#c2185b; font-weight:700; text-align:center;">
                    ⚠️ {{ $errors->first() }}
                </div>
            @endif

            <form id="rsvp-form" action="{{ route('rsvp.store') }}" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="attending" id="attending-input" value="" />

                <div style="margin-bottom:1.2rem;">
                    <label for="name-field" style="display:block; font-weight:800; color:#e91e8c; margin-bottom:0.5rem; font-size:0.95rem; text-align:center; letter-spacing:0.04em; text-transform:uppercase;">
                        ✍️ Your Name
                    </label>
                    <input
                        type="text"
                        id="name-field"
                        name="name"
                        class="name-input"
                        placeholder="Type your name here... 🌸"
                        value="{{ old('name') }}"
                        required
                        maxlength="255"
                    />
                </div>

                <div class="btn-wrap">
                    <button type="button" id="btn-yes" class="btn-yes" onclick="submitRsvp(1)">
                        🎉 Yes, I'll be there!
                    </button>
                    <button type="button" id="btn-no" class="btn-no" onclick="submitRsvp(0)">
                        😢 Sorry, can't make it
                    </button>
                </div>
            </form>

            <p style="text-align:center; margin-top:1.2rem; font-size:0.85rem; color:#c77dff; font-weight:700;">
                💡 Please RSVP by <strong style="color:#e91e8c;">September 15, 2026</strong>
            </p>
        </div>
    </div>

    {{-- GUEST LIST LINK --}}
    <div style="margin-top:1.5rem; text-align:center;">
        <a href="{{ route('guests') }}" class="guest-link">
            👑 View Guest List
        </a>
    </div>

    <footer class="party-footer">
        Made with 💖 for the most fabulous birthday girl — Elvina! 🎀
    </footer>
</div>

<script>
// ===== RSVP SUBMIT =====
function submitRsvp(val) {
    const nameInput = document.getElementById('name-field');
    if (!nameInput.value.trim()) {
        nameInput.focus();
        nameInput.style.borderColor = '#e91e8c';
        nameInput.style.boxShadow = '0 0 0 4px rgba(233,30,140,0.3)';
        nameInput.placeholder = '⚠️ Please enter your name first!';
        return;
    }
    document.getElementById('attending-input').value = val;
    document.getElementById('rsvp-form').submit();
}

// ===== FALLING HEARTS & STARS CANVAS =====
(function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    const particles = [];
    const TYPES = ['heart', 'star'];
    const COLORS = ['#e91e8c', '#ff69b4', '#ff85b3', '#c77dff', '#ffd700', '#f48fb1', '#ff4d94', '#d63384', '#ce93d8'];

    function createParticle() {
        const type = TYPES[Math.floor(Math.random() * TYPES.length)];
        return {
            type,
            x: Math.random() * canvas.width,
            y: -30,
            size: 10 + Math.random() * 20,
            speedY: 1.5 + Math.random() * 3,
            speedX: (Math.random() - 0.5) * 1.5,
            rotation: Math.random() * Math.PI * 2,
            rotSpeed: (Math.random() - 0.5) * 0.08,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            opacity: 0.7 + Math.random() * 0.3,
            wobble: Math.random() * Math.PI * 2,
            wobbleSpeed: 0.03 + Math.random() * 0.04,
        };
    }

    function drawHeart(ctx, x, y, size, color, opacity) {
        ctx.save();
        ctx.globalAlpha = opacity;
        ctx.fillStyle = color;
        ctx.beginPath();
        const s = size * 0.5;
        ctx.moveTo(x, y + s * 0.3);
        ctx.bezierCurveTo(x, y - s * 0.3, x - s, y - s * 0.3, x - s, y + s * 0.3);
        ctx.bezierCurveTo(x - s, y + s * 0.8, x, y + s * 1.3, x, y + s * 1.3);
        ctx.bezierCurveTo(x, y + s * 1.3, x + s, y + s * 0.8, x + s, y + s * 0.3);
        ctx.bezierCurveTo(x + s, y - s * 0.3, x, y - s * 0.3, x, y + s * 0.3);
        ctx.fill();
        ctx.restore();
    }

    function drawStar(ctx, x, y, size, color, opacity) {
        ctx.save();
        ctx.globalAlpha = opacity;
        ctx.fillStyle = color;
        ctx.beginPath();
        const spikes = 5;
        const outerR = size * 0.6;
        const innerR = size * 0.25;
        let rot = (Math.PI / 2) * 3;
        const step = Math.PI / spikes;
        ctx.moveTo(x, y - outerR);
        for (let i = 0; i < spikes; i++) {
            ctx.lineTo(
                x + Math.cos(rot) * outerR,
                y + Math.sin(rot) * outerR
            );
            rot += step;
            ctx.lineTo(
                x + Math.cos(rot) * innerR,
                y + Math.sin(rot) * innerR
            );
            rot += step;
        }
        ctx.lineTo(x, y - outerR);
        ctx.closePath();
        ctx.fill();
        ctx.restore();
    }

    // Spawn particles
    for (let i = 0; i < 40; i++) {
        const p = createParticle();
        p.y = Math.random() * window.innerHeight; // stagger initial positions
        particles.push(p);
    }

    let frameCount = 0;
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Spawn new particles gradually
        frameCount++;
        if (frameCount % 18 === 0 && particles.length < 80) {
            particles.push(createParticle());
        }

        for (let i = particles.length - 1; i >= 0; i--) {
            const p = particles[i];
            p.wobble += p.wobbleSpeed;
            p.x += Math.sin(p.wobble) * 0.8 + p.speedX;
            p.y += p.speedY;
            p.rotation += p.rotSpeed;

            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rotation);
            ctx.translate(-p.x, -p.y);

            if (p.type === 'heart') {
                drawHeart(ctx, p.x, p.y, p.size, p.color, p.opacity);
            } else {
                drawStar(ctx, p.x, p.y, p.size, p.color, p.opacity);
            }
            ctx.restore();

            // Remove off-screen particles
            if (p.y > canvas.height + 40) {
                particles.splice(i, 1);
                particles.push(createParticle());
            }
        }

        requestAnimationFrame(animate);
    }
    animate();
})();
</script>
</body>
</html>
