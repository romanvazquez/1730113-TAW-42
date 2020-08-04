<template>
    <!-- Footer del sitio para visitantes -->
    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    </div>

                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-links">
                        <h4>Ligas de ayuda</h4>
                        <ul>  
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Home</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">About us</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Services</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Terms of service</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-links">
                        <h4>Nuestros servicios</h4>
                        <ul>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Web Design</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Web Development</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Product Management</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Marketing</a></li>
                            <li><v-icon>mdi-arrow-right</v-icon><a href="#">Graphic Design</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            <v-icon dark>mdi-home</v-icon> Ciudad Victoria, Tam. México<br><br>
                            <v-icon dark>mdi-phone</v-icon><strong> Teléfono:</strong> +52 834 14991 39<br><br>
                            <v-icon dark>mdi-at</v-icon><strong> Email:</strong> rdjvazqueza@gmail.com<br>
                        </p>

                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-info">
                        <h3>Contacto</h3>
                        <p>Redes sociales.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><v-icon>mdi-twitter</v-icon></a>
                            <a href="#" class="facebook"><v-icon>mdi-facebook</v-icon></a>
                            <a href="#" class="instagram"><v-icon>mdi-instagram</v-icon></a>
                            <a href="#" class="linkedin"><v-icon>mdi-linkedin</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Red Comercial</span></strong>. Todos los derechos reservados.
            </div>
            <div class="credits">Diseñado por <a href="https://www.romanvazquez.me/">Román Vázquez</a></div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'VisitanteFooter'
}
</script>

<style>
/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  background: #0b212d;
  padding: 0 0 30px 0;
  color: #fff;
  font-size: 14px;
}

#footer .footer-newsletter {
  padding: 30px 0;
  background: #0d2735;
}

#footer .footer-newsletter h4 {
  font-size: 24px;
  margin: 0 0 20px 0;
  padding: 0;
  line-height: 1;
  font-weight: 600;
  color: #a2cce3;
}

#footer .footer-newsletter form {
  margin-top: 30px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 50px;
}

#footer .footer-newsletter form input[type="email"] {
  border: 0;
  padding: 4px;
  width: calc(100% - 100px);
}

#footer .footer-newsletter form input[type="submit"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  margin: 3px;
  background: #68A4C4;
  color: #fff;
  transition: 0.3s;
  border-radius: 50px;
}

#footer .footer-newsletter form input[type="submit"]:hover {
  background: #468db3;
}

#footer .footer-top {
  background: #0d2735;
  border-top: 1px solid #17455e;
  border-bottom: 1px solid #123649;
  padding: 30px 0 30px 0;
}

#footer .footer-top .footer-info {
  margin-bottom: 20px;
}

#footer .footer-top .footer-info h3 {
  font-size: 18px;
  margin: 0 0 20px 0;
  padding: 2px 0 2px 0;
  line-height: 1;
  color: #a2cce3;
  font-weight: 600;
}

#footer .footer-top .footer-info p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 0;
  font-family: "Roboto", sans-serif;
  color: #fff;
}

#footer .footer-top .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #1e4356;
  color: #fff;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}

#footer .footer-top .social-links a:hover {
  background: #68A4C4;
  color: #fff;
  text-decoration: none;
}

#footer .footer-top h4 {
  font-size: 18px;
  font-weight: 600;
  color: #a2cce3;
  position: relative;
  padding-bottom: 12px;
}

#footer .footer-top .footer-links {
  margin-bottom: 30px;
}

#footer .footer-top .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

#footer .footer-top .footer-links ul i {
  padding-right: 2px;
  color: #a2cce3;
  font-size: 18px;
  line-height: 1;
}

#footer .footer-top .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

#footer .footer-top .footer-links ul li:first-child {
  padding-top: 0;
}

#footer .footer-top .footer-links ul a {
  color: #fff;
  transition: 0.3s;
  display: inline-block;
  line-height: 1;
}

#footer .footer-top .footer-links ul a:hover {
  color: #a2cce3;
}

#footer .footer-top .footer-contact {
  margin-bottom: 30px;
}

#footer .footer-top .footer-contact p {
  line-height: 26px;
}

#footer .copyright {
  text-align: center;
  padding-top: 15px;
}

#footer .credits {
  padding-top: 10px;
  text-align: center;
  font-size: 13px;
  color: #fff;
}

#footer .credits a {
  color: #a2cce3;
}
</style>