@extends('landing.common.app')

@section('title', 'Liyamana Online Platform - World leading online platform for custom letters')

@section('meta_description', 'This is a custom page description.')
@section('meta_keywords', 'custom, page, keywords')

@section('content')




    <!-- Hero Section -->
    @include('landing.home.sections.hero')

    @include('landing.home.sections.feature_products')
    @include('landing.home.sections.categories')
    @include('landing.home.sections.call_to_action')
    <!-- Faq 2 Section -->
    @include('landing.home.sections.services')
@endsection

@section('footer')
@endsection
