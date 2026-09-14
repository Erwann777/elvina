{{-- ===== FALLING PARTICLES CANVAS (over everything) ===== --}}
<canvas id="particles-canvas"></canvas>

{{-- ===== SVG BUNTING GARLAND ===== --}}
<div class="bunting-bar" aria-hidden="true">
    <svg class="bunting-svg" viewBox="0 0 1200 110" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Main rope -->
        <path d="M0,18 Q150,55 300,22 Q450,55 600,22 Q750,55 900,22 Q1050,55 1200,22"
              fill="none" stroke="#c7954a" stroke-width="2.5" stroke-linecap="round"/>
        <!-- Flags — each is a triangle hanging from a point on the rope -->
        <!-- Group 1 -->
        <polygon points="54,18  84,18  69,62"  fill="#e91e8c" opacity="0.9"/>
        <polygon points="105,26 135,26 120,70" fill="#c77dff" opacity="0.9"/>
        <polygon points="156,33 186,33 171,77" fill="#ffd700" opacity="0.9"/>
        <polygon points="207,38 237,38 222,82" fill="#ff85b3" opacity="0.9"/>
        <polygon points="258,42 288,42 273,86" fill="#7ec8e3" opacity="0.9"/>
        <!-- Group 2 -->
        <polygon points="330,46 360,46 345,90" fill="#ffd700" opacity="0.9"/>
        <polygon points="381,42 411,42 396,86" fill="#e91e8c" opacity="0.9"/>
        <polygon points="432,38 462,38 447,82" fill="#c77dff" opacity="0.9"/>
        <polygon points="483,33 513,33 498,77" fill="#ff85b3" opacity="0.9"/>
        <polygon points="534,26 564,26 549,70" fill="#7ec8e3" opacity="0.9"/>
        <!-- Group 3 (mirror) -->
        <polygon points="636,22 666,22 651,66" fill="#ffd700" opacity="0.9"/>
        <polygon points="687,26 717,26 702,70" fill="#e91e8c" opacity="0.9"/>
        <polygon points="738,33 768,33 753,77" fill="#c77dff" opacity="0.9"/>
        <polygon points="789,38 819,38 804,82" fill="#ff85b3" opacity="0.9"/>
        <polygon points="840,42 870,42 855,86" fill="#7ec8e3" opacity="0.9"/>
        <polygon points="912,46 942,46 927,90" fill="#ffd700" opacity="0.9"/>
        <polygon points="963,42 993,42 978,86" fill="#e91e8c" opacity="0.9"/>
        <polygon points="1014,38 1044,38 1029,82" fill="#c77dff" opacity="0.9"/>
        <polygon points="1065,33 1095,33 1080,77" fill="#ff85b3" opacity="0.9"/>
        <polygon points="1116,26 1146,26 1131,70" fill="#7ec8e3" opacity="0.9"/>
        <!-- Small decorative dots on rope -->
        <circle cx="300" cy="22" r="4" fill="#c7954a"/>
        <circle cx="600" cy="22" r="4" fill="#c7954a"/>
        <circle cx="900" cy="22" r="4" fill="#c7954a"/>
    </svg>
</div>


