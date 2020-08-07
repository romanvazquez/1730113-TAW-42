<template>
  <!-- Footer del sitio para visitantes -->
  <!-- ======= Footer ======= -->
  <v-footer color="ml-n5 mr-n5 mb-n5 primary lighten-1" padless>
    <v-row
      justify="center"
      no-gutters
    >
      <v-btn
        v-for="link in links"
        :key="link"
        color="white"
        text
        class="my-2"
      >
        {{ link }}
      </v-btn>
      
      <v-col class="primary lighten-2 text-center white--text" cols="12">
        <v-container>
          <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4 white--text"
            icon
          >
            <v-icon size="1.25em">{{ icon }}</v-icon>
          </v-btn>
        </v-container>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
    name: 'VisitanteFooter',

    data(){
      return {
        links: [
          'Empresas en la Red Comercial',
          'Servicios',
          'Términos y condiciones',
          'Contacto',
        ],
        icons: [
          'mdi-facebook',
          'mdi-twitter',
          'mdi-linkedin',
          'mdi-instagram',
        ],
      };
    }
}
</script>