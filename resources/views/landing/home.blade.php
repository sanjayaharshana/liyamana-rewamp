@extends('landing.common.app')

@section('title', getSetting('site_name').' Online Platform - World leading online platform for custom letters')

@section('meta_description', 'Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide. Personalize your communication and revive the magic of handwritten messages.')
@section('meta_keywords', 'Liyamana, send letters online, heartfelt letters, pen pals, personalized communication, write letters, commercial letters, connect with friends')

@section('content')
    <!-- Hero Section -->
    @include('landing.home.sections.hero')

    <!-- Categories Section -->
    @include('landing.home.sections.categories')

    <!-- Featured Products Section -->
    @include('landing.home.sections.feature_products')

    <!-- About Section -->
    @include('landing.home.sections.about')

    <!-- Services Section -->
    @include('landing.home.sections.services')

    <!-- Call to Action -->
    @include('landing.home.sections.call_to_action')

    <!-- Clients/Testimonials -->
    @include('landing.home.sections.clients')

    <!-- Contact Form -->
    @include('landing.home.sections.contact_form')

    <!-- Additional Features -->
    @include('landing.home.sections.etc')
@endsection

@section('styles')
<style>
    /* Custom styles for the landing page */
    .section {
        padding: 80px 0;
    }
    
    .section-light {
        background-color: #f8f9fa;
    }
    
    .section-dark {
        background-color: #343a40;
        color: white;
    }
    
    .section-title {
        margin-bottom: 50px;
        text-align: center;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #b4261c;
    }
    
    .section-title p {
        font-size: 1.2rem;
        color: #6c757d;
    }
    
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-10px);
    }
    
    .btn-primary {
        background: #b4261c;
        border-color: #b4261c;
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 600;
    }
    
    .btn-primary:hover {
        background: #8f0606;
        border-color: #8f0606;
    }
    
    .btn-outline-primary {
        color: #b4261c;
        border-color: #b4261c;
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 600;
    }
    
    .btn-outline-primary:hover {
        background: #b4261c;
        border-color: #b4261c;
        color: white;
    }
    
    /* Animations */
    [data-aos] {
        opacity: 0;
        transition-property: opacity, transform;
    }
    
    [data-aos].aos-animate {
        opacity: 1;
    }
</style>
@endsection

@section('scripts')
<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        once: true
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
