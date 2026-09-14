<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="You're invited to Elvina's 17th birthday! RSVP to let us know if you can join! 🎀🎉" />
    <title>🎀 Elvina's Birthday – You're Invited!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('partials.decorations')

{{-- ===== BACKGROUND MUSIC ===== --}}
<audio id="bg-music" src="/music/birthday.mp3" preload="auto" loop></audio>

{{-- Floating Music Controller --}}
<button type="button" id="music-toggle-btn" class="music-toggle-btn" aria-label="Toggle Background Music" title="Toggle Music">
    <div class="music-disc-icon">🎵</div>
    <span class="music-wave-bars">
        <span class="bar bar-1"></span>
        <span class="bar bar-2"></span>
        <span class="bar bar-3"></span>
    </span>
</button>

<div class="page-wrap">

    {{-- ===== HERO CAKE SECTION (Initial Spotlight) ===== --}}
    <div class="cake-section-wrap" id="cake-section">
        <div class="cake-intro-header">
            <span class="party-banner animate-bounce-in">🎀 You're Specially Invited! 🎀</span>
            <h1 class="fancy-title">Elvina's Sweet 17th</h1>
            <p class="cake-intro-sub" id="cake-prompt-text">
                Tap the button below to light the candle &amp; reveal the celebration! ✨
            </p>
        </div>

        <div class="cake-svg-wrap" id="cake-svg-wrap">
            <svg id="birthday-cake-svg" viewBox="0 0 320 340" xmlns="http://www.w3.org/2000/svg" aria-label="Birthday cake">

                <!-- SINGLE CENTER CANDLE -->
                <!-- candle body -->
                <rect x="148" y="72" width="24" height="54" rx="6" fill="#e91e8c"/>
                <!-- wax stripes -->
                <rect x="148" y="72" width="24" height="8" rx="4" fill="#ff85b3" opacity="0.6"/>
                <rect x="148" y="88" width="24" height="6" rx="3" fill="#ff85b3" opacity="0.3"/>
                <rect x="148" y="104" width="24" height="6" rx="3" fill="#ff85b3" opacity="0.3"/>
                <!-- shine -->
                <rect x="153" y="75" width="5" height="46" rx="2.5" fill="white" opacity="0.3"/>
                <!-- wick -->
                <line x1="160" y1="72" x2="160" y2="62" stroke="#5d4037" stroke-width="3" stroke-linecap="round"/>
                <!-- flame group (hidden until lit) -->
                <g id="candle-flame-main" class="candle-flame">
                    <!-- outer glow -->
                    <ellipse class="flame-outer-glow" cx="160" cy="48" rx="9" ry="13" fill="#ffd700" opacity="0.4"/>
                    <!-- outer flame -->
                    <ellipse class="flame-outer" cx="160" cy="50" rx="7" ry="12" fill="#ffd700"/>
                    <!-- inner flame -->
                    <ellipse class="flame-inner" cx="160" cy="53" rx="4.5" ry="8" fill="#ff6b00"/>
                    <!-- hot core -->
                    <ellipse class="flame-core" cx="160" cy="57" rx="2" ry="3.5" fill="white" opacity="0.9"/>
                </g>

                <!-- TOP TIER -->
                <rect x="90" y="126" width="140" height="60" rx="10" fill="#f8bbd9"/>
                <path d="M90,136 Q100,150 110,136 Q120,150 130,136 Q140,150 150,136 Q160,150 170,136 Q180,150 190,136 Q200,150 210,136 Q220,150 230,138" fill="none" stroke="white" stroke-width="9" stroke-linecap="round" opacity="0.88"/>
                <circle cx="118" cy="158" r="5" fill="#e91e8c" opacity="0.9"/>
                <circle cx="143" cy="165" r="4" fill="#c77dff" opacity="0.9"/>
                <circle cx="168" cy="158" r="5" fill="#ffd700" opacity="0.9"/>
                <circle cx="193" cy="165" r="4" fill="#7ec8e3" opacity="0.9"/>
                <circle cx="212" cy="158" r="5" fill="#ff85b3" opacity="0.9"/>
                <rect x="96" y="130" width="8" height="50" rx="4" fill="white" opacity="0.18"/>

                <!-- MIDDLE TIER -->
                <rect x="55" y="186" width="210" height="74" rx="10" fill="#f06292"/>
                <path d="M55,200 Q70,218 86,200 Q102,218 118,200 Q134,218 150,200 Q166,218 182,200 Q198,218 214,200 Q230,218 246,200 Q258,212 265,202" fill="none" stroke="#fce4ec" stroke-width="11" stroke-linecap="round" opacity="0.9"/>
                <rect x="55" y="232" width="210" height="5" rx="2.5" fill="#c2185b" opacity="0.4"/>
                <text x="88" y="260" font-size="16" fill="white" opacity="0.8">✦</text>
                <text x="128" y="252" font-size="13" fill="#ffd700" opacity="0.9">★</text>
                <text x="158" y="261" font-size="18" fill="white" opacity="0.8">✦</text>
                <text x="196" y="252" font-size="13" fill="#ffd700" opacity="0.9">★</text>
                <text x="232" y="260" font-size="15" fill="white" opacity="0.8">✦</text>
                <rect x="63" y="192" width="10" height="62" rx="5" fill="white" opacity="0.15"/>

                <!-- BOTTOM TIER -->
                <rect x="20" y="258" width="280" height="60" rx="12" fill="#ad1457"/>
                <path d="M20,274 Q38,294 57,274 Q76,294 95,274 Q114,294 133,274 Q152,294 171,274 Q190,294 209,274 Q228,294 247,274 Q265,292 280,276 Q290,284 300,272" fill="none" stroke="#f48fb1" stroke-width="12" stroke-linecap="round" opacity="0.9"/>
                <rect x="28" y="264" width="12" height="48" rx="6" fill="white" opacity="0.12"/>

                <!-- PLATE -->
                <ellipse cx="160" cy="320" rx="152" ry="13" fill="#eeeeee"/>
                <ellipse cx="160" cy="318" rx="150" ry="10" fill="white" opacity="0.7"/>
                <ellipse cx="160" cy="316" rx="146" ry="7" fill="#fafafa"/>

                <!-- GLOW (hidden until lit) -->
                <ellipse id="cake-glow" cx="160" cy="100" rx="110" ry="60" fill="#ffd700" opacity="0" style="mix-blend-mode:screen"/>

            </svg>
        </div>

        <button type="button" id="btn-light-candle" class="btn-light-candle pulse-btn">
             🕯️ Light the candle for me!
        </button>
    </div>

    {{-- ===== INVITATION SECTION (Revealed after lighting candle) ===== --}}
    <div class="invitation-reveal-section" id="invitation-section">

        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            @php $attending = session('attending'); @endphp
            <div class="flash-success" role="alert">
                <span class="flash-icon">{{ $attending ? '🎉' : '💌' }}</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('info'))
            <div class="flash-info" role="alert">
                <span class="flash-icon">🎀</span>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        {{-- INVITATION IMAGE --}}
        <div class="invite-image-wrap">
            <img
                src="/elvina-invitation.jpg"
                alt="Elvina's 17th Birthday Invitation"
                class="invite-image"
            />
        </div>

        {{-- ENVELOPE SCENE --}}
        <div class="envelope-scene" id="envelope-scene">
            <div class="envelope-wrap" id="envelope-wrap" role="button" tabindex="0" aria-label="Click to open your RSVP">
                <div class="envelope-back"></div>
                <div class="envelope-front" id="envelope-front">
                    <div class="envelope-label">
                        @if(isset($userRsvp) && $userRsvp)
                            <p class="envelope-to">To: {{ $userRsvp['name'] }} 🎀</p>
                            <p class="envelope-from">Status: {{ $userRsvp['attending'] ? 'Attending Confirmed 🎉' : 'Warm Wishes Sent 💌' }}</p>
                        @else
                            <p class="envelope-to">To: Elvina's Beloved Guests</p>
                            <p class="envelope-from">From: Elvina's Birthday Party 🎀</p>
                        @endif
                    </div>
                    <p class="envelope-cta">
                        @if(isset($userRsvp) && $userRsvp)
                            Click to view your RSVP card ✨
                        @else
                            Click to open &amp; RSVP
                        @endif
                    </p>
                </div>
                <div class="envelope-flap" id="envelope-flap"></div>
            </div>
        </div>

        <footer class="party-footer">
            Made with 💖 for the most fabulous birthday girl — Elvina! 🎀
        </footer>
    </div>

