<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Categories</h2>
        <p>Connecting Through Words, One Letter at a Time</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach($templateCategories as $templateCategories_item)
                <!-- Service Item -->
                <div class="col-xl-3 col-md-6 d-flex" style="cursor: pointer;" data-aos="fade-up" data-aos-delay="100"
                     onclick="window.location.href = '{{ url('market-place?&search_keyword=&category='.$templateCategories_item->slug) }}'">
                    <div class="service-item position-relative" style="padding: 10px; text-align: center;">

                        <div>
                            <i class="{{$templateCategories_item->icon ?? 'bi bi-envelope-open icon'}}" style="font-size: 50px;"></i>
                        </div>

                        <div style="padding-top: 20px; padding-left: 20px; padding-right: 20px; padding-bottom: 20px;">
                            <h4>
                                <a href="javascript:void(0);" style="pointer-events: none;">
                                    {{$templateCategories_item->category_name}}
                                </a>
                            </h4>
                            <p style="text-align: center; font-size: 10px; line-height: normal; margin-bottom: 9px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; line-clamp: 2; -webkit-box-orient: vertical;">
                                {{$templateCategories_item->category_description}}
                            </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->
