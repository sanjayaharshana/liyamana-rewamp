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
        padding: 120px 0 60px; /* Reduced padding */
        margin-bottom: 50px; /* Reduced margin */
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
        z-index: 2; /* Increased z-index to ensure content stays above overlay */
        text-align: center;
        color: #fff;
    }
    .blog-hero h1 {
        font-size: 3.5rem; /* Slightly reduced size */
        font-weight: 800;
        margin-bottom: 15px; /* Reduced margin */
        animation: fadeInUp 1s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        background: linear-gradient(45deg, #fff, #f5f5f5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: #f5f5f5; /* Fixed: Use solid color instead of transparent */
        letter-spacing: 1px;
    }
    .blog-hero p {
        font-size: 1.2rem; /* Slightly reduced size */
        max-width: 800px;
        margin: 0 auto 20px; /* Reduced margin */
        animation: fadeInUp 1.2s ease;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
    /* Modern Card Styles */
    .blog-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition:
            opacity 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        position: relative;
        opacity: 0;
        transform: translateY(30px);
        border: none;
        will-change: transform;
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
        transition: color 0.3s ease;
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

    .blog-pagination .pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }

    .blog-pagination .page-item.active .page-link {
        background: linear-gradient(45deg, #8b262f, #c0392b);
        border-color: #8b262f;
        box-shadow: 0 5px 15px rgba(139, 38, 47, 0.2);
        color: #f5f5f5;
    }

    .blog-pagination .page-link {
        color: #8b262f;
        border-radius: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        border: none;
        padding: 10px 20px;
        font-weight: 500;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .blog-pagination .page-link i {
        margin: 0 5px;
    }

    .blog-pagination .page-item.disabled .page-link {
        color: #aaa;
        background-color: #f5f5f5;
        cursor: not-allowed;
    }

    .blog-pagination .page-link:hover:not(.disabled .page-link) {
        background: linear-gradient(45deg, #8b262f, #c0392b);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(139, 38, 47, 0.3);
    }

    /* Responsive pagination */
    @media (max-width: 576px) {
        .blog-pagination .page-link {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .blog-pagination .pagination {
            gap: 5px;
        }
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
            font-size: 3rem;
        }
        .blog-hero {
            padding: 100px 0 50px;
        }
    }
    @media (max-width: 992px) {
        .blog-hero h1 {
            font-size: 2.8rem;
            -webkit-text-fill-color: #ffffff; /* Ensure text is visible on smaller screens */
        }
        .blog-hero p {
            font-size: 1.1rem;
        }
        .blog-card-img {
            height: 220px;
        }
        .blog-hero {
            padding: 90px 0 40px;
        }
    }
    @media (max-width: 768px) {
        .blog-hero {
            padding: 80px 0 40px;
        }
        .blog-hero h1 {
            font-size: 2.5rem;
            -webkit-text-fill-color: #ffffff; /* Ensure text is visible on smaller screens */
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
        .blog-pagination .page-link {
            padding: 8px 15px;
            font-size: 0.9rem;
        }
    }
    @media (max-width: 576px) {
        .blog-hero h1 {
            font-size: 2rem;
            -webkit-text-fill-color: #ffffff; /* Ensure text is visible on smaller screens */
        }
        .blog-hero p {
            font-size: 1rem;
        }
        .blog-card-img {
            height: 200px;
        }
        .blog-hero {
            padding: 70px 0 30px;
        }
        .blog-card-meta {
            flex-direction: column;
            gap: 5px;
        }
        .blog-pagination .page-link {
            padding: 6px 12px;
            margin: 0 2px;
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
    /* Enhanced card animations */
    .blog-card-wrapper {
        perspective: 1000px;
        transform-style: preserve-3d;
    }
    .blog-card {
        transform-origin: center bottom;
        backface-visibility: hidden;
    }
    /* Card slip animation */
    @keyframes cardSlip {
        0% { transform: translateX(-20px) rotate(-2deg); opacity: 0; }
        100% { transform: translateX(0) rotate(0deg); opacity: 1; }
    }
    /* Gradient color transitions */
    .blog-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #8b262f, #c0392b, #e74c3c, #c0392b, #8b262f);
        background-size: 200% 100%;
        animation: gradientShift 3s ease infinite;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .blog-card:hover::after {
        opacity: 1;
    }
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    /* Smooth hover transitions */
    .blog-card {
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1),
                    box-shadow 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .blog-card-img::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-image:
            radial-gradient(circle at 20% 30%, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 3%),
            radial-gradient(circle at 80% 20%, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 3%),
            radial-gradient(circle at 40% 70%, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 3%),
            radial-gradient(circle at 70% 60%, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 3%);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
        z-index: 2;
    }

    /* Blog Post Modal Styles */
    .blog-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .blog-modal.active {
        display: block;
        opacity: 1;
    }

    .blog-modal-content {
        position: relative;
        background: #fff;
        width: 90%;
        max-width: 900px;
        margin: 50px auto;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
    }

    .blog-modal.active .blog-modal-content {
        transform: translateY(0);
        opacity: 1;
    }

    .blog-modal-header {
        position: relative;
        height: 300px;
        overflow: hidden;
    }

    .blog-modal-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-modal-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background: linear-gradient(to top, rgba(255,255,255,1), rgba(255,255,255,0));
    }

    .blog-modal-body {
        padding: 30px 40px 40px;
    }

    .blog-modal-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #333;
        line-height: 1.3;
    }

    .blog-modal-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
        color: #666;
        font-size: 0.95rem;
    }

    .blog-modal-meta span {
        display: flex;
        align-items: center;
    }

    .blog-modal-meta i {
        margin-right: 8px;
        color: #8b262f;
    }

    .blog-modal-categories {
        margin-bottom: 25px;
    }

    .blog-modal-content-text {
        line-height: 1.8;
        color: #444;
        font-size: 1.1rem;
    }

    .blog-modal-content-text p {
        margin-bottom: 20px;
    }

    .blog-modal-content-text img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }

    .blog-modal-content-text h2,
    .blog-modal-content-text h3 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #333;
    }

    .blog-modal-content-text ul,
    .blog-modal-content-text ol {
        margin-bottom: 20px;
        padding-left: 25px;
    }

    .blog-modal-content-text li {
        margin-bottom: 10px;
    }

    .blog-modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .blog-modal-close:hover {
        background: #8b262f;
        transform: rotate(90deg);
    }

    .blog-modal-close:hover i {
        color: #fff;
    }

    .blog-modal-close i {
        font-size: 1.5rem;
        color: #8b262f;
        transition: color 0.3s ease;
    }

    .blog-modal-loading {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
    }

    .blog-modal-loading-spinner {
        width: 50px;
        height: 50px;
        border: 5px solid rgba(139, 38, 47, 0.2);
        border-top: 5px solid #8b262f;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .blog-modal-footer {
        padding: 20px 40px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .blog-modal-share {
        display: flex;
        gap: 15px;
    }

    .blog-modal-share a {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        transition: all 0.3s ease;
    }

    .blog-modal-share a:hover {
        background: #8b262f;
        color: #fff;
        transform: translateY(-3px);
    }

    .blog-modal-full-link {
        display: inline-flex;
        align-items: center;
        color: #8b262f;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .blog-modal-full-link i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .blog-modal-full-link:hover {
        color: #c0392b;
    }

    .blog-modal-full-link:hover i {
        transform: translateX(5px);
    }

    /* Prevent body scrolling when modal is open */
    body.modal-open {
        overflow: hidden;
    }

    /* Responsive styles for modal */
    @media (max-width: 992px) {
        .blog-modal-content {
            width: 95%;
            margin: 30px auto;
        }

        .blog-modal-header {
            height: 250px;
        }

        .blog-modal-title {
            font-size: 1.8rem;
        }

        .blog-modal-body {
            padding: 25px 30px 35px;
        }
    }

    @media (max-width: 768px) {
        .blog-modal-header {
            height: 200px;
        }

        .blog-modal-title {
            font-size: 1.6rem;
        }

        .blog-modal-content-text {
            font-size: 1rem;
        }

        .blog-modal-body {
            padding: 20px 25px 30px;
        }

        .blog-modal-meta {
            flex-direction: column;
            gap: 8px;
        }

        .blog-modal-footer {
            padding: 15px 25px;
            flex-direction: column;
            gap: 15px;
        }
    }

    @media (max-width: 576px) {
        .blog-modal-content {
            margin: 15px auto;
        }

        .blog-modal-header {
            height: 180px;
        }

        .blog-modal-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .blog-modal-body {
            padding: 15px 20px 25px;
        }

        .blog-modal-close {
            top: 10px;
            right: 10px;
            width: 35px;
            height: 35px;
        }
    }

</style>
@endpush

@section('content')
<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
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
        @endif
        <!-- Pagination -->
        @if($blogPosts->hasPages())
            <div class="blog-pagination">
                <nav aria-label="Blog pagination">
                    <ul class="pagination">
                        @if($blogPosts->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="bi bi-chevron-left"></i> Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogPosts->previousPageUrl() }}" rel="prev">
                                    <i class="bi bi-chevron-left"></i> Previous
                                </a>
                            </li>
                        @endif

                        @foreach($blogPosts->getUrlRange(1, $blogPosts->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $blogPosts->currentPage() ? 'active' : '' }} d-none d-md-block">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if($blogPosts->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogPosts->nextPageUrl() }}" rel="next">
                                    Next <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next <i class="bi bi-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif

    </div>
</section>

@endsection

@section('footer', true)

@push('footer-js')


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load GSAP library dynamically if not already loaded
        if (typeof gsap === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js';
            script.onload = initAnimations;
            document.head.appendChild(script);
            // Load ScrollTrigger plugin
            const scrollTriggerScript = document.createElement('script');
            scrollTriggerScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js';
            document.head.appendChild(scrollTriggerScript);
        } else {
            initAnimations();
        }

        function initAnimations() {
            // GSAP animations for blog cards
            if (typeof gsap !== 'undefined') {
                // Register ScrollTrigger plugin if available
                if (gsap.registerPlugin && typeof ScrollTrigger !== 'undefined') {
                    gsap.registerPlugin(ScrollTrigger);
                }

                // Fix: Ensure hero title is visible by using direct DOM manipulation
                const heroTitle = document.querySelector('.blog-hero-content h1');
                if (heroTitle) {
                    heroTitle.style.opacity = '1';
                    heroTitle.style.visibility = 'visible';
                    heroTitle.style.color = '#ffffff';
                }

                // Hero section animation - modified to prevent disappearing
                gsap.fromTo('.blog-hero-content h1',
                    {y: 50, opacity: 0.5},
                    {y: 0, opacity: 1, duration: 1, ease: 'power3.out', clearProps: "all"}
                );

                gsap.fromTo('.blog-hero-content p',
                    {y: 30, opacity: 0},
                    {y: 0, opacity: 1, duration: 1, delay: 0.3, ease: 'power3.out', clearProps: "all"}
                );

                // Section titles animation
                gsap.utils.toArray('.featured-title').forEach(title => {
                    gsap.fromTo(title,
                        {y: 30, opacity: 0},
                        {
                            scrollTrigger: {
                                trigger: title,
                                start: 'top 80%',
                            },
                            y: 0,
                            opacity: 1,
                            duration: 0.8,
                            ease: 'power2.out',
                            clearProps: "all"
                        }
                    );
                });

                // Blog cards staggered animation
                const blogCards = gsap.utils.toArray('.blog-card');
                blogCards.forEach((card, index) => {
                    gsap.set(card, {
                        opacity: 0,
                        y: 30,
                        rotateX: 5,
                        transformOrigin: 'center bottom'
                    });

                    ScrollTrigger.create({
                        trigger: card,
                        start: 'top 85%',
                        onEnter: () => {
                            gsap.to(card, {
                                opacity: 1,
                                y: 0,
                                rotateX: 0,
                                duration: 0.8,
                                delay: index % 3 * 0.1,
                                ease: 'power3.out',
                                onComplete: () => {
                                    card.classList.remove('loading');
                                }
                            });
                        }
                    });
                });
            }
        }

        // Intersection Observer for animation on scroll (fallback if GSAP fails)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // For blog cards, add staggered animation
                    if (entry.target.classList.contains('blog-card')) {
                        const index = Array.from(document.querySelectorAll('.blog-card')).indexOf(entry.target);
                        entry.target.style.animationDelay = (index * 0.1) + 's';
                        entry.target.style.animationName = 'cardSlip';
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
                gsap ? gsap.to(img, {opacity: 1, duration: 0.5, ease: 'power2.out'}) :
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
                if (typeof gsap !== 'undefined') {
                    // Cancel any ongoing animations
                    gsap.killTweensOf(this);

                    gsap.to(this, {
                        y: -10,
                        boxShadow: '0 15px 30px rgba(139, 38, 47, 0.2)',
                        duration: 0.4,
                        ease: 'power2.out'
                    });

                    // Animate the read more link
                    const link = this.querySelector('.blog-card-link i');
                    if (link) {
                        gsap.to(link, {
                            x: 8,
                            duration: 0.3,
                            ease: 'power1.out'
                        });
                    }

                    // Subtle card tilt effect
                    gsap.to(this, {
                        rotationY: 2,
                        rotationX: -2,
                        duration: 0.4,
                        ease: 'power1.out'
                    });
                } else {
                    this.style.transform = 'translateY(-10px)';
                    this.style.boxShadow = '0 15px 30px rgba(139, 38, 47, 0.2)';

                    // Animate the read more link
                    const link = this.querySelector('.blog-card-link i');
                    if (link) {
                        link.style.transform = 'translateX(8px)';
                    }
                }
            });

            card.addEventListener('mouseleave', function() {
                if (typeof gsap !== 'undefined') {
                    // Cancel any ongoing animations
                    gsap.killTweensOf(this);

                    gsap.to(this, {
                        y: 0,
                        boxShadow: '0 5px 15px rgba(0, 0, 0, 0.1)',
                        rotationY: 0,
                        rotationX: 0,
                        duration: 0.4,
                        ease: 'power2.out'
                    });

                    // Reset the read more link
                    const link = this.querySelector('.blog-card-link i');
                    if (link) {
                        gsap.to(link, {
                            x: 0,
                            duration: 0.3,
                            ease: 'power1.out'
                        });
                    }
                } else {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';

                    // Reset the read more link
                    const link = this.querySelector('.blog-card-link i');
                    if (link) {
                        link.style.transform = 'translateX(0)';
                    }
                }
            });
        });


        // Add parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrollPosition = window.pageYOffset;
            const heroSection = document.querySelector('.blog-hero');
            if (heroSection) {
                heroSection.style.backgroundPositionY = (scrollPosition * 0.3) + 'px';
            }
        });

        // Add animation to category tags
        document.querySelectorAll('.blog-category').forEach(tag => {
            tag.addEventListener('mouseenter', function() {
                if (typeof gsap !== 'undefined') {
                    gsap.to(this, {
                        y: -3,
                        scale: 1.05,
                        backgroundColor: '#8b262f',
                        color: '#fff',
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                } else {
                    this.style.transform = 'translateY(-3px) scale(1.05)';
                    this.style.backgroundColor = '#8b262f';
                    this.style.color = '#fff';
                }
            });
            tag.addEventListener('mouseleave', function() {
                if (typeof gsap !== 'undefined') {
                    gsap.to(this, {
                        y: 0,
                        scale: 1,
                        backgroundColor: 'rgba(139, 38, 47, 0.1)',
                        color: '#8b262f',
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                } else {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.backgroundColor = 'rgba(139, 38, 47, 0.1)';
                    this.style.color = '#8b262f';
                }
            });
        });
    });
</script>
@endpush


