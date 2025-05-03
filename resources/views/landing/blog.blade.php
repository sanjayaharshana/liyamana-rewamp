@extends('landing.common.app')
@section('title', 'Blog - Liyamana Online Platform')
@section('meta_description', 'Explore our blog for insights, tips, and stories about letter writing, communication, and connecting with loved ones.')
@section('meta_keywords', 'blog, letter writing, communication, Liyamana blog, writing tips')

@push('head-css')
<style>
    /* Modern Blog Page Styles */
    .blog-hero {
        background: url("{{ asset('landing_pages/assets/img/back-bg.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 180px 0 100px;
        margin-bottom: 80px;
        position: relative;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .blog-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(139, 38, 47, 0.9), rgba(139, 38, 47, 0.7));
        z-index: 1;
    }

    .blog-hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        color: #fff;
    }

    .blog-hero h1 {
        font-size: 4rem;
        font-weight: 800;
        margin-bottom: 25px;
        animation: fadeInUp 1s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        background: linear-gradient(45deg, #fff, #fff);
        color: #f5f5f5 ;
        -webkit-background-clip: text;
        letter-spacing: 1px;
    }

    .blog-hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto 35px;
        animation: fadeInUp 1.2s ease;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    /* Modern Card Styles */
    .blog-card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        position: relative;
        opacity: 0;
        transform: translateY(30px);
        border: none;
    }

    .blog-card.animated {
        animation: fadeInUp 0.5s ease forwards;
    }

    .blog-card:hover {
        transform: translateY(-15px) !important;
        box-shadow: 0 20px 40px rgba(139, 38, 47, 0.2);
    }

    .blog-card-img {
        height: 250px;
        overflow: hidden;
        position: relative;
        background: #f5f5f5;
    }

    .blog-card-img::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.3) 100%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .blog-card:hover .blog-card-img::before {
        opacity: 1;
    }

    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s ease;
        opacity: 0;
        animation: fadeIn 0.3s ease forwards;
        transform: scale(1);
    }

    .blog-card:hover .blog-card-img img {
        transform: scale(1.1);
    }

    .blog-card-img img.loaded {
        opacity: 1;
    }

    .blog-card-img img.error {
        opacity: 1;
    }

    .featured-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(45deg, #8b262f, #c0392b);
        color: white;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 5px 15px rgba(139, 38, 47, 0.3);
        transform: translateY(-5px);
        animation: badgeBounce 0.5s ease forwards;
        letter-spacing: 0.5px;
    }

    .blog-card-body {
        padding: 30px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        background: #fff;
        z-index: 2;
    }

    .blog-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
        line-height: 1.4;
        position: relative;
        display: inline-block;
    }

    .blog-card-title::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        transition: width 0.4s ease;
    }

    .blog-card:hover .blog-card-title {
        color: #8b262f;
    }

    .blog-card:hover .blog-card-title::after {
        width: 100%;
    }

    .blog-card-text {
        color: #666;
        margin-bottom: 25px;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    .blog-card-meta {
        display: flex;
        justify-content: space-between;
        color: #888;
        font-size: 0.95rem;
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
    }

    .blog-card-meta i {
        margin-right: 8px;
        color: #8b262f;
    }

    .blog-card-link {
        display: inline-flex;
        align-items: center;
        margin-top: 20px;
        color: #8b262f;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        font-size: 1.1rem;
    }

    .blog-card-link i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .blog-card-link:hover i {
        transform: translateX(8px);
    }

    .blog-card-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: #8b262f;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .blog-card-link:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    /* Modern Category Tags */
    .blog-category {
        display: inline-block;
        padding: 5px 15px;
        background: rgba(139, 38, 47, 0.1);
        color: #8b262f;
        border-radius: 20px;
        font-size: 0.85rem;
        margin-right: 8px;
        margin-bottom: 8px;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .blog-category::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: all 0.4s ease;
    }

    .blog-category:hover::before {
        left: 100%;
    }

    .blog-category:hover {
        background: #8b262f;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 38, 47, 0.2);
    }

    /* Modern Pagination */
    .blog-pagination {
        margin: 60px 0;
        display: flex;
        justify-content: center;
    }

    .blog-pagination .page-item.active .page-link {
        background: linear-gradient(45deg, #8b262f, #c0392b);
        border-color: #8b262f;
        box-shadow: 0 5px 15px rgba(139, 38, 47, 0.2);
    }

    .blog-pagination .page-link {
        color: #8b262f;
        border-radius: 10px;
        margin: 0 5px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        border: none;
        padding: 10px 20px;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .blog-pagination .page-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
    }

    .blog-pagination .page-link:hover::before {
        left: 100%;
    }

    .blog-pagination .page-link:hover {
        background: linear-gradient(45deg, #8b262f, #c0392b);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(139, 38, 47, 0.3);
    }

    /* Enhanced Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes badgeBounce {
        0% { transform: translateY(-5px); }
        50% { transform: translateY(5px); }
        100% { transform: translateY(0); }
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    /* Loading Animation */
    .blog-card.loading {
        animation: none;
    }

    .blog-card-img.loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .blog-hero h1 {
            font-size: 3.5rem;
        }
    }

    @media (max-width: 992px) {
        .blog-hero h1 {
            font-size: 3rem;
        }
        .blog-hero p {
            font-size: 1.2rem;
        }
        .blog-card-img {
            height: 220px;
        }
    }

    @media (max-width: 768px) {
        .blog-hero {
            padding: 150px 0 80px;
        }
        .blog-hero h1 {
            font-size: 2.5rem;
        }
        .blog-hero p {
            font-size: 1.1rem;
        }
        .blog-card-title {
            font-size: 1.3rem;
        }
        .blog-card-body {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .blog-hero h1 {
            font-size: 2rem;
        }
        .blog-hero p {
            font-size: 1rem;
        }
        .blog-card-img {
            height: 200px;
        }
    }

    /* Section Title Animation */
    .featured-title {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
        opacity: 0;
        transform: translateY(20px);
    }

    .featured-title.animated {
        animation: fadeInUp 0.8s ease forwards;
    }

    .featured-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        display: inline-block;
        padding-bottom: 15px;
        position: relative;
        color: #333;
        background: linear-gradient(45deg, #333, #666);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .featured-title h2::after {
        content: '';
        position: absolute;
        width: 60%;
        height: 4px;
        background: linear-gradient(45deg, #8b262f, #c0392b);
        bottom: 0;
        left: 20%;
        transform: scaleX(0);
        animation: expandWidth 1s ease forwards 0.5s;
        border-radius: 2px;
    }

    @keyframes expandWidth {
        to { transform: scaleX(1); }
    }

    /* No Posts Animation */
    .no-posts {
        text-align: center;
        padding: 80px 0;
        color: #666;
        animation: fadeIn 1s ease;
    }

    .no-posts i {
        font-size: 4rem;
        color: #8b262f;
        margin-bottom: 25px;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Card hover effects */
    .blog-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(139, 38, 47, 0.05) 0%, rgba(255, 255, 255, 0) 50%, rgba(139, 38, 47, 0.05) 100%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .blog-card:hover::before {
        opacity: 1;
    }

    /* Floating animation for featured badge */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
        100% { transform: translateY(0px); }
    }

    .featured-badge {
        animation: float 3s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content" data-aos="fade-up">
            <h1>Our Blog</h1>
            <p>Discover insights, stories, and tips about letter writing, communication, and connecting with loved ones.</p>
        </div>
    </div>
</section>

<!-- Featured Posts Section -->
@if($featuredPosts->count() > 0)
<section class="featured-posts">
    <div class="container">
        <div class="featured-title" data-aos="fade-up">
            <h2>Featured Articles</h2>
        </div>
        <div class="row">
            @foreach($featuredPosts as $post)
            <div class="col-lg-4 col-md-6 mb-4 blog-card-wrapper">
                <div class="blog-card loading">
                    <div class="blog-card-img loading">
                        @if($post->is_featured)
                        <span class="featured-badge">Featured</span>
                        @endif
                        <img
                            src="{{ $post->featured_image_url }}"
                            alt="{{ $post->title }}"
                            onerror="this.onerror=null; this.parentElement.classList.add('error'); this.src='{{ asset('landing_pages/assets/img/blog-placeholder.jpg') }}';"
                            loading="lazy"
                        >
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">{{ $post->title }}</h3>
                        @if(!empty($post->category_names) && is_array($post->category_names))
                            <div class="mb-2">
                                @foreach($post->category_names as $category)
                                    <span class="blog-category">{{ $category['name'] }}</span>
                                @endforeach
                            </div>
                        @endif
                        <p class="blog-card-text">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                        <div class="blog-card-meta">
                            <span><i class="bi bi-calendar"></i> {{ $post->created_at->format('M d, Y') }}</span>
                            @if(!empty($post->tags))
                                <span><i class="bi bi-tags"></i> {{ is_array($post->tags) ? implode(', ', $post->tags) : $post->tags }}</span>
                            @endif
                        </div>
                        <a href="{{ url('blog/' . $post->slug) }}" class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Blog Posts Section -->
<section class="all-posts">
    <div class="container">
        <div class="featured-title" data-aos="fade-up">
            <h2>Latest Articles</h2>
        </div>
        @if($blogPosts->count() > 0)
        <div class="row">
            @foreach($blogPosts as $post)
            <div class="col-lg-4 col-md-6 mb-4 blog-card-wrapper">
                <div class="blog-card loading">
                    <div class="blog-card-img loading">
                        @if($post->is_featured)
                        <span class="featured-badge">Featured</span>
                        @endif
                        <img
                            src="{{ $post->featured_image_url }}"
                            alt="{{ $post->title }}"
                            onerror="this.onerror=null; this.parentElement.classList.add('error'); this.src='{{ asset('landing_pages/assets/img/blog-placeholder.jpg') }}';"
                            loading="lazy"
                        >
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">{{ $post->title }}</h3>
                        @if(!empty($post->category_names) && is_array($post->category_names))
                            <div class="mb-2">
                                @foreach($post->category_names as $category)
                                    <span class="blog-category">{{ $category['name'] }}</span>
                                @endforeach
                            </div>
                        @endif
                        <p class="blog-card-text">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                        <div class="blog-card-meta">
                            <span><i class="bi bi-calendar"></i> {{ $post->created_at->format('M d, Y') }}</span>
                            @if(!empty($post->tags))
                                <span><i class="bi bi-tags"></i> {{ is_array($post->tags) ? implode(', ', $post->tags) : $post->tags }}</span>
                            @endif
                        </div>
                        <a href="{{ url('blog/' . $post->slug) }}" class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="blog-pagination">
            {{ $blogPosts->links() }}
        </div>
        @else
        <div class="no-posts" data-aos="fade-up">
            <i class="bi bi-journal-x"></i>
            <h3>No blog posts found</h3>
            <p>Check back later for new content!</p>
        </div>
        @endif
    </div>
</section>
@endsection

@section('footer', true)

@push('footer-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer for animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');

                    // For blog cards, add staggered animation
                    if (entry.target.classList.contains('blog-card')) {
                        const index = Array.from(document.querySelectorAll('.blog-card')).indexOf(entry.target);
                        entry.target.style.animationDelay = (index * 0.1) + 's';
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });

        // Observe all blog cards
        document.querySelectorAll('.blog-card').forEach(card => {
            observer.observe(card);
        });

        // Observe section titles
        document.querySelectorAll('.featured-title').forEach(title => {
            observer.observe(title);
        });

        // Image loading handling with enhanced effects
        document.querySelectorAll('.blog-card-img img').forEach(img => {
            // Preload image
            const tempImage = new Image();
            tempImage.src = img.src;

            tempImage.onload = function() {
                img.classList.add('loaded');
                img.closest('.blog-card-img').classList.remove('loading');
                img.closest('.blog-card').classList.remove('loading');

                // Add a subtle fade-in effect
                img.style.animation = 'fadeIn 0.5s ease forwards';
            };

            tempImage.onerror = function() {
                img.src = '{{ asset('landing_pages/assets/img/blog-placeholder.jpg') }}';
                img.classList.add('error');
                img.closest('.blog-card-img').classList.remove('loading');
                img.closest('.blog-card').classList.remove('loading');
            };
        });

        // Smooth scroll for pagination links
        document.querySelectorAll('.blog-pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                setTimeout(() => {
                    window.scrollTo({
                        top: document.querySelector('.all-posts').offsetTop - 100,
                        behavior: 'smooth'
                    });
                }, 100);
            });
        });

        // Enhanced hover effects for blog cards
        document.querySelectorAll('.blog-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 15px 30px rgba(139, 38, 47, 0.2)';

                // Add subtle rotation
                this.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';

                // Animate the read more link
                const link = this.querySelector('.blog-card-link i');
                if (link) {
                    link.style.transform = 'translateX(8px)';
                }
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';

                // Reset rotation
                this.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';

                // Reset the read more link
                const link = this.querySelector('.blog-card-link i');
                if (link) {
                    link.style.transform = 'translateX(0)';
                }
            });
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrollPosition = window.pageYOffset;
            const heroSection = document.querySelector('.blog-hero');

            if (heroSection) {
                heroSection.style.backgroundPositionY = (scrollPosition * 0.5) + 'px';
            }
        });

        // Add animation to category tags
        document.querySelectorAll('.blog-category').forEach(tag => {
            tag.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.05)';
            });

            tag.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>
@endpush
