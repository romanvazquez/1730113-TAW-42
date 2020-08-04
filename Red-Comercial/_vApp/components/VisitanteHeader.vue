<template>
    <!-- Cabecera del sitio para visitantes -->
    <!-- ======= Header ======= -->
    <b-navbar toggleable="md" type="dark" id="header" class="fixed-top shadow-sm">

        <b-navbar-brand to="/">
            <div class="logo ml-2">
                <h1>Red comercial</h1>
            </div>
        </b-navbar-brand>

        <b-navbar-toggle target="navbar-toggle-collapse"> <!-- For responsive behavior -->
            <template v-slot:default="{ expanded }">
                <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
                <b-icon v-else icon="chevron-bar-down"></b-icon>
            </template>
        </b-navbar-toggle>
        
        <b-collapse id="navbar-toggle-collapse" is-nav> <!-- For responsive behavior -->
            <b-navbar-nav class="ml-auto mr-5">
                <b-nav-item href="#">Inicio</b-nav-item>
                <b-nav-item href="#">Acerca</b-nav-item>
                <b-nav-item href="#">Afíliate</b-nav-item>
                <b-nav-item href="#">FAQ</b-nav-item>
                <b-nav-item href="#">Contacto</b-nav-item>
                <b-nav-item to="/register/empresario">Regístrate</b-nav-item>
                <b-nav-item to="/login">Iniciar sesión</b-nav-item>
                    
                <!-- Navbar dropdowns -->
                <!-- <b-nav-item-dropdown text="Drop Down" right>
                    <b-dropdown-item href="#">Deep Drop Down 1</b-dropdown-item>
                    <b-dropdown-item href="#">Deep Drop Down 2</b-dropdown-item>
                    <b-dropdown-item href="#">Deep Drop Down 3</b-dropdown-item>
                    <b-dropdown-item href="#">Deep Drop Down 4</b-dropdown-item>
                </b-nav-item-dropdown> -->
                
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>
<script>
export default {
    name: 'VisitanteHeader'
}
</script>

<style>
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  transition: all 0.5s;
  z-index: 998;
  transition: all 0.5s;
  background: rgba(30, 67, 86, 0.65);
}
#header .logo h1 {
  font-size: 28px;
  margin: 0;
  padding: 4px 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 3px;
  text-transform: uppercase;
}

#header .logo h1 a, #header .logo h1 a:hover {
  color: #fff;
  text-decoration: none;
}

#header .logo img {
  padding: 0;
  margin: 0;
  max-height: 40px;
}
</style>