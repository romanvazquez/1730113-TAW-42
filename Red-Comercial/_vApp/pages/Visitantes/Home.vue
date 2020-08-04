<template>
    <div>
        <!-- ======= Hero No Slider Section ======= -->
        <section id="hero-no-slider" class="d-flex align-items-center">
            <div class="container" data-aos="fade-up" data-aos-delay="250"> <!-- position-relative -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2>Hello</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, fugit consequatur doloribus molestiae exercitationem officiis quia soluta quae odit eligendi, neque minima, error vero ipsum beatae saepe iure quidem quo.</p>
                        <a href="" class="btn-get-started ">Read More</a>
                    </div>
                </div>
            </div>
        </section><!-- End Hero No Slider Sectio -->

        <main id="main">
            <!-- ======= Why Us Section ======= -->
            <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="350">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 video-box">

                        </div>
          
                        <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                            <div class="icon-box">
                                <div class="icon"><b-icon icon="lock" font-scale="2"></b-icon></div>
                                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><b-icon icon="gift" font-scale="2"></b-icon></div>
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
                            <img src="../../assets/img/features-1.svg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><v-icon>mdi-check</v-icon> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><v-icon>mdi-check</v-icon> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        </ul>
                        </div>
                    </div>
        
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-5 order-1 order-md-2">
                            <img src="../../assets/img/features-2.svg" class="img-fluid" alt="">
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
                            <img src="../../assets/img/features-3.svg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-5">
                            <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
                            <ul>
                                <li><v-icon>mdi-check</v-icon> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li><v-icon>mdi-check</v-icon> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                <li><v-icon>mdi-check</v-icon> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-5 order-1 order-md-2">
                            <img src="../../assets/img/features-4.svg" class="img-fluid" alt="">
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
        </main>
    </div>
</template>

<script>
export default {
    name: 'Home',
    created () {
        this.$store.commit('SET_LAYOUT', 'visitante-layout')
    }
}
</script>

<style>
/*--------------------------------------------------------------
# Hero No Slider Section
--------------------------------------------------------------*/
#hero-no-slider {
  width: 100%;
  height: 70vh;
  overflow: hidden;
  position: relative;
  text-align: center;
}

#hero-no-slider::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), url("../../assets/img/hero-bg.jpg") center top no-repeat;
}

#hero-no-slider h2 {
  color: #fff;
  margin-bottom: 15px;
  font-size: 48px;
  font-weight: 700;
}

#hero-no-slider p {
  color: #fff;
}

#hero-no-slider .btn-get-started {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 50px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #68A4C4;
}

#hero-no-slider .btn-get-started:hover {
  background: #68A4C4;
  color: #fff;
  text-decoration: none;
}

@media (max-width: 575px) {
  #hero-no-slider h2 {
    font-size: 30px;
  }
}
/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
  padding: 60px 0;
}

.section-bg {
  background-color: #f3f8fa;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 28px;
  font-weight: 400;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2::before {
  content: '';
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #68A4C4;
  bottom: 0;
  left: calc(50% - 20px);
}

.section-title p {
  margin-bottom: 0;
}
/*--------------------------------------------------------------
# Why Us
--------------------------------------------------------------*/
.why-us .container {
  box-shadow: 0 5px 25px 0 rgba(214, 215, 216, 0.6);
  background: #fff;
}
.why-us .icon-box + .icon-box {
  margin-top: 50px;
}

.why-us .icon-box .icon {
  float: left;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 72px;
  height: 72px;
  background: #f3f8fa;
  border-radius: 6px;
  transition: 0.5s;
}

.why-us .icon-box .icon i {
  color: #68A4C4;
  font-size: 32px;
}

.why-us .icon-box:hover .icon {
  background: #68A4C4;
}

.why-us .icon-box:hover .icon i {
  color: #fff;
}

.why-us .icon-box .title {
  margin-left: 95px;
  font-weight: 700;
  margin-bottom: 10px;
  font-size: 18px;
  text-transform: uppercase;
}

.why-us .icon-box .title a {
  color: #343a40;
  transition: 0.3s;
}

.why-us .icon-box .title a:hover {
  color: #68A4C4;
}

.why-us .icon-box .description {
  margin-left: 95px;
  line-height: 24px;
  font-size: 14px;
}

.why-us .video-box {
  position: relative;
}
.why-us .video-box img {
  padding-top: 15px;
  padding-bottom: 15px;
}
/*--------------------------------------------------------------
# Features
--------------------------------------------------------------*/
.features .row + .row {
  margin-top: 100px;
}

.features h3 {
  font-weight: 400;
  font-size: 24px;
}

.features ul {
  list-style: none;
  padding: 0;
}

.features ul li {
  padding-bottom: 10px;
}

.features ul i {
  font-size: 20px;
  padding-right: 4px;
  color: #68A4C4;
}

.features p:last-child {
  margin-bottom: 0;
}
</style>