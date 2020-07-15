@extends('layouts.layout')

@section('title', 'Afíliate')

@section('content')

    <main id="main">
        <!-- ======= Our Services Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
                <h2>Beneficios</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li>Afíliate</li>
                </ol>
            </div>
    
            </div>
        </section><!-- End Our Services Section -->
    
        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Ahorra en publicidad</a></h4>
                        <p class="description">Que tu negocio no se detenga. Llega de manera más eficiente a las personas para dar a conocer tu negocio.</p>
                    </div>
                    </div>
        
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Visibilidad en la web</a></h4>
                        <p class="description">Haz que los clientes en tu localidad te encuentren fácilmente a través de un sitio en Internet</p>
                    </div>
                    </div>
        
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-green">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Mayor alcance</a></h4>
                        <p class="description">Logra llegar hacia más personas y consigue nuevos clientes para tu negocio.</p>
                    </div>
                    </div>
        
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-blue">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Ventas en línea</a></h4>
                        <p class="description">Aprovecha de los beneficios que tiene vender tu productos o servicios en línea.</p>
                    </div>
                    </div>
        
                </div>
    
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section class="pricing section-bg" data-aos="fade-up">
            <div class="container">
    
            <div class="section-title">
                <h2>Precios</h2>
                <p>Registra de manera gratuita a tu negocio.</p>
            </div>
    
            <div class="row no-gutters">
    
                <div class="col-lg-4 box">
                <h3>Gratis</h3>
                <h4>$0<span>El primer bimestre</span></h4>
                <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
                    <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                </ul>
                <a href="#" class="get-started-btn">Empezar</a>
                </div>
    
                <div class="col-lg-4 box featured">
                <h3>Empresarial</h3>
                <h4>$5<span>Al mes</span></h4>
                <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                    <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                </ul>
                <a href="#" class="get-started-btn">Empezar</a>
                </div>
    
                <div class="col-lg-4 box">
                <h3>Multiempresa</h3>
                <h4>$8<span>Al mes</span></h4>
                <ul>
                    <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                    <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                    <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                    <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                    <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                </ul>
                <a href="#" class="get-started-btn">Empezar</a>
                </div>
    
            </div>
    
            </div>
        </section><!-- End Pricing Section -->

    </main>
    @include('partials/footer')
    
@endsection