<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Most Trending Letters</h2>
        <p>Connecting Through Words, One Letter at a Time</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach($mostPopularTemplates as $mostPopularTemplate_item)
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative" style="padding: 10px;text-align: center;">
                    <div style="background: url('{{url('storage/'.$mostPopularTemplate_item->feature_image)}}');height: 170px;background-size: cover;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;"></div>
                    <div style="padding-left: 20px;padding-right: 20px;padding-bottom: 20px;"><h4><a href="" class="stretched-link">{{$mostPopularTemplate_item->name}}</a></h4>
                        <p style="font-size: 10px;line-height: normal;text-align: center;margin-bottom: 9px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3; /* number of lines to show */line-clamp: 2;-webkit-box-orient: vertical;">{{$mostPopularTemplate_item->description}}</p></div>

                </div>
            </div><!-- End Service Item -->
            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->
