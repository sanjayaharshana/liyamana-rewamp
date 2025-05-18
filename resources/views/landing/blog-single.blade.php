@extends('landing.common.app')
@section('title', $post->title . ' - Liyamana Online Platform')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($post->content), 160))
@section('meta_keywords', is_array($post->tags) ? implode(', ', $post->tags) : $post->tags)
@push('head-css')
<style>
    /* Blog Single Page Styles */
    .blog-single-hero {
        background: url("{{ asset('landing_pages/assets/img/back-bg.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 120px 0 60px;
        position: relative;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    .blog-single-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(139, 38, 47, 0.9), rgba(139, 38, 47, 0.7));
        z-index: 1;
    }
    .blog-single-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
    }
    .blog-single-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 15px;
        animation: fadeInUp 1s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        color: #fff;
    }

    /* Meta Info Section - Moved below hero */
    .blog-meta-section {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        margin-top: -30px;
        position: relative;
        z-index: 10;
        padding: 25px 30px;
        margin-bottom: 40px;
        border-top: 4px solid #8b262f;
        transform: translateY(0);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-meta-section:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .blog-single-meta {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        margin-bottom: 20px;
        font-size: 1rem;
        border-bottom: 1px dashed rgba(0,0,0,0.1);
        padding-bottom: 20px;
    }

    .blog-single-meta span {
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        padding: 8px 15px;
        border-radius: 30px;
        background: #f8f9fa;
    }

    .blog-single-meta span:hover {
        background: #f0f0f0;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .blog-single-meta i {
        margin-right: 8px;
        color: #8b262f;
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .blog-single-meta span:hover i {
        transform: scale(1.2);
    }

    .blog-single-categories {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .blog-category {
        display: inline-block;
        padding: 8px 18px;
        background: #f8f9fa;
        color: #8b262f;
        border-radius: 30px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        font-weight: 500;
        border: 1px solid rgba(139, 38, 47, 0.1);
        position: relative;
        overflow: hidden;
    }

    .blog-category::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: rgba(139, 38, 47, 0.1);
        transition: width 0.3s ease;
        z-index: 0;
    }

    .blog-category:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border-color: rgba(139, 38, 47, 0.3);
    }

    .blog-category:hover::before {
        width: 100%;
    }

    .blog-category span {
        position: relative;
        z-index: 1;
    }

    /* Animation for meta section */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .meta-animate {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        color:#d32f2f;
    }

    .meta-animate:nth-child(1) {
        animation-delay: 0.1s;
    }

    .meta-animate:nth-child(2) {
        animation-delay: 0.2s;
    }

    .meta-animate:nth-child(3) {
        animation-delay: 0.3s;
    }

    .category-animate {
        animation: slideInRight 0.5s ease forwards;
        opacity: 0;
    }

    .category-animate:nth-child(1) {
        animation-delay: 0.3s;
    }

    .category-animate:nth-child(2) {
        animation-delay: 0.4s;
    }

    .category-animate:nth-child(3) {
        animation-delay: 0.5s;
    }

    .category-animate:nth-child(4) {
        animation-delay: 0.6s;
    }

    .category-animate:nth-child(5) {
        animation-delay: 0.7s;
    }

    /* Blog Single Page Styles */
    .blog-featured-image {
        margin-bottom: 40px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .blog-featured-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .blog-featured-image:hover img {
        transform: scale(1.02);
    }
    .blog-content {
        line-height: 1.8;
        color: #444;
        font-size: 1.1rem;
        background: linear-gradient(145deg, #ffffff, #f5f5f5);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(139, 38, 47, 0.1);
        padding: 30px;
    }
    .blog-content p {
        margin-bottom: 20px;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }
    .blog-content h2,
    .blog-content h3 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #333;
    }
    .blog-content ul,
    .blog-content ol {
        margin-bottom: 20px;
        padding-left: 25px;
    }
    .blog-content li {
        margin-bottom: 10px;
    }
    .blog-content blockquote {
        border-left: 4px solid #8b262f;
        padding: 15px 20px;
        background: #f9f9f9;
        margin: 20px 0;
        font-style: italic;
        color: #555;
    }
    /* Engagement Section - Like/Dislike */
    .blog-engagement {
        display: flex;
        align-items: center;
        margin: 40px 0;
        border-radius: 15px;
    }
    .blog-reactions {
        display: flex;
        gap: 20px;
    }
    .reaction-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        border: 2px solid transparent;
        border-radius: 30px;
        background: #fff;
        color: #666;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
        user-select: none;
    }
    .reaction-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    .reaction-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.3s ease, height 0.3s ease;
    }
    .reaction-btn:active::after {
        width: 200%;
        height: 200%;
    }
    .reaction-btn:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .reaction-btn.like {
        color: #4CAF50;
    }
    .reaction-btn.dislike {
        color: #f44336;
    }
    .reaction-btn.like:hover:not(:disabled) {
        background: #e8f5e9;
        border-color: #4CAF50;
    }
    .reaction-btn.dislike:hover:not(:disabled) {
        background: #ffebee;
        border-color: #f44336;
    }
    .reaction-btn.active.like {
        background: #e8f5e9;
        color: #4CAF50;
        border-color: #4CAF50;
    }
    .reaction-btn.active.dislike {
        background: #ffebee;
        color: #f44336;
        border-color: #f44336;
    }
    .reaction-btn i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }
    .reaction-btn:hover:not(:disabled) i {
        transform: scale(1.2);
    }
    .reaction-btn.active i {
        animation: pulse 0.3s ease;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }
    .reaction-count {
        font-weight: 600;
        min-width: 30px;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .reaction-btn.active .reaction-count {
        animation: countPop 0.3s ease;
    }
    @keyframes countPop {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
    /* Share Section */
    .blog-share {
        margin: 40px 0;
        padding: 30px;
        background: linear-gradient(145deg, #ffffff, #f5f5f5);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(139, 38, 47, 0.1);
    }
    .blog-share h3 {
        font-size: 1.4rem;
        margin-bottom: 20px;
        color: #333;
        position: relative;
        padding-bottom: 15px;
    }
    .blog-share h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #8b262f, #d32f2f);
        border-radius: 3px;
    }
    .blog-share-buttons {
        display: flex;
        gap: 15px;
    }
    .blog-share-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #fff;
        color: #666;
        font-size: 1.2rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 2px solid transparent;
    }
    .blog-share-button:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .blog-share-button i {
        transition: transform 0.3s ease;
    }
    .blog-share-button:hover i {
        transform: scale(1.2);
    }
       /* Social Media Specific Colors */
    .blog-share-button:nth-child(1):hover {
        background: #1877f2;
        color: #fff;
        border-color: #1877f2;
    }
    .blog-share-button:nth-child(2):hover {
        background: #1da1f2;
        color: #fff;
        border-color: #1da1f2;
    }
    .blog-share-button:nth-child(3):hover {
        background: #0077b5;
        color: #fff;
        border-color: #0077b5;
    }
    .blog-share-button:nth-child(4):hover {
        background: #25d366;
        color: #fff;
        border-color: #25d366;
    }
    /* Comments Section */
    .blog-comments {
        margin-top: 60px;
    }
    .blog-comments h3 {
        font-size: 1.5rem;
        margin-bottom: 30px;
        color: #333;
        position: relative;
        padding-bottom: 10px;
    }
    .blog-comments h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #8b262f;
    }
    .comment-form {
        margin-bottom: 40px;
        background: #f9f9f9;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    .comment-form textarea {
        width: 100%;
        min-height: 120px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        resize: vertical;
        transition: border-color 0.3s ease;
    }
    .comment-form textarea:focus {
        border-color: #8b262f;
        outline: none;
    }
    .comment-form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }
    .comment-form input {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: border-color 0.3s ease;
    }
    .comment-form input:focus {
        border-color: #8b262f;
        outline: none;
    }
    .comment-submit {
        padding: 12px 25px;
        background: #8b262f;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .comment-submit:hover {
        background: #6d1e25;
        transform: translateY(-2px);
    }
    .comments-list {
        margin-top: 30px;
    }
    .comment-item {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    .comment-item:hover {
        transform: translateY(-3px);
    }
    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .comment-author {
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .comment-author img {
        border: 2px solid #8b262f;
    }
    .comment-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
    }
    .comment-date {
        color: #888;
        font-size: 0.9rem;
    }
    .comment-content {
        line-height: 1.6;
        color: #555;
    }
    .comment-menu {
        position: relative;
    }
    .comment-menu-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        color: #666;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    .comment-menu-btn:hover {
        color: #333;
    }
    .comment-menu-dropdown {
        position: absolute;
        right: 0;
        top: 100%;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 8px 0;
        min-width: 120px;
        display: none;
        z-index: 1000;
    }
    .comment-menu-dropdown.show {
        display: block;
        animation: fadeIn 0.2s ease;
    }
    .comment-menu-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .comment-menu-item:hover {
        background: #f5f5f5;
    }
    .comment-menu-item.edit {
        color: #1976d2;
    }
    .comment-menu-item.delete {
        color: #d32f2f;
    }
    .comment-menu-item i {
        font-size: 1rem;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .comment-edit-form {
        margin-top: 15px;
        display: none;
        animation: slideDown 0.3s ease;
    }
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    /* Related Posts */
    .related-posts {
        margin-top: 60px;
        padding-top: 40px;
        border-top: 1px solid #eee;
    }
    .related-posts h3 {
        font-size: 1.5rem;
        margin-bottom: 30px;
        color: #333;
        position: relative;
        padding-bottom: 10px;
    }
    .related-posts h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #8b262f;
    }
    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    .related-post-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    .related-post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .related-post-image {
        height: 180px;
        overflow: hidden;
    }
    .related-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .related-post-card:hover .related-post-image img {
        transform: scale(1.05);
    }
    .related-post-content {
        padding: 20px;
    }
    .related-post-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .related-post-meta {
        display: flex;
        justify-content: space-between;
        color: #888;
        font-size: 0.85rem;
        margin-top: 15px;
    }
    @media (max-width: 768px) {
        .blog-single-hero h1 {
            font-size: 2rem;
        }
        .blog-single-meta {
            gap: 10px;
            font-size: 0.9rem;
        }
        .comment-form-row {
            flex-direction: column;
            gap: 10px;
        }
        .related-posts-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- Blog Single Hero Section -->
<section class="blog-single-hero">
    <div class="container">
        <div class="blog-single-hero-content">
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
</section>

<!-- Blog Meta Section - Moved below hero -->
<section class="blog-meta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-single-meta">
                    <span class="meta-animate"><i class="fas fa-user"></i> {{ $author ? $author->username : 'Anonymous' }}</span>
                    <span class="meta-animate"><i class="fas fa-calendar-alt"></i> {{ $post->created_at->format('M d, Y') }}</span>
                    <span class="meta-animate"><i class="fas fa-eye"></i> {{ $post->views }} Views</span>
                </div>
                <div class="blog-single-categories">
                    @foreach($post->category_ids as $categoryId)
                        @if(isset($categories[$categoryId]))
                            <span class="blog-category category-animate">
                                <span>{{ $categories[$categoryId] }}</span>
                            </span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content Section -->
<section class="blog-single-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                @if($featuredImageUrl)
                <div class="blog-featured-image">
                    <img src="{{ $featuredImageUrl }}" alt="{{ $post->title }}">
                </div>
                @endif
                <!-- Engagement Section -->
                <div class="blog-engagement">
                    <div class="blog-reactions">
                        <button type="button" class="reaction-btn like" data-post-id="{{ $post->id }}">
                            <i class="fas fa-thumbs-up"></i>
                            <span class="reaction-count like-count">{{ $post->likes ?? 0 }}</span>
                        </button>
                        <button type="button" class="reaction-btn dislike" data-post-id="{{ $post->id }}">
                            <i class="fas fa-thumbs-down"></i>
                            <span class="reaction-count dislike-count">{{ $post->dislikes ?? 0 }}</span>
                        </button>
                    </div>
                </div>
                <div class="blog-content">
                    {!! $post->content !!}
                </div>

                <!-- Tags Section -->
                @if(!empty($post->tags) && is_array($post->tags))
                <div class="blog-tags mt-4">
                    @foreach($post->tags as $tag)
                        <span class="badge bg-light text-dark me-2 mb-2 p-2">#{{ $tag }}</span>
                    @endforeach
                </div>
                @endif


                <!-- Share Section -->
                <div class="blog-share">
                    <h3>Share This Post</h3>
                    <div class="blog-share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="blog-share-button">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="blog-share-button">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" target="_blank" class="blog-share-button">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" class="blog-share-button">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="blog-comments">
                    <h3>Comments ({{ count($comments) }})</h3>
                    <form action="{{ route('blog.comment.store') }}" method="POST" class="comment-form">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Write your comment here..." required></textarea>
                        <div class="comment-form-row">
                            <input type="text" name="name" placeholder="Your Name" required>
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <button type="submit" class="comment-submit">Post Comment</button>
                    </form>

                    <div class="comments-list">
                        @forelse($comments as $comment)
                        <div class="comment-item" data-comment-id="{{ $comment->id }}">
                            <div class="comment-header">
                                <div class="comment-author">
                                    <img src="{{ asset('landing_pages/assets/img/services.jpg') }}" alt="User Avatar" class="rounded-circle" width="40" height="40">
                                    {{ $comment->name }}
                                </div>
                                                                <div class="comment-actions">
                                    <div class="comment-date">{{ $comment->created_at->format('M d, Y') }}</div>
                                    @if($comment->session_id === session('visitor_id'))
                                    <div class="comment-menu">
                                        <button class="comment-menu-btn" onclick="toggleCommentMenu({{ $comment->id }})" title="More options">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="comment-menu-dropdown" id="comment-menu-{{ $comment->id }}">
                                            <div class="comment-menu-item edit" onclick="editComment({{ $comment->id }})">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </div>
                                            <div class="comment-menu-item delete" onclick="deleteComment({{ $comment->id }})">
                                                <i class="fas fa-trash"></i>
                                                <span>Delete</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="comment-content" id="comment-content-{{ $comment->id }}">
                                {{ $comment->content }}
                            </div>
                            <div class="comment-edit-form" id="comment-edit-form-{{ $comment->id }}">
                                <textarea class="edit-comment-textarea">{{ $comment->content }}</textarea>
                                <div class="edit-comment-buttons">
                                    <button class="save-edit-btn" onclick="saveComment({{ $comment->id }})">Save</button>
                                    <button class="cancel-edit-btn" onclick="cancelEdit({{ $comment->id }})">Cancel</button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <p>No comments yet. Be the first to comment!</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Related Posts Section -->
                @if(count($relatedPosts) > 0)
                <div class="related-posts">
                    <h3>Related Posts</h3>
                    <div class="related-posts-grid">
                        @foreach($relatedPosts as $relatedPost)
                        <a href="{{ route('landing.blog.show', $relatedPost->slug) }}" class="related-post-card">
                            <div class="related-post-image">
                                <img src="{{ $relatedPost->featured_image_url ?? asset('landing_pages/assets/img/blog-placeholder.jpg') }}" alt="{{ $relatedPost->title }}">
                            </div>
                            <div class="related-post-content">
                                <h4 class="related-post-title">{{ $relatedPost->title }}</h4>
                                <div class="related-post-meta">
                                    <span><i class="fas fa-calendar-alt"></i> {{ $relatedPost->created_at->format('M d, Y') }}</span>
                                    <span><i class="fas fa-eye"></i> {{ number_format($relatedPost->views ?? 0) }}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('footer-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Like/Dislike functionality
    const likeBtn = document.querySelector('.reaction-btn.like');
    const dislikeBtn = document.querySelector('.reaction-btn.dislike');
    const likeCount = document.querySelector('.like-count');
    const dislikeCount = document.querySelector('.dislike-count');
    if (!likeBtn || !dislikeBtn) {
        console.error('Reaction buttons not found');
        return;
    }

    function updateReactionCounts(response) {
        if (likeCount) likeCount.textContent = response.likes;
        if (dislikeCount) dislikeCount.textContent = response.dislikes;
    }

    function handleReaction(button, type) {
        if (!button || !button.dataset.postId) {
            console.error('Invalid button or missing post ID');
            return;
        }
        const postId = button.dataset.postId;
        const isActive = button.classList.contains('active');
        const endpoint = `/blog/reaction/${postId}/${type}`;
        console.log('Handling reaction:', { postId, type, endpoint });

        // Disable both buttons during the request
        if (likeBtn) likeBtn.disabled = true;
        if (dislikeBtn) dislikeBtn.disabled = true;

        // Show loading state
        button.classList.add('loading');

        // Get CSRF token from meta tag
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            console.error('CSRF token not found');
            showToast('Security token missing', 'error');
            return;
        }

        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                updateReactionCounts(data);

                // Update button states
                if (likeBtn) likeBtn.classList.remove('active');
                if (dislikeBtn) dislikeBtn.classList.remove('active');

                if (data.user_reaction) {
                    if (data.user_reaction === 'like' && likeBtn) {
                        likeBtn.classList.add('active');
                    } else if (data.user_reaction === 'dislike' && dislikeBtn) {
                        dislikeBtn.classList.add('active');
                    }
                }
                // Show success message
                showToast(
                    isActive ?
                    `Removed ${type} reaction` :
                    `Added ${type} reaction`,
                    'success'
                );
            } else {
                showToast(data.message || 'Error processing reaction', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error processing reaction', 'error');
        })
        .finally(() => {
            // Re-enable buttons after request completes
            if (likeBtn) likeBtn.disabled = false;
            if (dislikeBtn) dislikeBtn.disabled = false;
            button.classList.remove('loading');
        });
    }

    // Add loading state styles
    const style = document.createElement('style');
    style.textContent = `
        .reaction-btn.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .reaction-btn.loading i {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);

    // Initialize reaction buttons
    if (likeBtn && dislikeBtn) {
        console.log('Initializing reaction buttons');

        likeBtn.addEventListener('click', () => {
            console.log('Like button clicked');
            handleReaction(likeBtn, 'like');
        });

        dislikeBtn.addEventListener('click', () => {
            console.log('Dislike button clicked');
            handleReaction(dislikeBtn, 'dislike');
        });

        // Check initial reaction state
        const postId = likeBtn.dataset.postId;
        console.log('Checking initial reaction state for post:', postId);

        // Get CSRF token from meta tag
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            console.error('CSRF token not found');
            return;
        }

        fetch(`/blog/reaction/${postId}/get`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
            console.log('Initial reaction state:', data);
            if (data.success && data.user_reaction) {
                if (data.user_reaction === 'like' && likeBtn) {
                    likeBtn.classList.add('active');
                } else if (data.user_reaction === 'dislike' && dislikeBtn) {
                    dislikeBtn.classList.add('active');
                }
            }
        })
        .catch(error => console.error('Error fetching user reaction:', error));
    }

    // Show toast notifications
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.textContent = message;

        Object.assign(toast.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '10px 20px',
            borderRadius: '4px',
            zIndex: '9999',
            backgroundColor: type === 'success' ? '#4CAF50' : '#f44336',
            color: 'white',
            boxShadow: '0 2px 5px rgba(0,0,0,0.2)'
        });

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.5s ease';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 500);
        }, 3000);
    }

    // Comment functionality
    window.toggleCommentMenu = function(commentId) {
        const menu = document.getElementById(`comment-menu-${commentId}`);
        const isVisible = menu.classList.contains('show');

        // Close all other menus first
        document.querySelectorAll('.comment-menu-dropdown.show').forEach(m => {
            if (m.id !== `comment-menu-${commentId}`) {
                m.classList.remove('show');
            }
        });

        // Toggle current menu
        menu.classList.toggle('show');

        // Close menu when clicking outside
        if (!isVisible) {
            document.addEventListener('click', function closeMenu(e) {
                if (!menu.contains(e.target) && !e.target.closest('.comment-menu-btn')) {
                    menu.classList.remove('show');
                    document.removeEventListener('click', closeMenu);
                }
            });
        }
    }

    window.editComment = function(commentId) {
        const contentDiv = document.getElementById(`comment-content-${commentId}`);
        const editForm = document.getElementById(`comment-edit-form-${commentId}`);
        const menu = document.getElementById(`comment-menu-${commentId}`);

        contentDiv.style.display = 'none';
        editForm.style.display = 'block';
        menu.classList.remove('show');

        // Focus the textarea
        const textarea = editForm.querySelector('textarea');
        textarea.focus();
        textarea.setSelectionRange(textarea.value.length, textarea.value.length);
    }

    window.cancelEdit = function(commentId) {
        const contentDiv = document.getElementById(`comment-content-${commentId}`);
        const editForm = document.getElementById(`comment-edit-form-${commentId}`);
        const menu = document.getElementById(`comment-menu-${commentId}`);

        contentDiv.style.display = 'block';
        editForm.style.display = 'none';
        menu.classList.remove('show');
    }

    window.saveComment = function(commentId) {
        const contentDiv = document.getElementById(`comment-content-${commentId}`);
        const editForm = document.getElementById(`comment-edit-form-${commentId}`);
        const textarea = editForm.querySelector('textarea');
        const newContent = textarea.value.trim();

        if (!newContent) {
            showToast('Comment cannot be empty', 'error');
            return;
        }

        // Get CSRF token
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            console.error('CSRF token not found');
            showToast('Security token missing', 'error');
            return;
        }

        fetch(`/blog/comment/${commentId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ content: newContent }),
            credentials: 'same-origin'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                contentDiv.textContent = newContent;
                contentDiv.style.display = 'block';
                editForm.style.display = 'none';
                showToast('Comment updated successfully', 'success');
            } else {
                showToast(data.message || 'Error updating comment', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error updating comment', 'error');
        });
    }

    window.deleteComment = function(commentId) {
        if (!confirm('Are you sure you want to delete this comment?')) {
            return;
        }

        // Get CSRF token
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            console.error('CSRF token not found');
            showToast('Security token missing', 'error');
            return;
        }

        fetch(`/blog/comment/${commentId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
                .then(data => {
            if (data.success) {
                const commentItem = document.querySelector(`.comment-item[data-comment-id="${commentId}"]`);
                if (commentItem) {
                    commentItem.style.opacity = '0';
                    commentItem.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    commentItem.style.transform = 'translateY(-10px)';

                    setTimeout(() => {
                        commentItem.remove();

                        // Update comment count
                        const commentsHeading = document.querySelector('.blog-comments h3');
                        if (commentsHeading) {
                            const currentCount = parseInt(commentsHeading.textContent.match(/\d+/)[0]);
                            const newCount = currentCount - 1;
                            commentsHeading.textContent = `Comments (${newCount})`;
                        }

                        // Show empty message if no comments left
                        const commentsList = document.querySelector('.comments-list');
                        if (commentsList && commentsList.children.length === 0) {
                            const emptyMessage = document.createElement('div');
                            emptyMessage.className = 'text-center py-4';
                            emptyMessage.innerHTML = '<p>No comments yet. Be the first to comment!</p>';
                            commentsList.appendChild(emptyMessage);
                        }
                    }, 300);
                }
                showToast('Comment deleted successfully', 'success');
            } else {
                showToast(data.message || 'Error deleting comment', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error deleting comment', 'error');
        });
    }

    // Animate elements on scroll
    const animateElements = document.querySelectorAll('.meta-animate, .category-animate');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    animateElements.forEach(el => {
        observer.observe(el);
    });

    // Add animation delay to meta items
    document.querySelectorAll('.meta-animate').forEach((el, index) => {
        el.style.transitionDelay = `${index * 0.1}s`;
    });

    // Add animation delay to category items
    document.querySelectorAll('.category-animate').forEach((el, index) => {
        el.style.transitionDelay = `${index * 0.1}s`;
    });

    // Track post view
    const postId = document.querySelector('.reaction-btn')?.dataset.postId;
    if (postId) {
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (token) {
            fetch(`/blog/view/${postId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .catch(error => console.error('Error tracking view:', error));
        }
    }
});
</script>
@endpush



