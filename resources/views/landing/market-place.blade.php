@extends('landing.common.app')

@section('title', 'Liyamana - Letter Marketplace | Buy & Sell Personalized Letter Templates')
@section('meta_description', 'Discover Liyamana, the premier letter marketplace for buying and selling personalized letter templates. Perfect for business, personal, and creative communication needs.')
@section('meta_keywords', 'Liyamana, letter marketplace, letter templates, buy letter templates, sell letter templates, personalized letters, business letter templates, creative letter designs, online letter platform')

@section('content')
    @include('landing.market-place.hero')

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
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-image {
            overflow: hidden;
            position: relative;
            height: 200px;
            background-color: #f8f9fa;
        }

        .product-image img {
            transition: all 0.5s ease;
            height: 100%;
            width: 100%;
            object-fit: contain;
            padding: 10px;
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

        /* Filter styles */
        .filter-sidebar {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .price-range {
            width: 100%;
            margin: 10px 0;
        }
        
        .search-box {
            border-radius: 25px;
            padding: 12px 20px;
            border: 2px solid #eee;
            width: 100%;
            transition: border-color 0.3s ease;
        }
        
        .search-box:focus {
            border-color: #b4261c;
            outline: none;
        }
        
        .sort-select {
            border-radius: 25px;
            padding: 8px 15px;
            border: 2px solid #eee;
            background: white;
            cursor: pointer;
        }

        .section-title h2 {
            background: linear-gradient(45deg, #b4261c, #8f0606);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
    </style>

    <div class="container py-5">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-md-3">
                <div class="filter-sidebar">
                    <h4 class="mb-4">Filters</h4>
                    
                    <div class="mb-4">
                        <label class="form-label">Search</label>
                        <input type="text" class="search-box" placeholder="Search templates...">
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Price Range</label>
                        <input type="range" class="price-range" min="0" max="1000" step="100">
                        <div class="d-flex justify-content-between">
                            <span>LKR 0</span>
                            <span>LKR 1000</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Categories</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="business">
                            <label class="form-check-label" for="business">Business Letters</label>
                            </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="personal">
                            <label class="form-check-label" for="personal">Personal Letters</label>
                                    </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="creative">
                            <label class="form-check-label" for="creative">Creative Letters</label>
                        </div>
                    </div>
                </div>
                        </div>

            <!-- Products Grid -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>All Templates</h3>
                    <div class="d-flex align-items-center">
                        <label class="me-2">Sort By:</label>
                        <select class="sort-select" onchange="this.form.submit()" name="sort_by">
                            <option value="price_low_to_high">Price: Low to High</option>
                            <option value="price_high_to_low">Price: High to Low</option>
                            <option value="last">Latest First</option>
                            <option value="older">Oldest First</option>
                            <option value="name">Name: A to Z</option>
                        </select>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach($templates as $templeteItem)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{$loop->iteration * 100}}">
                            <div class="product-card">
                                <div class="card h-100">
                                    <div class="product-image">
                                        <img src="{{url('storage/'.$templeteItem->feature_image)}}" class="card-img-top" alt="{{$templeteItem->name}}">
                                        <div class="product-overlay">
                                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="{{$templeteItem->id}}">
                                                <i class="bi bi-eye me-2"></i>Quick View
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            @if($templeteItem->is_trending)
                                                <span class="badge bg-danger">Trending</span>
                                            @endif
                                            @if($templeteItem->discount > 0)
                                                <span class="badge bg-success">-{{$templeteItem->discount}}%</span>
                                            @endif
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                            </div>
                                        </div>
                                        <h5 class="card-title mb-2">{{$templeteItem->name}}</h5>
                                        <p class="card-text text-muted small mb-3">{{Str::limit($templeteItem->description, 80)}}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="price-tag">
                                                <span class="h5 text-danger mb-0">LKR {{number_format($templeteItem->price,2)}}</span>
                                            </div>
                                            <a href="{{ url('market-place/'.$templeteItem->slug) }}" class="btn btn-outline-danger btn-sm">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>

    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Quick View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img id="quickViewImage" src="" alt="" class="img-fluid rounded">
                                    </div>
                                    <div class="carousel-item">
                                        <img id="quickViewImage2" src="" alt="" class="img-fluid rounded">
                                    </div>
                                    <div class="carousel-item">
                                        <img id="quickViewImage3" src="" alt="" class="img-fluid rounded">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <div class="product-thumbnails d-flex gap-2">
                                    <img id="thumbnail1" src="" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                    <img id="thumbnail2" src="" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                    <img id="thumbnail3" src="" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-info">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 id="quickViewTitle" class="mb-0"></h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-half text-warning"></i>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span id="quickViewPrice" class="h5 text-danger"></span>
                                    <span id="quickViewDiscount" class="badge bg-success ms-2"></span>
                                </div>
                                <div class="product-description mb-4">
                                    <h6 class="text-muted mb-2">Description</h6>
                                    <p id="quickViewDescription" class="text-muted"></p>
                                </div>
                                <div class="product-meta mb-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-muted mb-2">Category</h6>
                                            <p id="quickViewCategory" class="mb-0"></p>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-muted mb-2">Seller</h6>
                                            <p id="quickViewSeller" class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a id="quickViewDetailsBtn" href="" class="btn btn-outline-danger flex-grow-1">View Details</a>
                                    <button type="button" class="btn btn-danger flex-grow-1" id="quickViewEditBtn">Quick Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quickViewModal = document.getElementById('quickViewModal');
            if (quickViewModal) {
                quickViewModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const productId = button.getAttribute('data-product-id');
                    
                    // Show loading state
                    const modalBody = quickViewModal.querySelector('.modal-body');
                    modalBody.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div></div>';
                    
                    // Fetch product details using AJAX
                    fetch(`/market-place/${productId}/quick-view`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Restore the original modal content
                        modalBody.innerHTML = `
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img id="quickViewImage" src="${data.feature_image}" alt="${data.name}" class="img-fluid rounded">
                                            </div>
                                            <div class="carousel-item">
                                                <img id="quickViewImage2" src="${data.image2 || data.feature_image}" alt="${data.name}" class="img-fluid rounded">
                                            </div>
                                            <div class="carousel-item">
                                                <img id="quickViewImage3" src="${data.image3 || data.feature_image}" alt="${data.name}" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="product-thumbnails d-flex gap-2">
                                            <img id="thumbnail1" src="${data.feature_image}" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                            <img id="thumbnail2" src="${data.image2 || data.feature_image}" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                            <img id="thumbnail3" src="${data.image3 || data.feature_image}" alt="" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-info">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 id="quickViewTitle" class="mb-0">${data.name}</h4>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span id="quickViewPrice" class="h5 text-danger">LKR ${parseFloat(data.price).toFixed(2)}</span>
                                            ${data.discount > 0 ? `<span id="quickViewDiscount" class="badge bg-success ms-2">-${data.discount}%</span>` : ''}
                                        </div>
                                        <div class="product-description mb-4">
                                            <h6 class="text-muted mb-2">Description</h6>
                                            <p id="quickViewDescription" class="text-muted">${data.description}</p>
                                        </div>
                                        <div class="product-meta mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="text-muted mb-2">Category</h6>
                                                    <p id="quickViewCategory" class="mb-0">${data.category || 'N/A'}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="text-muted mb-2">Seller</h6>
                                                    <p id="quickViewSeller" class="mb-0">${data.seller || 'N/A'}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a id="quickViewDetailsBtn" href="/market-place/${data.slug}" class="btn btn-outline-danger flex-grow-1">View Details</a>
                                            <button type="button" class="btn btn-danger flex-grow-1" id="quickViewEditBtn">Quick Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Reinitialize thumbnail click handlers
                        const thumbnails = document.querySelectorAll('.product-thumbnails img');
                        thumbnails.forEach((thumb, index) => {
                            thumb.addEventListener('click', function() {
                                const carousel = new bootstrap.Carousel(document.getElementById('productCarousel'));
                                carousel.to(index);
                            });
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        modalBody.innerHTML = `
                            <div class="text-center py-5">
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    Failed to load product details. Please try again.
                                </div>
                            </div>
                        `;
                    });
                });
            }
        });
    </script>
    @endpush
@endsection
