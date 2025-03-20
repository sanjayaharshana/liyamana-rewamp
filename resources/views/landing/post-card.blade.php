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

    /* Modern Dark Glassy Post Cards */

    .post-cards-section {
        padding: 80px 0;
        background: linear-gradient(to bottom, #343434, #121212, #1e1e1e, #343434, #6f6f6f);
        position: relative;
    }


    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-header h2 {
        font-size: 42px;
        font-weight: 700;
        color: #ffffff;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .section-header h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
    }

    .post-cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .post-card-item {
        border-radius: 16px;
        overflow: hidden;
        background: rgba(30, 30, 30, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .post-card-item:hover {
        transform: translateY(10px) !important;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
        border: 2px solid #04385d;
    }

    .post-card-item:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    }

    .post-card-image {
        height: 240px;
        background-size: cover;
        background-position: center;
        position: relative;
        cursor: pointer;
    }

    .post-card-image:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
        background: linear-gradient(to top, rgba(30, 30, 30, 0.9), transparent);
    }

    .post-card-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 1;
    }

    .post-card-place {
        font-size: 12px;
        color: #a3a3a3;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .post-card-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 15px;
        line-height: 1.3;
        color: #ffffff;
        background: linear-gradient(90deg, #ffffff, #d4d4d8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .post-card-desc {
        font-size: 14px;
        color: #d4d4d8;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .post-card-cta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .post-card-bookmark {
        background: rgba(255, 255, 255, 0.1);
        color: #d4d4d8;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .post-card-bookmark:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .post-card-bookmark svg {
        width: 20px;
        height: 20px;
    }

    .post-card-discover {
        background: linear-gradient(90deg, #14274b, #27395b);
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: progress;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .post-card-discover:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(99, 102, 241, 0.4);
    }

    /* Popup styles */
    .post-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease, visibility 0.4s ease;
        backdrop-filter: blur(5px);

    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track (background of the scrollbar) */
    ::-webkit-scrollbar-track {
        background: #121212; /* Dark background */
        border-radius: 2px;
    }

    /* Scrollbar thumb (the draggable part) */
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #02222e, #09736e, #022e2e);
        border-radius: 5px;
    }

    /* Hover effect on the scrollbar thumb */
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #022e2e, #09736e, #02222e);
    }

    }

    .post-popup.active {
        opacity: 1;
        visibility: visible;
    }

    .post-popup-content {
        background: rgba(30, 30, 30, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        width: 90%;
        max-width: 900px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        transform: translateY(30px);
        transition: transform 0.5s ease;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .post-popup.active .post-popup-content {
        transform: translateY(0);
    }

    .post-popup-header {
        position: relative;
        height: 350px;
        overflow: hidden;
        border-radius: 16px 16px 0 0;
    }

    .post-popup-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .post-popup-header:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 150px;
        background: linear-gradient(to top, rgba(30, 30, 30, 1), transparent);
    }

    .post-popup-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: background 0.3s ease;
        color: white;
    }

    .post-popup-close:hover {
        background: rgba(0, 0, 0, 0.7);
    }

    .post-popup-body {
        padding: 35px;
        color: white;
    }

    .post-popup-place {
        font-size: 14px;
        color: #a3a3a3;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .post-popup-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 25px;
        line-height: 1.2;
        background: linear-gradient(90deg, #ffffff, #d4d4d8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .post-popup-description {
        font-size: 16px;
        line-height: 1.8;
        color: #d4d4d8;
        margin-bottom: 30px;
    }

    .post-popup-cta {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .post-popup-button {
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }

    .post-popup-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .post-cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .post-card-desc{
            display: none !important;
        }

        .section-header h2 {
            font-size: 36px;
        }
    }

    @media (max-width: 768px) {
        .post-popup-header {
            height: 250px;
        }

        .post-popup-title {
            font-size: 28px;
        }

        .post-popup-body {
            padding: 25px;
        }

        .post-cards-section {
            padding: 60px 0;
        }

        .post-card-desc{
            display: none !important;
        }
    }

    @media (max-width: 576px) {
        .post-cards-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .post-card-image {
            height: 200px;
        }

        .section-header h2 {
            font-size: 30px;
        }

        .post-popup-button {
            padding: 12px 20px;
            font-size: 14px;
        }
        .post-card-desc{
            display: none !important;
        }
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .post-cards-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media (max-width: 576px) {
        .post-cards-grid {
            grid-template-columns: 1fr !important;
            padding: 20px;
        }
    }


    @media (max-width: 1024px) {
        .post-cards-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media (max-width: 768px) {
        .post-cards-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 10px;
        }

        .post-card-image {
            height: 200px;
        }
    }




    /* Essential slider styles */
    .card {
        position: absolute;
        top: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        will-change: transform;
    }

    #demo {
        width: 100%;
        height: 100vh;
        position: relative;
        overflow: hidden;
    }

    .cover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: 100;
    }

    /* Fix for the details section */
    .details {
        position: absolute;
        top: 50%;
        left: 100px;
        z-index: 50;
        width: 500px;
        pointer-events: none;
    }



    .details .title-box-1,
    .details .title-box-2 {
        overflow: hidden;
        margin-bottom: 10px;
        position: relative;
        z-index: 25;
    }

    .details .title-1,
    .details .title-2 {
        font-size: 60px;
        font-weight: 700;
        line-height: 1.2; /* Increased from 1 to 1.2 */
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        display: block; /* Ensure block display */
    }

    .details .desc {
        color: white;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 30px;
        max-width: 400px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    }

    .details .cta {
        display: flex;
        align-items: center;
        pointer-events: auto;
    }

    .details .bookmark {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: white;
        cursor: pointer;
    }

    .details .discover {
        background: white;
        color: black;
        border: none;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .details .discover:hover {
        transform: translateY(-2px);
    }

    /* Pagination styles */
    .pagination {
        position: absolute;
        bottom: 50px;
        right: 50px;
        display: flex;
        align-items: center;
        z-index: 60;
    }

    .arrow {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        margin: 0 10px;
    }

    .arrow svg {
        width: 20px;
        height: 20px;
    }

    .progress-sub-container {
        margin: 0 15px;
    }

    .progress-sub-background {
        width: 500px;
        height: 4px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 2px;
        overflow: hidden;
    }

    .progress-sub-foreground {
        height: 100%;
        background: white;
    }

    .slide-numbers {
        display: flex;
        color: white;
        font-weight: 600;
        margin-left: 15px;
    }

    .slide-numbers .item {
        margin: 0 5px;
    }

    /* Card content styles */
    .card-content {
        position: absolute;
        color: white;
        pointer-events: none;
        z-index: 40;
    }

    .content-place {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .content-title-1,
    .content-title-2 {
        font-size: 16px;
        font-weight: 700;
    }

    /* Indicator for slide transitions */
    .indicator {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: white;
        z-index: 70;
    }

    body.popup-open {
        overflow: hidden;
    }

    /* Responsive adjustments for popup */
    @media (max-width: 768px) {
        .post-popup-header {
            height: 200px;
        }

        .post-popup-title {
            font-size: 24px;
        }

        .post-popup-body {
            padding: 20px;
        }
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

    <!-- New 3-Grid Post Cards Section -->
    <section class="post-cards-section">
        <div class="section-header">
            <h2>Moments that shaped the world</h2>
        </div>
        <div class="post-cards-grid" id="post-cards-grid"></div>
    </section>
</div>

    <!-- Popup template -->
    <div class="post-popup" id="post-popup">
        <div class="post-popup-content">
            <div class="post-popup-header">
                <img src="" alt="" class="post-popup-image" id="popup-image">
                <button class="post-popup-close" id="popup-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="post-popup-body">
                <div class="post-popup-place" id="popup-place"></div>
                <h2 class="post-popup-title" id="popup-title"></h2>
                <p class="post-popup-description" id="popup-description"></p>
                <div class="post-popup-cta">
                    <button class="post-popup-button">I need to Send</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer-js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js'></script>
    <script src="{{ asset('landing_pages/assets/js/post-card.js') }}"></script>
@endpush

@section('footer')
@endsection
