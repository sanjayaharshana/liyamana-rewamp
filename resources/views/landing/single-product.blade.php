@extends('landing.common.app')

@section('content')
    <div style="margin-top: 70px"></div>
    @include('landing.single-product.navigration_tab',['activeTab'=>'template-overview'])

    <div class="container py-4">
        <div class="row">
            <!-- Product Gallery Section -->
            <div class="col-md-5">
                <div class="product-gallery">
                    <div class="main-image mb-3">
                        <img src="{{ url('storage/'.$template->feature_image) }}" class="img-fluid" id="mainImage" alt="{{ $template->name }}">
                    </div>
                    <div class="thumbnail-gallery d-flex gap-2">
                        @foreach($template->images as $image)
                            <div class="thumbnail" style="width: 80px; height: 80px; cursor: pointer;">
                                <img src="{{ url('storage/'.$image) }}" class="img-fluid" alt="Thumbnail" onclick="changeMainImage(this.src)">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-md-4">
                <div class="product-details-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1 class="product-title mb-3">{{ $template->name }}</h1>
                    <div class="product-price mb-4">
                        <span class="h2 text-primary" style="color: maroon !important;">LKR {{ number_format($template->price, 2) }}</span>
                    </div>

                    <div class="product-description mb-4">
                        <p class="description-text">{{ $template->description }}</p>
                    </div>

                    <div class="product-actions mb-4">
                        <a style="background: maroon;border-color: maroon" href="{{ url('market-place/'.$template->slug.'/writing-desk/no-order') }}" class="btn btn-primary btn-lg me-2 quick-send-btn">
                            <i class="bi bi-envelope me-2"></i> Quick Send
                        </a>
                        <button class="btn btn-outline-primary btn-lg edit-template-btn">
                            <i class="bi bi-pen me-2"></i> Edit Template
                        </button>
                    </div>

                    <!-- Product Features -->
                    <div class="product-features">
                        <h4 class="mb-3">Template Features</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Professional Design</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Easy to Customize</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>High Quality</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Instant Download</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <div class="sidebar-wrapper">
                    <div class="sidebar-card mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Quick Actions</h5>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary share-btn" data-bs-toggle="modal" data-bs-target="#shareModal" style="color: maroon !important;">
                                        <i class="bi bi-share me-2"></i> Share Template
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        <i class="bi bi-download me-2"></i> Download Sample
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-card mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Template Info</h5>
                                <div class="info-list">
                                    <div class="info-item">
                                        <i class="bi bi-file-earmark-text text-primary"></i>
                                        <span>Format: PDF</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="bi bi-printer text-primary"></i>
                                        <span>Print Ready</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="bi bi-clock text-primary"></i>
                                        <span>Instant Delivery</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-card mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Need Help?</h5>
                                <div class="help-options">
                                    <a href="#" class="help-item">
                                        <i class="bi bi-question-circle"></i>
                                        <span>FAQ</span>
                                    </a>
                                    <a href="#" class="help-item">
                                        <i class="bi bi-chat-dots"></i>
                                        <span>Live Support</span>
                                    </a>
                                    <a href="#" class="help-item">
                                        <i class="bi bi-envelope"></i>
                                        <span>Contact Us</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Secure Payment</h5>
                                <div class="payment-methods">
                                    <img src="{{ asset('images/payment-methods.png') }}" alt="Payment Methods" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs Section -->
        <div class="row mt-4">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab">Specifications</button>
                    </li>
                </ul>

                <div class="tab-content p-4 border border-top-0" id="productTabsContent">
                    <div class="tab-pane fade show active" id="details" role="tabpanel">
                        <h4>Template Details</h4>
                        <p>{{ $template->description }}</p>
                        <!-- Add more detailed content here -->
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        @include('landing.single-product.review_section')
                    </div>
                    <div class="tab-pane fade" id="specs" role="tabpanel">
                        <h4>Technical Specifications</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Letter Type</th>
                                        <td>A4 (Offset 291)</td>
                                    </tr>
                                    <tr>
                                        <th>Printer Type</th>
                                        <td>Inkjet (Canon e202)</td>
                                    </tr>
                                    <!-- Add more specifications -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Related Templates</h3>
                <div class="row">
                    <!-- Add related products here -->
                </div>
            </div>
        </div>
    </div>

    @include('landing.single-product.models.quick-send')

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="shareModalLabel">Share Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="share-options">
                        <div class="share-grid">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="share-item facebook">
                                <i class="bi bi-facebook"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($template->name) }}" target="_blank" class="share-item twitter">
                                <i class="bi bi-twitter-x"></i>
                                <span>X (Twitter)</span>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::url()) }}&title={{ urlencode($template->name) }}" target="_blank" class="share-item linkedin">
                                <i class="bi bi-linkedin"></i>
                                <span>LinkedIn</span>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($template->name . ' ' . Request::url()) }}" target="_blank" class="share-item whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                            <a href="mailto:?subject={{ urlencode($template->name) }}&body={{ urlencode(Request::url()) }}" class="share-item email">
                                <i class="bi bi-envelope"></i>
                                <span>Email</span>
                            </a>
                        </div>
                    </div>

                    <div class="copy-link-section mt-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="shareLink" value="{{ Request::url() }}" readonly>
                            <button class="btn btn-primary" onclick="copyShareLink()">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>
                        </div>
                        <div class="copy-success-message" id="copySuccess">
                            Link copied to clipboard!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-js')
    <script>
        // Image zoom functionality
        const mainImage = document.getElementById('mainImage');
        mainImage.addEventListener('mousemove', function(e) {
            const bounds = this.getBoundingClientRect();
            const x = (e.clientX - bounds.left) / bounds.width * 100;
            const y = (e.clientY - bounds.top) / bounds.height * 100;
            this.style.transformOrigin = `${x}% ${y}%`;
        });

        mainImage.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.5)';
        });

        mainImage.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });

        // Change main image function
        function changeMainImage(src) {
            mainImage.src = src;
        }

        // Password section toggle
        const flexSwitchCheckDefault = document.getElementById('flexSwitchCheckDefault');
        if (flexSwitchCheckDefault) {
            flexSwitchCheckDefault.addEventListener('change', function() {
                document.getElementById('password_section').style.display =
                    this.checked ? 'block' : 'none';
            });
        }

        // Share link copy functionality
        function copyShareLink() {
            const shareLink = document.getElementById('shareLink');
            shareLink.select();
            document.execCommand('copy');

            const copySuccess = document.getElementById('copySuccess');
            copySuccess.style.display = 'block';

            setTimeout(() => {
                copySuccess.style.display = 'none';
            }, 2000);
        }

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                ripple.className = 'ripple';
                this.appendChild(ripple);

                const rect = button.getBoundingClientRect();

                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>

