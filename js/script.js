// Fonction pour faire défiler les images du carrousel avec transition fluide
let currentIndex = 0;
const images = document.querySelectorAll('.carousel-image');
let lastIndex = -1;

function showNextImage() {
    if (lastIndex >= 0) {
        images[lastIndex].classList.remove('active');
    }
    images[currentIndex].classList.add('active');
    lastIndex = currentIndex;
    currentIndex = (currentIndex + 1) % images.length;
}

// Démarrer le carrousel
setInterval(showNextImage, 3000); // Changer d'image toutes les 3 secondes
images[currentIndex].classList.add('active');

// Animation de particules (étoiles/étincelles)
const canvas = document.getElementById('particle-canvas');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const particles = [];
for (let i = 0; i < 50; i++) {
    particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        speed: 0.5 + Math.random() * 1,
        radius: Math.random() * 2 + 1,
        alpha: Math.random()
    });
}

function animateParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < particles.length; i++) {
        let p = particles[i];
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${p.alpha})`; // Étoiles blanches
        ctx.fill();
        p.y -= p.speed;
        if (p.y < 0) p.y = canvas.height;
    }
    requestAnimationFrame(animateParticles);
}

animateParticles();

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});