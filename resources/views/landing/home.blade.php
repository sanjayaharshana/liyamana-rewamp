@extends('landing.common.app')

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