<style>
        .product-gallery {
            position: relative;
        }
        .main-image {
            overflow: hidden;
            border-radius: 8px;
            /* height: 500px; */
            background-color: #f8f9fa;
        }
        .main-image img {
            transition: transform 0.3s ease;
            width: 100%;
            height: 70%;
            object-fit: contain;
        }
        .thumbnail-gallery {
            margin-top: 1rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }
        .thumbnail-gallery img {
            border-radius: 4px;
            object-fit: cover;
            width: 100%;
            height: 100%;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }
        .thumbnail-gallery img:hover {
            border-color: #dc3545;
        }
        .product-title {
            font-size: 2rem;
            font-weight: 600;
        }
        .product-price {
            color: #dc3545;
        }
        .feature-item {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
        }
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            color: #dc3545;
            border-bottom: 2px solid #dc3545;
        }

        /* Sidebar Styles */
        .sidebar-card {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        .sidebar-card .card {
            border: none;
            border-radius: 8px;
        }
        .sidebar-card .card-body {
            padding: 1.25rem;
        }
        .sidebar-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
        }
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
        }
        .info-item i {
            font-size: 1.1rem;
        }
        .help-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .help-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .help-item:hover {
            color: #dc3545;
        }
        .help-item i {
            font-size: 1.1rem;
        }
        .payment-methods img {
            max-width: 100%;
            height: auto;
        }
        .description-text {
            font-size: 13px;
            line-height: 1.6;
            color: #6c757d;
        }

        /* Share Modal Styles */
        .share-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .share-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .share-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .share-item i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .share-item span {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .share-item.facebook {
            background: #1877f2;
        }

        .share-item.twitter {
            background: #000000;
        }

        .share-item.linkedin {
            background: #0077b5;
        }

        .share-item.whatsapp {
            background: #25d366;
        }

        .share-item.email {
            background: #ea4335;
        }

        .copy-link-section {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
        }

        .copy-link-section .input-group {
            margin-bottom: 0.5rem;
        }

        .copy-link-section input {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .copy-link-section .btn {
            background: #dc3545;
            border: none;
            padding: 0.5rem 1rem;
        }

        .copy-link-section .btn:hover {
            background: #c82333;
        }

        .copy-success-message {
            display: none;
            color: #28a745;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 0.5rem;
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            padding: 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: #2c3e50;
        }

        /* Layout Fixes */
        .product-details-wrapper {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .sidebar-wrapper {
            height: 100%;
            position: sticky;
            top: 90px; /* Adjust this value based on your header height */
        }

        .product-features {
            margin-top: auto;
        }

        /* Adjust main image height */
        .main-image {
            height: 400px; /* Reduced from 500px */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-image img {
            max-height: 100%;
            width: auto;
            object-fit: contain;
        }

        /* Ensure consistent spacing */
        .product-actions {
            margin-bottom: 1.5rem;
        }

        .product-features {
            margin-bottom: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar-wrapper {
                position: static;
                margin-top: 2rem;
            }
        }

        /* Button Animations */
        .quick-send-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            transform-origin: center;
            will-change: transform;
        }

        .quick-send-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: 0.5s;
        }

        .quick-send-btn:hover::before {
            left: 100%;
        }

        .quick-send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .quick-send-btn:active {
            transform: translateY(0);
        }

        .quick-send-btn i {
            transition: transform 0.3s ease;
        }

        .quick-send-btn:hover i {
            transform: translateX(3px);
        }

        .edit-template-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            transform-origin: center;
            will-change: transform;
        }

        .edit-template-btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #dc3545;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .edit-template-btn:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .edit-template-btn:hover {
            transform: translateY(-2px);
        }

        .edit-template-btn:active {
            transform: translateY(0);
        }

        .share-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            transform-origin: center;
            will-change: transform;
        }

        .share-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(220, 53, 69, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .share-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
        }

        .share-btn:active {
            transform: translateY(0);
        }

        .share-btn i {
            transition: transform 0.3s ease;
        }

        .share-btn:hover i {
            transform: rotate(180deg);
        }

        /* Add ripple effect to all buttons */
        .btn {
            position: relative;
            overflow: hidden;
            transform-origin: center;
            will-change: transform;
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(100, 100);
                opacity: 0;
            }
        }
    </style>
@endpush
