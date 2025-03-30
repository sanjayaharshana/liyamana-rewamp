<!-- Hero Section -->
<section id="hero" class="hero section" style="background: linear-gradient(135deg, #55060e 0%, #8f0606 100%); min-height: 80vh; display: flex; align-items: center; padding: 60px 0;">
    <div class="container">
    <div class="row align-items-center" style="margin-top: 0px;">
            <div class="col-lg-6 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-right">
                <h1 class="display-5 text-white fw-bold mb-3 animate-text">
                    <span class="text-gradient">Create Beautiful</span>
                    <span class="text-gradient-delay">Letters That Matter</span>
                </h1>
                <p class="lead text-white-50 mb-3 animate-text-delay typing-text">Discover our collection of premium letter templates for every occasion. From personal letters to business correspondence, we've got you covered.</p>
                <div class="d-flex gap-2">
                    <a href="http://localhost:8000/market-place" class="btn btn-light btn-lg px-3 hover-scale btn-animate">
                        <span class="btn-content">
                            <span>Browse Templates</span>
                            <i class="bi bi-arrow-right ms-2"></i>
                        </span>
                        <span class="btn-shine"></span>
                    </a>
                    <a href="http://localhost:8000/register" class="btn btn-outline-light btn-lg px-3 hover-scale btn-animate">
                        <span class="btn-content">
                            <span>Sign Up Free</span>
                        </span>
                        <span class="btn-shine"></span>
                    </a>
                </div>
                <div class="mt-3 d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center feature-item">
                        <i class="bi bi-check-circle-fill text-white fs-5 me-2 feature-icon"></i>
                        <span class="text-white-50 feature-text">Premium Templates</span>
                    </div>
                    <div class="d-flex align-items-center feature-item">
                        <i class="bi bi-check-circle-fill text-white fs-5 me-2 feature-icon"></i>
                        <span class="text-white-50 feature-text">Easy Customization</span>
                    </div>
                </div>

                <!-- New Statistics Section -->
                

                <!-- New Social Proof Section -->
                <div class="social-proof mt-3">
                    <div class="d-flex align-items-center">
                        <div class="user-avatars">
                            <img src="http://localhost:8000/landing_pages/avatars/user1.jpg" alt="User 1" class="avatar">
                            <img src="http://localhost:8000/landing_pages/avatars/user2.jpg" alt="User 2" class="avatar">
                            <img src="http://localhost:8000/landing_pages/avatars/user3.jpg" alt="User 3" class="avatar">
                        </div>
                        <div class="rating ms-3">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">Trusted by 1000+ users worldwide</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center aos-init aos-animate" data-aos="fade-left">
                <div class="stats-container mt-3">
                    <div class="row g-3">
                        <div class="col-3">
                            <div class="stat-item">
                                <div class="stat-number animate" data-count="1000">1000</div>
                                <div class="stat-label">Happy Users</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stat-item">
                                <div class="stat-number animate" data-count="500">500</div>
                                <div class="stat-label">Templates</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stat-item">
                                <div class="stat-number animate" data-count="50">50</div>
                                <div class="stat-label">Countries</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="stat-item">
                                <div class="stat-number animate" data-count="98">98</div>
                                <div class="stat-label">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                </div><div class="hero-image-container">
                    <img src="http://localhost:8000/landing_pages/banding/banner_theme.png" alt="Letter Templates" class="img-fluid floating-image" style="max-height: 400px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));">
                    <div class="floating-elements">
                        <div class="floating-element element-1"></div>
                        <div class="floating-element element-2"></div>
                        <div class="floating-element element-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.hero {
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: url('{{url('landing_pages/pattern.png')}}') repeat;
    opacity: 0.1;
    pointer-events: none;
}

