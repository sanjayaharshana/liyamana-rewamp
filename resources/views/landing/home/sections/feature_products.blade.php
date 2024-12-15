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


                <div class="col-xl-3 col-md-6 d-flex" style="cursor: pointer;" data-aos="fade-up" data-aos-delay="100"
                     onclick="document.location.href = '{{ url('market-place/'.$mostPopularTemplate_item->slug) }}'">
                    <div class="service-item position-relative" style="padding: 10px;text-align: center;">
                        <div style="background: url('{{url('storage/'.$mostPopularTemplate_item->feature_image)}}');height: 170px;background-size: cover;background-repeat: no-repeat;background-position: center;margin-bottom: 30px;"></div>
                        <div style="padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
                            <h4>{{$mostPopularTemplate_item->name}}</h4>
                            <p style="text-align: left; font-size: 10px;line-height: normal;margin-bottom: 9px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;line-clamp: 2;-webkit-box-orient: vertical;">
                                {{$mostPopularTemplate_item->description}}
                            </p>
                            <div style="text-align: left">
                                <button class="btn btn-primary" style="margin-top:10px;background: #940303;border-style: none">
                                    LKR {{number_format($mostPopularTemplate_item->price,2)}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->
