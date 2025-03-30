@extends('landing.common.app')

@section('title', getSetting('site_name').' - World leading online platform for custom letters')

@section('meta_description', 'Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide. Personalize your communication and revive the magic of handwritten messages.')
@section('meta_keywords', 'Liyamana, send letters online, heartfelt letters, pen pals, personalized communication, write letters, commercial letters, connect with friends')

@push('meta')
    <meta property="og:title" content="{{ getSetting('site_name') }} - World leading online platform for custom letters">
    <meta property="og:description" content="Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide.">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
@endpush

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

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
@endpush

@push('scripts')
    <script>
        // Initialize AOS with optimized settings
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100,
                disable: window.innerWidth < 768
            });
            
            // Optimized smooth scroll
            const smoothScroll = (e) => {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            };

            // Use event delegation for better performance
            document.addEventListener('click', function(e) {
                if (e.target.matches('a[href^="#"]')) {
                    smoothScroll.call(e.target, e);
                }
            });

            // Lazy load sections
            const observerOptions = {
                root: null,
                rootMargin: '50px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('section-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.section').forEach(section => {
                observer.observe(section);
            });
        });
    </script>
@endpush
