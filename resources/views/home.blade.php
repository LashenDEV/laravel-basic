@extends('layouts.home_master')
@include('layouts.body.slider')

@section('home_content')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><strong>About Us</strong></h2>
            </div>

            @isset($homeabout)
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>{{ $homeabout->title }}</h2>
                    <h3>{{ $homeabout->short_description }}</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    {{ $homeabout->long_description }}
                </div>
            </div>
            @endisset

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><strong>Services</strong></h2>
                <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                </svg>
                                <i class="bx bxl-dribbble"></i>
                            </div>
                            <h4><a href="">{{ $service->title }}</a></h4>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
            </div>
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach ($images as $image)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ $image->image }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="{{ $image->image }}" data-gall="portfolioGallery" class="venobox preview-link"
                                title="App 1"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Brands</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                @foreach ($brands as $brand)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="{{ asset($brand->brand_image) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Our Clients Section -->
@endsection
