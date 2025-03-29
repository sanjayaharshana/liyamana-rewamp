<!-- Hero Section -->
<section id="hero" class="hero section" style="background: linear-gradient(135deg, #55060e 0%, #8f0606 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                <h1 class="display-4 text-white fw-bold mb-4">Create Beautiful Letters That Matter</h1>
                <p class="lead text-white-50 mb-4">Discover our collection of premium letter templates for every occasion. From personal letters to business correspondence, we've got you covered.</p>
                <div class="d-flex gap-3">
                    <a href="{{ url('market-place') }}" class="btn btn-light btn-lg px-4">
                        Browse Templates
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('landing.register') }}" class="btn btn-outline-light btn-lg px-4">
                        Sign Up Free
                    </a>
                </div>
                <div class="mt-5 d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-white fs-4 me-2"></i>
                        <span class="text-white-50">Premium Templates</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-white fs-4 me-2"></i>
                        <span class="text-white-50">Easy Customization</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-left">
                <img src="{{url('landing_pages/banding/banner_theme.png')}}" alt="Letter Templates" class="img-fluid" style="max-height: 500px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));">
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

.btn-light {
    color: #b4261c;
    font-weight: 600;
}

.btn-light:hover {
    color: #8f0606;
    background: #f8f9fa;
}

.btn-outline-light:hover {
    background: rgba(255,255,255,0.1);
    border-color: #fff;
}
</style>
