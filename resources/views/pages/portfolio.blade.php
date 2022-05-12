@extends('layouts.home_master')
@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portolio</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Portolio</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row aos-init aos-animate" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                </div>
            </div>
            <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up"
                style="position: relative; height: 910.631px;">
                @foreach ($images as $image)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app"
                        style="position: absolute; left: 0px; top: 0px;">
                        <img src="{{ $image->image }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="{{ $image->image }}" data-gall="portfolioGallery"
                                class="venobox preview-link vbox-item" title="App 1"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
    </section><!-- End Portfolio Section -->
@endsection
