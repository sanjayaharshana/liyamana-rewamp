<!-- Featured Products Section -->
<section id="featured-products" class="featured-products section py-5 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Trending Templates</h2>
            <p class="text-muted lead">Our most popular and loved letter designs</p>
        </div>

        <div class="row g-4">
            @foreach($mostPopularTemplates as $template)
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{$loop->iteration * 100}}">
                    <div class="product-card">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="product-image position-relative">
                                <img src="{{url('storage/'.$template->feature_image)}}" class="card-img-top" alt="{{$template->name}}" style="height: 200px; object-fit: cover;">
                                <div class="product-overlay">
                                    <a href="{{ url('market-place/'.$template->slug) }}" class="btn btn-light btn-sm">
                                        <i class="bi bi-eye me-2"></i>Quick View
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-danger">Featured</span>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-half text-warning"></i>
                                    </div>
                                </div>
                                <h5 class="card-title mb-2">{{$template->name}}</h5>
                                <p class="card-text text-muted small mb-3">{{Str::limit($template->description, 80)}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price-tag">
                                        <span class="h5 text-danger mb-0">LKR {{number_format($template->price,2)}}</span>
                                    </div>
                                    <a href="{{ url('market-place/'.$template->slug) }}" class="btn btn-outline-danger btn-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ url('market-place') }}" class="btn btn-danger btn-lg">
                View All Templates
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<style>
.product-card {
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card .card {
    border-radius: 15px;
    overflow: hidden;
}

.product-image {
    overflow: hidden;
}

.product-image img {
    transition: all 0.5s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-overlay .btn {
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.product-card:hover .product-overlay .btn {
    transform: translateY(0);
}

.badge {
    padding: 0.5em 1em;
    font-weight: 500;
}

.product-rating {
    font-size: 0.8rem;
}

.btn-danger {
    background: #b4261c;
    border-color: #b4261c;
}

.btn-danger:hover {
    background: #8f0606;
    border-color: #8f0606;
}

.btn-outline-danger {
    color: #b4261c;
    border-color: #b4261c;
}

.btn-outline-danger:hover {
    background: #b4261c;
    border-color: #b4261c;
}

.text-danger {
    color: #b4261c !important;
}

.section-title h2 {
    background: linear-gradient(45deg, #b4261c, #8f0606);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
}
</style>
