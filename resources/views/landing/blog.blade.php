@extends('landing.common.app')
@section('title', 'Blog - Liyamana Online Platform')
@section('meta_description', 'Explore our blog for insights, tips, and stories about letter writing, communication, and connecting with loved ones.')
@section('meta_keywords', 'blog, letter writing, communication, Liyamana blog, writing tips')
@push('head-css')
<style>
    /* Blog Page Styles */
    .blog-hero {
        background: linear-gradient(rgba(139, 38, 47, 0.9), rgba(139, 38, 47, 0.8)),
                    url('{{url('landing_pages/assets/img/blog-bg.jpg')}}');
        background-size: cover;
        background-position: center;
        padding: 150px 0 80px;
        margin-bottom: 60px;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .blog-hero-content {
        text-align: center;
        color: #fff;
    }
    .blog-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeInUp 1s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        color: beige;
    }
    .blog-hero p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto 30px;
        animation: fadeInUp 1.2s ease;
    }
    .featured-posts {
        margin-bottom: 60px;
    }
    .featured-title {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }
    .featured-title h2 {
        font-size: 2.2rem;
        font-weight: 600;
        display: inline-block;
        padding-bottom: 10px;
        position: relative;
        color: #333;
    }
    .featured-title h2:after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background: #8b262f;
        bottom: 0;
        left: 25%;
        transform: scaleX(0);
        animation: expandWidth 1s ease forwards;
    }
    @keyframes expandWidth {
        to { transform: scaleX(1); }
    }
    .blog-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        position: relative;
        transform: translateY(30px);
        opacity: 0;
        animation: fadeInUp 0.5s ease forwards;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    .blog-card:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 15px 30px rgba(139, 38, 47, 0.2);
    }
    .blog-card-img {
        height: 220px;
        overflow: hidden;
        position: relative;
    }
    .blog-card-img::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .blog-card:hover .blog-card-img::before {
        opacity: 1;
    }
    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    .blog-card:hover .blog-card-img img {
        transform: scale(1.1);
    }
    .featured-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #8b262f;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
        animation: badgeBounce 0.5s ease forwards;
    }
    @keyframes badgeBounce {
        to { transform: translateY(0); }
    }
    .blog-card-body {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .blog-card-body::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 3px;
        background: #8b262f;
        transition: width 0.3s ease;
    }
    .blog-card:hover .blog-card-body::after {
        width: 100%;
    }
    .blog-card-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
        transition: color 0.3s ease;
        line-height: 1.3;
    }
    .blog-card:hover .blog-card-title {
        color: #8b262f;
    }
    .blog-card-text {
        color: #666;
        margin-bottom: 20px;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.6;
    }
    .blog-card-meta {
        display: flex;
        justify-content: space-between;
        color: #888;
        font-size: 0.9rem;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }
    .blog-card-meta i {
        margin-right: 5px;
        color: #8b262f;
    }
    .blog-card-link {
        display: inline-flex;
        align-items: center;
        margin-top: 15px;
        color: #8b262f;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }
    .blog-card-link i {
        margin-left: 5px;
        transition: transform 0.3s ease;
    }
    .blog-card-link:hover i {
        transform: translateX(5px);
    }
    .blog-card-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: #8b262f;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }
    .blog-card-link:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }
    .blog-pagination {
        margin: 50px 0;
        display: flex;
        justify-content: center;
    }
    .blog-pagination .page-item.active .page-link {
        background-color: #8b262f;
        border-color: #8b262f;
    }
    .blog-pagination .page-link {
        color: #8b262f;
        border-radius: 5px;
        margin: 0 5px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    .blog-pagination .page-link:hover {
        background-color: #8b262f;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(139, 38, 47, 0.2);
    }
    .no-posts {
        text-align: center;
        padding: 50px 0;
        color: #666;
        animation: fadeIn 1s ease;
    }
    .no-posts i {
        font-size: 3rem;
        color: #8b262f;
        margin-bottom: 20px;
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    /* Animation Keyframes */
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
        from { opacity: 0; }
        to { opacity: 1; }
    }
    /* Animation Delays for Blog Cards */
    .blog-card-wrapper:nth-child(1) .blog-card { animation-delay: 0.1s; }
    .blog-card-wrapper:nth-child(2) .blog-card { animation-delay: 0.2s; }
    .blog-card-wrapper:nth-child(3) .blog-card { animation-delay: 0.3s; }
    .blog-card-wrapper:nth-child(4) .blog-card { animation-delay: 0.4s; }
    .blog-card-wrapper:nth-child(5) .blog-card { animation-delay: 0.5s; }
    .blog-card-wrapper:nth-child(6) .blog-card { animation-delay: 0.6s; }
    .blog-card-wrapper:nth-child(7) .blog-card { animation-delay: 0.7s; }
    .blog-card-wrapper:nth-child(8) .blog-card { animation-delay: 0.8s; }
    .blog-card-wrapper:nth-child(9) .blog-card { animation-delay: 0.9s; }
    /* Animated background for featured section */
    .featured-posts {
        position: relative;
        overflow: hidden;
    }
    .featured-posts::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(139, 38, 47, 0.05) 0%, rgba(255, 255, 255, 0) 50%, rgba(139, 38, 47, 0.05) 100%);
        z-index: -1;
        animation: gradientMove 15s ease infinite;
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .blog-hero h1 {
            font-size: 2.8rem;
        }
        .featured-title h2 {
            font-size: 2rem;
        }
    }
    @media (max-width: 768px) {
        .blog-hero h1 {
            font-size: 2.2rem;
        }
        .blog-hero p {
            font-size: 1rem;
        }
        .featured-title h2 {
            font-size: 1.8rem;
        }
        .blog-card-title {
            font-size: 1.2rem;
        }
    }
    /* Fix for image display */
    .blog-card-img img {
        display: block;
        max-width: 100%;
    }
    /* Shimmer effect for loading */
    .blog-card.loading .blog-card-img,
    .blog-card.loading .blog-card-title,
    .blog-card.loading .blog-card-text {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
        border-radius: 4px;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    /* Animated category tags */
    .blog-category {
        display: inline-block;
        padding: 3px 10px;
        background: rgba(139, 38, 47, 0.1);
        color: #8b262f;
        border-radius: 15px;
        font-size: 0.75rem;
        margin-right: 5px;
        margin-bottom: 5px;
        transition: all 0.3s ease;
    }
    .blog-category:hover {
        background: #8b262f;
        color: white;
        transform: translateY(-2px);
    }
    /* Image error handling */
    .blog-card-img.error::after {
        content: 'Image not available';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f8f8;
        color: #8b262f;
        font-size: 0.9rem;
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
                <div class="blog-card">
                    <div class="blog-card-img">
                        <span class="featured-badge">Featured</span>
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
                <div class="blog-card">
                    <div class="blog-card-img">
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

                    // Add staggered animation to child elements
                    if (entry.target.classList.contains('blog-card')) {
                        const img = entry.target.querySelector('.blog-card-img');
                        const title = entry.target.querySelector('.blog-card-title');
                        const text = entry.target.querySelector('.blog-card-text');
                        const meta = entry.target.querySelector('.blog-card-meta');
                        const link = entry.target.querySelector('.blog-card-link');

                        if (img) setTimeout(() => img.classList.add('animated'), 100);
                        if (title) setTimeout(() => title.classList.add('animated'), 200);
                        if (text) setTimeout(() => text.classList.add('animated'), 300);
                        if (meta) setTimeout(() => meta.classList.add('animated'), 400);
                        if (link) setTimeout(() => link.classList.add('animated'), 500);
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

        // Image loading handling
        document.querySelectorAll('.blog-card-img img').forEach(img => {
            // Add loading state
            img.closest('.blog-card').classList.add('loading');

            img.addEventListener('load', function() {
                // Remove loading state when image loads
                this.closest('.blog-card').classList.remove('loading');
            });

            img.addEventListener('error', function() {
                // Handle image error
                this.closest('.blog-card').classList.remove('loading');
                this.closest('.blog-card-img').classList.add('error');
            });
        });

        // Smooth scroll for pagination links
        document.querySelectorAll('.blog-pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                // Don't prevent default to allow pagination to work
                // Just add smooth scroll to top after page loads
                setTimeout(() => {
                    window.scrollTo({
                        top: document.querySelector('.all-posts').offsetTop - 100,
                        behavior: 'smooth'
                    });
                }, 100);
            });
        });

        // Hover effect for blog cards
        document.querySelectorAll('.blog-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 15px 30px rgba(139, 38, 47, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
            });
        });
    });
</script>
@endpush
