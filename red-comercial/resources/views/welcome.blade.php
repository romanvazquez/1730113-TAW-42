@extends('layouts.layout')

@section('title')

  @section('content')

    <!-- ======= Hero No Slider Section ======= -->
    <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2>{{ config('app.name') }}</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, fugit consequatur doloribus molestiae exercitationem officiis quia soluta quae odit eligendi, neque minima, error vero ipsum beatae saepe iure quidem quo.</p>
                    <a href="" class="btn-get-started ">Read More</a>
                </div>
            </div>
        </div>
    </section><!-- End Hero No Slider Sectio -->

    <main id="main">
      <!-- ======= Why Us Section ======= -->
      <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <div class="container">
  
          <div class="row">
            <div class="col-lg-6 video-box">
              <img src="assets/img/why-us.jpg" class="img-fluid" alt="">
              
            </div>
  
            <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
  
              <div class="icon-box">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
  
              <div class="icon-box">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
  
            </div>
          </div>
  
        </div>
      </section><!-- End Why Us Section -->
    
      <!-- ======= Features Section ======= -->
      <section class="features">
        <div class="container">
  
          <div class="section-title">
            <h2>Features</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-md-5">
              <img src="assets/img/features-1.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-4">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              </ul>
            </div>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-md-5 order-1 order-md-2">
              <img src="assets/img/features-2.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1">
              <h3>Corporis temporibus maiores provident</h3>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-md-5">
              <img src="assets/img/features-3.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5">
              <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
              <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
              <ul>
                <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
              </ul>
            </div>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-md-5 order-1 order-md-2">
              <img src="assets/img/features-4.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1">
              <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>
  
        </div>
      </section><!-- End Features Section -->
    
    </main><!-- End #main -->
    @include('partials/footer')

  @endsection