<!-- Categories Section -->
<section id="categories" class="categories section py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Browse by Category</h2>
            <p class="text-muted lead">Find the perfect template for your needs</p>
        </div>

        <div class="row g-4">
            @foreach($templateCategories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{$loop->iteration * 100}}">
                    <div class="category-card">
                        <a href="{{ url('market-place?category='.$category->slug) }}" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="icon-wrapper mb-4">
                                        <i class="{{$category->icon ?? 'bi bi-envelope-open'}}" style="font-size: 2.5rem; color: #b4261c;"></i>
                                    </div>
                                    <h4 class="card-title h5 mb-3">{{$category->category_name}}</h4>
                                    <p class="card-text text-muted small mb-0">{{Str::limit($category->category_description, 100)}}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                    <span class="btn btn-link text-danger">
                                        Browse Templates
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.category-card {
    transition: all 0.3s ease;
}

.category-card:hover {
    transform: translateY(-5px);
}

.category-card .card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.category-card:hover .card {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(180, 38, 28, 0.1);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.category-card:hover .icon-wrapper {
    transform: scale(1.1);
    background: rgba(180, 38, 28, 0.15);
}

.btn-link {
    text-decoration: none;
    padding: 0;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-link:hover {
    transform: translateX(5px);
}

.section-title h2 {
    background: linear-gradient(45deg, #b4261c, #8f0606);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
}
</style>
