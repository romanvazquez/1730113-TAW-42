<template>
    <!-- Footer del sitio para visitantes -->
    <!-- ======= Footer ======= -->
    <v-footer color="primary lighten-1" padless>
      <v-row justify="center" no-gutters>
        <v-btn
          v-for="link in links"
          :key="link"
          text
          rounded
          class="my-2"
        >
          {{ link }}
        </v-btn>
        
        <v-col class="primary lighten-2 py-4 text-center white--text" cols="12">
          {{ new Date().getFullYear() }} — <strong>Red Comercial</strong>
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
          'contacto',
        ]
      };
    }
}
</script>