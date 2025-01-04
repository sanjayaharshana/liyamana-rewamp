@extends('landing.common.app')


@section('title', 'Liyamana - Online Letter Sending Platform | Fast & Secure')


@section('meta_description', 'Liyamana offers a secure and eco-friendly platform for sending letters online. Experience hassle-free communication with fast delivery and encrypted privacy.')
@section('meta_keywords', 'Liyamana, online letter-sending platform, send letters online, digital letters, eco-friendly communication, secure letter service, online communication platform')


@push('head-css')
<style>
    .hero.section {
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        padding: 0;
        margin: 0;
    }

    .index-page .header {
        display: block;
    }

    #footer {
        display: block;
    }
</style>
<link href="{{ asset('landing_pages/assets/css/post-card.css') }}" rel="stylesheet" type="text/css">
@endpush


@section('content')
<div class="post-card-wrapper">
    <section id="hero" class="hero section">

        <div id="demo"></div>

        <div class="details" id="details-even">
          <div class="place-box">
            <div class="text">Switzerland Alps</div>
          </div>
          <div class="title-box-1"><div class="title-1">SAINT</div></div>
          <div class="title-box-2"><div class="title-2">ANTONIEN</div></div>
          <div class="desc">
            Tucked away in the Switzerland Alps, Saint Antönien offers an idyllic retreat for those seeking tranquility and adventure alike. It's a hidden gem for backcountry skiing in winter and boasts lush trails for hiking and mountain biking during the warmer months.
          </div>
          <div class="cta">
            <button class="bookmark">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
            <button class="discover">Discover Location</button>
          </div>
        </div>

        <div class="details" id="details-odd">
          <div class="place-box">
            <div class="text">Switzerland Alps</div>
          </div>
          <div class="title-box-1"><div class="title-1">SAINT </div></div>
          <div class="title-box-2"><div class="title-2">ANTONIEN</div></div>
          <div class="desc">
            Tucked away in the Switzerland Alps, Saint Antönien offers an idyllic retreat for those seeking tranquility and adventure alike. It's a hidden gem for backcountry skiing in winter and boasts lush trails for hiking and mountain biking during the warmer months.
          </div>
          <div class="cta">
            <button class="bookmark">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
            <button class="discover">Discover Location</button>
          </div>
        </div>

        <div class="pagination" id="pagination">
          <div class="arrow arrow-left">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 19.5L8.25 12l7.5-7.5"
              />
            </svg>
          </div>
          <div class="arrow arrow-right">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M8.25 4.5l7.5 7.5-7.5 7.5"
              />
            </svg>
          </div>
            <div class="progress-sub-container" >
                <div class="progress-sub-background" >
                    <div class="progress-sub-foreground" ></div>
                </div>
            </div>
            <div class="slide-numbers" id="slide-numbers"></div>
        </div>

        <div class="cover" ></div>
    </section>
</div>
@endsection

@push('footer-js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js'></script>
    <script src="{{ asset('landing_pages/assets/js/post-card.js') }}"></script>
@endpush

@section('footer')
@endsection
