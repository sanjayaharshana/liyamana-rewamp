
<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div style="background: url('{{url('storage/'.$template->feature_image ?? null)}}');height: 500px;background-size: cover;background-repeat: no-repeat;">

                </div>
            </div><!-- End testimonial item -->

            @foreach($template->images as $image)
                <div class="swiper-slide">
                    <div style="background: url('{{url('storage/'.$image)}}');height: 500px;background-position:center;background-size: contain;background-repeat: no-repeat;">

                    </div>
                </div><!-- End testimonial item -->
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
