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
                <div class="service-item position-relative">
                    <div style="background: grey;height: 100px;"></div>
                    <h4><a href="" class="stretched-link">{{$mostPopularTemplate_item->name}}</a></h4>
                    <p>{{substr($mostPopularTemplate_item->description,0,200)}}</p>
                </div>
            </div><!-- End Service Item -->
            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->
