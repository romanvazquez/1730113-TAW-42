<template>
  <div>
    <!--  Slider inicial. Carrousel de Imágenes de presentación -->
    <v-carousel hide-delimiters>
        <v-carousel-item :src="require('../../../public/img/home/slider4.jpg')">
            <v-row class="fill-height" align="center" justify="center">
                <div class="display-2 white--text pl-5 pr-5 hidden-sm-only"><strong>Upto 60% + Extra 10%</strong></div><br/>
            </v-row>
        </v-carousel-item>

        <v-carousel-item :src="require('../../../public/img/home/slider2.jpg')">
            <v-row class="fill-height" align="center" justify="center">
                <div class="display-2 white--text pl-5 pr-5 hidden-sm-only"><strong>Upto 60% + Extra 10%</strong></div><br/>
            </v-row>
        </v-carousel-item>
        
        <v-carousel-item :src="require('../../../public/img/home/slider3.jpg')">
            <v-row class="fill-height" align="center" justify="center">
                <div class="display-2 white--text pl-5 pr-5 hidden-sm-only"><strong>Upto 60% + Extra 10%</strong></div><br/>
            </v-row>
        </v-carousel-item>
        
        <v-carousel-item :src="require('../../../public/img/home/slider1.jpg')">
            <v-row class="fill-height" align="center" justify="center">
                <div class="display-2 white--text pl-5 pr-5 hidden-sm-only"><strong>Upto 60% + Extra 10%</strong></div><br/>
            </v-row>
        </v-carousel-item>
    </v-carousel>
    
    <!-- Tendencias de venta -->
    <div class="pl-4 pr-4 row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <v-card>
          <v-img :src="require('../../../public/img/home/slider2.jpg')" class="white--text align-center" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" height="400px">
           <h1 class="text-center font-size">Mejores opciones</h1>
            <div class="text-center">
              <v-btn  href="/shop" class="white--text " outlined>COMPRA AHORA</v-btn>
            </div>
          </v-img>
        </v-card>
      </div>
      
      <div class="col-md-6 col-sm-6 col-xs-12">
        <v-card>
          <v-img :src="require('../../../public/img/home/slider3.jpg')" class="white--text align-center" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" height="400px">
            <h1 class="text-center font-size">New Arrivals</h1>
            <div class="text-center">
              <v-btn  href="/shop" class="white--text" outlined>COMPRA AHORA</v-btn>
            </div>
          </v-img>
        </v-card>
      </div>
    </div>
    
    <div class="pl-4 pr-4 row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <v-card outlined>
          <v-img :src="require('../../../public/img/home/deal2.jpg')" class="white--text align-center" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" height="300px">
            <h1 class="text-center font-size">Lorem & Ipsum</h1>
            <div class="text-center mt-2">
              <v-btn class="white--text caption"  href="/shop" text>COMPRA AHORA <v-icon class="white--text caption">mdi-arrow-right</v-icon></v-btn>
            </div>
          </v-img>
        </v-card>
      </div>
      
      <div class="col-md-4 col-sm-4 col-xs-12">
        <v-card outlined>
          <v-img :src="require('../../../public/img/home/deal3.jpg')" class="white--text align-center" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" height="300px">
            <h1 class="text-center font-size">Lorem & Ipsum</h1>
            <div class="text-center mt-2">
              <v-btn class="white--text caption"  href="/shop" text>COMPRA AHORA <v-icon class="white--text caption">mdi-arrow-right</v-icon></v-btn>
            </div>
          </v-img>
        </v-card>
      </div>
      
      <div class="col-md-4 col-sm-4 col-xs-12">
        <v-card outlined>
          <v-img :src="require('../../../public/img/home/deal4.jpg')" class="white--text align-center" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" height="300px">
            <h1 class="text-center font-size">Lorem & Ipsum</h1>
            <div class="text-center mt-2">
              <v-btn class="white--text caption"  href="/shop" text>COMPRA AHORA <v-icon class="white--text caption">mdi-arrow-right</v-icon></v-btn>
            </div>
          </v-img>
        </v-card>
      </div>
    </div>

    <!-- Ofertas del día -->
    <v-container>
      <v-row no-gutters>
        <v-col :cols="12">
          <v-card-text class="" tile outlined>
            <v-card-title class="subheading ">Ofertas del día</v-card-title>
            <v-divider></v-divider>
            <div class="row">
              <div class="col-12 col-md-3 col-sm-6 col-xs-6 text-center">
                <v-hover v-slot:default="{ hover }" open-delay="200">
                  <v-card :elevation="hover ? 16 : 2">
                  <v-img class="white--text align-end" height="200px" :src="require('../../../public/img/home/deal1.jpg')">
                    <v-card-title>Bags & Purses </v-card-title>
                  </v-img>

                  <v-card-text class="text--primary text-center">
                    <div>Upto 60% + Extra 10%</div>
                    <div>Baggit, Zara, Fossil</div>
                  </v-card-text>

                  <div class="text-center">
                    <v-btn href="/shop" class="ma-2" outlined color="info">
                      Explora
                    </v-btn>
                  </div>
                </v-card>
                </v-hover>
              </div>
              <div class="col-12 col-md-3 col-sm-6 col-xs-6 text-center" >
                <v-hover v-slot:default="{ hover }" open-delay="200">
                  <v-card :elevation="hover ? 16 : 2">
                  <v-img class="white--text align-end" height="200px" :src="require('../../../public/img/home/deal2.jpg')">
                    <v-card-title>T-Shirt </v-card-title>
                  </v-img>

                  <v-card-text class="text--primary text-center">
                    <div>Upto 50%</div>
                    <div>Zara, Selected, Celio</div>
                  </v-card-text>

                  <div class="text-center">
                    <v-btn href="/shop" class="ma-2" outlined color="info" >
                      Explora
                    </v-btn>
                  </div>
                </v-card>
                </v-hover>
              </div>
              
              <div class="col-12 col-md-3 col-sm-6 col-xs-6 text-center" >
                <v-hover v-slot:default="{ hover }" open-delay="200">
                  <v-card :elevation="hover ? 16 : 2">
                  
                  <v-img class="white--text align-end" height="200px" :src="require('../../../public/img/home/deal3.jpg')" >
                    <v-card-title>Jeans </v-card-title>
                  </v-img>

                  <v-card-text class="text--primary text-center">
                    <div>Upto 60% + Extra 10%</div>
                    <div>Jack & Jones, Levis</div>
                  </v-card-text>

                  <div class="text-center">
                    <v-btn href="/shop" class="ma-2" outlined color="info">
                      Explora
                    </v-btn>
                  </div>
                </v-card>
                </v-hover>
              </div>
              
              <div class="col-12 col-md-3 col-sm-6 col-xs-6 text-center" >
                <v-hover v-slot:default="{ hover }" open-delay="200">
                  <v-card :elevation="hover ? 16 : 2">
                  <v-img class="white--text align-end" height="200px" :src="require('../../../public/img/home/deal4.jpg')">
                    <v-card-title>Shoes </v-card-title>
                  </v-img>

                  <v-card-text class="text--primary text-center">
                    <div>Upto 60% + Extra 10%</div>
                    <div>Nike, Adidas, Puma</div>
                  </v-card-text>

                  <div class="text-center">
                    <v-btn href="/shop" class="ma-2" outlined color="info">
                      Explora
                    </v-btn>
                  </div>
                </v-card>
                </v-hover>
              </div>
            </div>
          </v-card-text>
        </v-col>
      </v-row>
    </v-container>

    <!-- Pre-Footer -->
    <v-card  class="accent" >
      <v-container>
        <v-row no-gutters>
          <v-col class="col-12 col-md-4 col-sm-12">
            <v-row >
              <v-col class="col-12 col-sm-3 pr-4" align="right">
                <v-icon class="display-2">mdi-truck</v-icon>
              </v-col>
              <v-col class="col-12 col-sm-9 pr-4">
                <h3 class="font-weight-light">Envíós seguros y devoluciones.</h3>
                              <p class="font-weight-thin">Envío gratis a partir de compras de $300</p>
              </v-col>
            </v-row>
          </v-col>
          <v-col class="col-12 col-md-4 col-sm-12">
            <v-row >
              <v-col class="col-12 col-sm-3 pr-4" align="right">
                <v-icon class="display-2">mdi-cash-usd</v-icon>
              </v-col>
              <v-col  class="col-12 col-sm-9 pr-4">
                <h3 class="font-weight-light">Trato directo con productores.</h3>
                <p class="font-weight-thin">Consigue los mejores precios.</p>
              </v-col>
            </v-row>
          </v-col>
          <v-col class="col-12 col-md-4 col-sm-12">
            <v-row>
              <v-col class="col-12 col-sm-3 pr-4" align="right">
                <v-icon class="display-2">mdi-headset</v-icon>
              </v-col>
              <v-col  class="col-12 col-sm-9 pr-4">
                <h3 class="font-weight-light">FAQ.</h3>
                <p class="font-weight-thin">Soporte disponible para las dudas más comunes entre los usuarios.</p>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </div>
</template>

<script>
export default {
    data () {
        return {
            items: [
                { title: 'Click Me' },
                { title: 'Click Me' },
                { title: 'Click Me' },
                { title: 'Click Me 2' },
            ],
            activeBtn: 1,
            colors: [
                'indigo',
                'warning',
                'pink darken-2',
                'red lighten-1',
                'deep-purple accent-4',
            ],
            slides: [
                'First',
                'Second',
                'Third',
                'Fourth',
                'Fifth',
            ],
        }
    },
}
</script>
<style>
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: .5;
    position: absolute;
    width: 100%;
}
</style>

