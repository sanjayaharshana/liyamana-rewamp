@extends('landing.common.app')

@section('title', 'Liyamana Online Platform - World leading online platform for custom letters')

@section('meta_description', 'Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide. Personalize your communication and revive the magic of handwritten messages.')
@section('meta_keywords', 'Liyamana, send letters online, heartfelt letters, pen pals, personalized communication, write letters, commercial letters, connect with friends')

@section('content')
    <!-- Hero Section -->
    @include('landing.home.sections.hero')

    @include('landing.home.sections.feature_products')
    @include('landing.home.sections.categories')
    @include('landing.home.sections.call_to_action')
    <!-- Faq 2 Section -->
    @include('landing.home.sections.services')

    @include('landing.home.popups.cookies_policy')
@endsection

@section('footer')
@endsection