</div>


    {{-- ===== RSVP MODAL OVERLAY (hidden until envelope click) ===== --}}
    <div class="rsvp-overlay" id="rsvp-overlay" aria-hidden="true">
        <div class="rsvp-modal-card" id="rsvp-modal-card">
            @if(isset($userRsvp) && $userRsvp)
                {{-- ALREADY SUBMITTED: SHOW PERSONALIZED CARD --}}
                @if($userRsvp['attending'])
                    {{-- ATTENDING (WELCOME CELEBRATION CARD) --}}
                    <div class="rsvp-status-card status-attending">
                        <div class="status-badge-pill attending">✨ Confirmed Guest ✨</div>
                        <div class="status-icon-glow">🎉</div>
                        <h2 class="status-title">Yay! Welcome, {{ $userRsvp['name'] }}! 🎀</h2>
                        <p class="status-desc">
                            We are overjoyed that you will be joining us for <strong>Elvina's 17th Birthday Celebration</strong>! Get ready for an enchanting day full of laughter, sweet treats, and wonderful memories! 🍰✨
                        </p>
                        <div class="party-reminder-box">
                            <div class="reminder-item">
                                <span class="reminder-icon">🗓️</span>
                                <div class="reminder-content">
                                    <span class="reminder-label">Date</span>
                                    <span class="reminder-val">Saturday, Sept 19, 2026</span>
                                </div>
                            </div>
                            <div class="reminder-item">
                                <span class="reminder-icon">🎀</span>
                                <div class="reminder-content">
                                    <span class="reminder-label">Dress Code</span>
                                    <span class="reminder-val">Casual Pink</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn-close-card" id="btn-close-modal">
                            Close &amp; View Invitation 💕
                        </button>
                    </div>
                @else
                    {{-- NOT ATTENDING (UNDERSTANDING & WARM CARD) --}}
                    <div class="rsvp-status-card status-declined">
                        <div class="status-badge-pill declined">💌 Warm Wishes Sent</div>
                        <div class="status-icon-glow">💖</div>
                        <h2 class="status-title">Thank you, {{ $userRsvp['name'] }}!</h2>
                        <p class="status-desc">
                            We completely understand that you won't be able to celebrate in person this time. Elvina truly appreciates your sweet wishes and love from afar! You will be warmly missed! 💕🌸
                        </p>
                        <div class="sweet-quote-box">
                            <p class="quote-text">
                                <em>"True friendships remain close at heart no matter where we are."</em> 🎀✨
                            </p>
                        </div>
                        <button type="button" class="btn-close-card" id="btn-close-modal">
                            Close &amp; View Invitation 💕
                        </button>
                    </div>
                @endif
            @else
                {{-- RSVP FORM --}}
                <h2 class="form-title">💌 RSVP Here!</h2>
                <p class="form-subtitle">
                    Will you be joining us? Let us know so we can save you a spot! 🎊
                </p>

                @if($errors->any())
                    <div class="error-box">
                        ⚠️ {{ $errors->first() }}
                    </div>
                @endif

                <form id="rsvp-form" action="{{ route('rsvp.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="attending" id="attending-input" value="" />

                    <div class="field-wrap">
                        <label for="name-field" class="field-label">
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
                            Sorry, can't make it
                        </button>
                    </div>
                </form>

                <p class="rsvp-deadline">
                    💡 Please RSVP by <strong>September 17, 2026</strong>
                </p>
            @endif
        </div>
    </div>

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

    // Animate card away, then submit
    var overlay = document.getElementById('rsvp-overlay');
    var card    = document.getElementById('rsvp-modal-card');
    if (card) card.classList.add('closing');
    if (overlay) overlay.classList.add('closing');
    setTimeout(function () {
        document.getElementById('rsvp-form').submit();
    }, 380);
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const audio             = document.getElementById('bg-music');
        const musicToggle       = document.getElementById('music-toggle-btn');
        const btnLightCandle    = document.getElementById('btn-light-candle');
        const glow              = document.getElementById('cake-glow');
        const flames            = document.querySelectorAll('.candle-flame');
        const invitationSection = document.getElementById('invitation-section');
        const promptText        = document.getElementById('cake-prompt-text');
        let candleLit           = false;

        // ===== CANDLE LIGHT BUTTON (STARTS MUSIC + REVEALS INVITATION) =====
        if (btnLightCandle) {
            btnLightCandle.addEventListener('click', function () {
                if (candleLit) return;
                candleLit = true;

                // 1. Reveal flame
                flames.forEach(function (flame) {
                    flame.classList.add('lit');
                });

                // 2. Glow effect
                setTimeout(function () {
                    if (glow) {
                        glow.style.transition = 'opacity 1s';
                        glow.style.opacity   = '0.14';
                    }
                }, 400);

                // 3. Start music & show floating music toggle
                if (audio) {
                    audio.play().then(function () {
                        if (musicToggle) {
                            musicToggle.classList.add('visible', 'playing');
                        }
                    }).catch(function (e) {
                        console.log('Audio playback notice:', e);
                        if (musicToggle) musicToggle.classList.add('visible');
                    });
                }

                // 4. Update button & prompt text
                btnLightCandle.innerHTML = '✨ Yay! Happy Birthday, Elvina! 🎉';
                btnLightCandle.classList.remove('pulse-btn');
                btnLightCandle.style.background = 'linear-gradient(135deg, #ffd700, #ff85b3)';
                btnLightCandle.style.color = '#fff';
                btnLightCandle.style.boxShadow = '0 8px 28px rgba(255,215,0,0.5)';
                btnLightCandle.style.cursor = 'default';

                if (promptText) {
                    promptText.innerHTML = '🎂 <em>Candle is lit! Explore your invitation below!</em> 💌';
                    promptText.style.color = '#c2185b';
                    promptText.style.fontWeight = '800';
                }

                // 5. Reveal the rest of the invitation page
                if (invitationSection) {
                    invitationSection.classList.add('revealed');
                    
                    // Smooth scroll to invitation content
                    setTimeout(function () {
                        invitationSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 500);
                }
            });
        }

        // Floating music toggle button click
        if (musicToggle && audio) {
            musicToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                if (audio.paused) {
                    audio.play().then(function () {
                        musicToggle.classList.add('playing');
                        const icon = musicToggle.querySelector('.music-disc-icon');
                        if (icon) icon.textContent = '🎵';
                    });
                } else {
                    audio.pause();
                    musicToggle.classList.remove('playing');
                    const icon = musicToggle.querySelector('.music-disc-icon');
                    if (icon) icon.textContent = '🔇';
                }
            });
        }

        // ===== ENVELOPE OPEN → RSVP MODAL =====
        const envelopeWrap = document.getElementById('envelope-wrap');
        const envelopeFlap = document.getElementById('envelope-flap');
        const rsvpOverlay  = document.getElementById('rsvp-overlay');
        const btnClose     = document.getElementById('btn-close-modal');
        let envelopeOpened = false;

        function openEnvelope() {
            if (envelopeOpened) return;
            envelopeOpened = true;

            // 1. Flap opens
            if (envelopeFlap) envelopeFlap.classList.add('open');
            if (envelopeWrap) envelopeWrap.style.cursor = 'default';

            // 2. Show RSVP overlay after flap finishes
            setTimeout(function () {
                if (rsvpOverlay) {
                    rsvpOverlay.setAttribute('aria-hidden', 'false');
                    rsvpOverlay.classList.add('visible');
                }
            }, 420);
        }

        function closeModal() {
            if (!rsvpOverlay) return;
            rsvpOverlay.classList.remove('visible');
            rsvpOverlay.classList.add('closing');
            setTimeout(function () {
                rsvpOverlay.classList.remove('closing');
                envelopeOpened = false;
                if (envelopeFlap) envelopeFlap.classList.remove('open');
                if (envelopeWrap) envelopeWrap.style.cursor = 'pointer';
            }, 380);
        }

        if (envelopeWrap) {
            envelopeWrap.addEventListener('click', openEnvelope);
            envelopeWrap.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') openEnvelope();
            });
        }

        if (btnClose) {
            btnClose.addEventListener('click', closeModal);
        }

        // Close overlay when clicking the dark backdrop
        if (rsvpOverlay) {
            rsvpOverlay.addEventListener('click', function (e) {
                if (e.target === rsvpOverlay) {
                    closeModal();
                }
            });
        }

        // Auto-open if there is a validation error or flash message
        @if($errors->any() || session('success') || session('info'))
        if (btnLightCandle) {
            btnLightCandle.click();
        }
        @endif
    });
</script>
</body>
</html>