/* Enhanced Text Animations */
.text-gradient {
    background: linear-gradient(45deg, #fff, #ffd700);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: inline-block;
    animation: gradientFlow 3s ease infinite;
}

.text-gradient-delay {
    background: linear-gradient(45deg, #ffd700, #fff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: inline-block;
    animation: gradientFlow 3s ease infinite 1.5s;
}

@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

/* Typing Text Animation */
.typing-text {
    border-right: 2px solid #fff;
    white-space: nowrap;
    overflow: hidden;
    animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
}

@keyframes typing {
    from { width: 0 }
    to { width: 100% }
}

@keyframes blink-caret {
    from, to { border-color: transparent }
    50% { border-color: #fff }
}

/* Enhanced Button Animations */
.btn-animate {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-content {
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transform: translateX(-100%);
    transition: all 0.5s ease;
}

.btn-animate:hover .btn-shine {
    transform: translateX(100%);
}

.btn-animate:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.btn-light {
    color: #b4261c;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-light:hover {
    color: #8f0606;
    background: #f8f9fa;
}

.btn-outline-light {
    transition: all 0.3s ease;
}

.btn-outline-light:hover {
    background: rgba(255,255,255,0.1);
    border-color: #fff;
}

/* Enhanced Feature Items Animation */
.feature-item {
    opacity: 0;
    transform: translateX(-20px);
    animation: slideIn 0.5s ease forwards;
}

.feature-icon {
    transition: all 0.3s ease;
}

.feature-text {
    transition: all 0.3s ease;
}

.feature-item:hover .feature-icon {
    transform: scale(1.2) rotate(360deg);
    color: #ffd700;
}

.feature-item:hover .feature-text {
    transform: translateX(10px);
    color: #fff;
}

.feature-item:nth-child(1) {
    animation-delay: 0.6s;
}

.feature-item:nth-child(2) {
    animation-delay: 0.8s;
}

@keyframes slideIn {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Enhanced Floating Image Animation */
.hero-image-container {
    position: relative;
    display: inline-block;
}

.floating-image {
    animation: float 6s ease-in-out infinite;
    transition: all 0.3s ease;
}

.floating-image:hover {
    transform: scale(1.05) rotate(2deg);
    filter: drop-shadow(0 15px 30px rgba(0,0,0,0.3));
}

@keyframes float {
    0% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(1deg);
    }
    100% {
        transform: translateY(0px) rotate(0deg);
    }
}

/* Enhanced Floating Elements */
.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.floating-element {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: floatElement 8s infinite;
    transition: all 0.3s ease;
}

.floating-element:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.2);
}

.element-1 {
    width: 25px;
    height: 25px;
    top: 15%;
    left: 10%;
    animation-delay: 0s;
}

.element-2 {
    width: 18px;
    height: 18px;
    top: 55%;
    right: 15%;
    animation-delay: 2s;
}

.element-3 {
    width: 22px;
    height: 22px;
    bottom: 15%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes floatElement {
    0% {
        transform: translate(0, 0) rotate(0deg);
    }
    50% {
        transform: translate(20px, 20px) rotate(180deg);
    }
    100% {
        transform: translate(0, 0) rotate(360deg);
    }
}

/* New Statistics Styles */
.stats-container {

}

.stat-item {
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.1);
}

.stat-number {
    font-size: 2rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 3px;
}

.stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
}

/* Social Proof Styles */
.social-proof {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.user-avatars {
    display: flex;
    align-items: center;
}

.avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 2px solid #fff;
    margin-left: -8px;
    transition: all 0.3s ease;
}

.avatar:first-child {
    margin-left: 0;
}

.avatar:hover {
    transform: translateY(-3px);
    z-index: 1;
}

.stars {
    color: #ffd700;
    font-size: 1.1rem;
    margin-bottom: 3px;
}

.rating-text {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
}

/* Animation for Statistics Numbers */
@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-number.animate {
    animation: countUp 0.5s ease forwards;
}

/* Enhanced Floating Elements */
.floating-element {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: floatElement 8s infinite;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

.floating-element::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.3));
    z-index: -1;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.2;
    }
    100% {
        transform: scale(1);
        opacity: 0.5;
    }
}

/* Adjusted Button Styles */
.btn-lg {
    padding: 0.5rem 1rem;
    font-size: 1rem;
}

/* Adjusted Typing Text Animation */
.typing-text {
    font-size: 1.1rem;
}

/* Adjusted Feature Items */
.feature-item {
    font-size: 0.95rem;
}

.feature-icon {
    font-size: 1.1rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate statistics numbers
    const stats = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        stats.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-count'));
            let current = 0;
            const increment = target / 50;
            
            const updateNumber = () => {
                if (current < target) {
                    current += increment;
                    stat.textContent = Math.round(current);
                    requestAnimationFrame(updateNumber);
                } else {
                    stat.textContent = target;
                }
            };
            
            updateNumber();
            stat.classList.add('animate');
        });
    };

    // Intersection Observer for stats animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelector('.stats-container').querySelectorAll('.stat-item').forEach(item => {
        observer.observe(item);
    });
});
</script>