<script>
// ===== CANVAS PARTICLES — falls OVER photo (z-index 9999) =====
(function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    function resize() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    const STICKERS = ['heart','star','bow','flower','circle','diamond'];
    const COLORS   = [
        '#e91e8c','#ff69b4','#ff85b3','#c77dff',
        '#ffd700','#f48fb1','#ff4d94','#d63384',
        '#ce93d8','#ffb3c6','#7ec8e3','#ff6eb4'
    ];

    function mkParticle() {
        return {
            type:        STICKERS[Math.floor(Math.random() * STICKERS.length)],
            x:           Math.random() * canvas.width,
            y:           -40,
            size:        10 + Math.random() * 22,
            speedY:      1.0 + Math.random() * 2.8,
            speedX:      (Math.random() - 0.5) * 1.4,
            rotation:    Math.random() * Math.PI * 2,
            rotSpeed:    (Math.random() - 0.5) * 0.07,
            color:       COLORS[Math.floor(Math.random() * COLORS.length)],
            color2:      COLORS[Math.floor(Math.random() * COLORS.length)],
            opacity:     0.7 + Math.random() * 0.3,
            wobble:      Math.random() * Math.PI * 2,
            wobbleSpeed: 0.02 + Math.random() * 0.04,
        };
    }

    function drawHeart(x, y, s, col, op) {
        ctx.save(); ctx.globalAlpha = op; ctx.fillStyle = col;
        const r = s * 0.5;
        ctx.beginPath();
        ctx.moveTo(x, y + r * 0.3);
        ctx.bezierCurveTo(x, y - r * 0.3, x - r, y - r * 0.3, x - r, y + r * 0.3);
        ctx.bezierCurveTo(x - r, y + r * 0.8, x, y + r * 1.3, x, y + r * 1.3);
        ctx.bezierCurveTo(x, y + r * 1.3, x + r, y + r * 0.8, x + r, y + r * 0.3);
        ctx.bezierCurveTo(x + r, y - r * 0.3, x, y - r * 0.3, x, y + r * 0.3);
        ctx.fill(); ctx.restore();
    }

    function drawStar(x, y, s, col, op) {
        ctx.save(); ctx.globalAlpha = op; ctx.fillStyle = col;
        const oR = s * 0.6, iR = s * 0.25, spikes = 5;
        let rot = Math.PI / 2 * 3, step = Math.PI / spikes;
        ctx.beginPath(); ctx.moveTo(x, y - oR);
        for (let i = 0; i < spikes; i++) {
            ctx.lineTo(x + Math.cos(rot) * oR, y + Math.sin(rot) * oR); rot += step;
            ctx.lineTo(x + Math.cos(rot) * iR, y + Math.sin(rot) * iR); rot += step;
        }
        ctx.closePath(); ctx.fill(); ctx.restore();
    }

    function drawBow(x, y, s, col, col2, op) {
        ctx.save(); ctx.globalAlpha = op;
        const r = s * 0.4;
        ctx.fillStyle = col;
        ctx.beginPath(); ctx.ellipse(x - r * 0.9, y, r, r * 0.55, -0.4, 0, Math.PI * 2); ctx.fill();
        ctx.fillStyle = col2;
        ctx.beginPath(); ctx.ellipse(x + r * 0.9, y, r, r * 0.55, 0.4, 0, Math.PI * 2); ctx.fill();
        ctx.fillStyle = '#fff';
        ctx.beginPath(); ctx.arc(x, y, r * 0.28, 0, Math.PI * 2); ctx.fill();
        ctx.fillStyle = col;
        ctx.beginPath(); ctx.arc(x, y, r * 0.18, 0, Math.PI * 2); ctx.fill();
        ctx.restore();
    }

    function drawFlower(x, y, s, col, op) {
        ctx.save(); ctx.globalAlpha = op;
        const r = s * 0.35, petals = 6;
        for (let i = 0; i < petals; i++) {
            const a = (i / petals) * Math.PI * 2;
            ctx.fillStyle = col;
            ctx.beginPath();
            ctx.ellipse(x + Math.cos(a) * r, y + Math.sin(a) * r, r * 0.6, r * 0.38, a, 0, Math.PI * 2);
            ctx.fill();
        }
        ctx.fillStyle = '#ffd700';
        ctx.beginPath(); ctx.arc(x, y, r * 0.42, 0, Math.PI * 2); ctx.fill();
        ctx.restore();
    }

    function drawCircle(x, y, s, col, op) {
        ctx.save(); ctx.globalAlpha = op; ctx.fillStyle = col;
        ctx.beginPath(); ctx.arc(x, y, s * 0.45, 0, Math.PI * 2); ctx.fill();
        ctx.restore();
    }

    function drawDiamond(x, y, s, col, op) {
        ctx.save(); ctx.globalAlpha = op; ctx.fillStyle = col;
        ctx.beginPath();
        ctx.moveTo(x, y - s * 0.55); ctx.lineTo(x + s * 0.35, y);
        ctx.lineTo(x, y + s * 0.55); ctx.lineTo(x - s * 0.35, y);
        ctx.closePath(); ctx.fill(); ctx.restore();
    }

    function drawParticle(p) {
        ctx.save();
        ctx.translate(p.x, p.y); ctx.rotate(p.rotation); ctx.translate(-p.x, -p.y);
        switch (p.type) {
            case 'heart':   drawHeart(p.x, p.y, p.size, p.color, p.opacity); break;
            case 'star':    drawStar(p.x, p.y, p.size, p.color, p.opacity); break;
            case 'bow':     drawBow(p.x, p.y, p.size, p.color, p.color2, p.opacity); break;
            case 'flower':  drawFlower(p.x, p.y, p.size, p.color, p.opacity); break;
            case 'circle':  drawCircle(p.x, p.y, p.size, p.color, p.opacity); break;
            case 'diamond': drawDiamond(p.x, p.y, p.size, p.color, p.opacity); break;
        }
        ctx.restore();
    }

    const particles = [];
    for (let i = 0; i < 45; i++) {
        const p = mkParticle();
        p.y = Math.random() * (window.innerHeight + 200) - 100;
        particles.push(p);
    }

    let frame = 0;
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        frame++;
        if (frame % 30 === 0 && particles.length < 45) particles.push(mkParticle());
        for (let i = particles.length - 1; i >= 0; i--) {
            const p = particles[i];
            p.wobble    += p.wobbleSpeed;
            p.x         += Math.sin(p.wobble) * 1.0 + p.speedX;
            p.y         += p.speedY;
            p.rotation  += p.rotSpeed;
            drawParticle(p);
            if (p.y > canvas.height + 60) {
                particles.splice(i, 1);
                particles.push(mkParticle());
            }
        }
        requestAnimationFrame(animate);
    }
    animate();
})();
</script>
