<template>
    <div>
      <v-form id="pageAdd" ref="pageAdd" @submit.prevent="pageAdd" autocomplete="nope">
          <!-- Cabecera del componente -->
          <Header :heading="getHeading()">
            <!-- Botón de activación que determina el estado -->
            <v-switch
              hide-details
              class="mr-8"
              v-model="page.status"
              inset
              name="status"
              label="Status"
              color="success"
              :value="page.status"
            ></v-switch>
            
            <!-- Botón para guardar y enviar el contenido del formulario -->
            <v-btn color="success" class="mr-5" type="submit" :loading="$store.state.loading">
                <v-icon left>mdi-content-save-outline</v-icon>Guardar
            </v-btn>
            <!-- Botón para ir hacia el listado -->
            <v-btn to="/pages" color="info">
                <v-icon left>mdi-view-list</v-icon>Ver páginas
            </v-btn>
          
          <!-- Contenido del componente -->
          </Header>
          <v-card class="full">
              <v-tabs background-color="white" color="info accent-4" left>
              <v-tab>Información</v-tab>
              <v-tab>SEO</v-tab>
              <v-tab-item class="pa-5" :eager="true">
                <v-text-field type="text" label="Nombre*" v-model="page.name" name="name" required :rules="validateRules" autocomplete="nope"></v-text-field>

                <v-text-field type="text" label="Url*" v-model="page.url" name="url" required :rules="validateRules"  autocomplete="nope"></v-text-field>

                <Textarea autocomplete="nope" outlined name="content" label="Content" :value="page.content"></Textarea>
              </v-tab-item>

              <v-tab-item class="pa-5" :eager="true">
                <SEO :meta="page"></SEO>
              </v-tab-item>

            </v-tabs>
          </v-card>
      </v-form>
    </div>
</template>
<script>
  export default {
    beforeCreate() {

      // Se defines las URL que establecen comunicación entre la vista (cliente) y el controlador (servidor)
      // En este caso una misma vista con un formulario, funciona para crear nuevos registros y editarlos. 

      var url = '/page/add';
      if (this.$router.history.current.params && this.$router.history.current.params.id) {
        url = '/page/edit/' + this.$router.history.current.params.id;
      }

      /* 
      * Se envía la solicitud al controlador a través de una promesa axios. 
      * La respuesta de esta promesa (dada por el método correspondiente en el controlador, dictado por la URL) asigna el valor 
      */
      return this.$axiosx.get(url)
      .then((res) => {
        this.page = res.data.page;
      });
    },
    data () {
      return {
        page: [],
        validateRules: [ v => !!v || 'Este campo es obligatorio.'],
      }
    },
    watch : {
      '$route.query.added' : function (val) {
          this.getData();
      }
    },
    methods: {
        getData () {
          if (this.$route.params && this.$route.params.id) {
                var url = '/page/edit/' + this.$route.params.id;
                return this.$axiosx.get(url)
                .then((res) => {
                    this.page = res.data.page;
                });
            }
        },
        
        // Escribe en el encabezado de la página, el título que se va escribiendo
        getHeading () {
            if (this.page && this.page.name) {
                  return this.page.name;
            }

            return 'Agregar Página';
        },
        pageAdd () {
          if (this.$refs.pageAdd.validate() == false) {
              this.$store.commit('snackbar', {
                status: 'error',
                text: 'Existen campos vacíos. Asegúrate de ingresar los datos correctamente.'
              });
              return true;
          }
          // Se crea un objeto de tipo FormData que tome todos los campos del formulario
          var fd = new FormData(this.$refs.pageAdd.$el);
          
          this.dialog = true;
          
          var url = '/page/add';
          
          if (this.$router.history.current.params && this.$router.history.current.params.id) {
            url = '/page/edit/' + this.$router.history.current.params.id;
          }

          /*
          * Se envía la solicitud al controlador a través de una promesa axios. La promesa está dada por la URL en cuestión y los datos del objeto de tipo FormData
          * La URL es tomada por el fichero de rutas de Laravel y establece la comunicación de solicitudes entre la ruta (el cliente) y el controlador (el servidor).
          */ 
          this.$axiosx.post(url, fd).then((res) => {
            // Si el controlador envía un estado de error en la validación por parte del servidor
            if (res.data.status == 'error') {
              // Muestra el mesaje que notifica de este error
              this.$store.commit('snackbar', res.data);
            }

            // Si el controlador envía un estado de redirección. Es decir, que no recibe un 'id' dentro del objeto FromData
            // Entonces agregar al enrutador la dirección (retornada por el controlador a traves de la URL) y el estado de la consulta. También se ejecuta el método local de agregado.
            if (res.data.status == 'redirect') {
              this.$router.push({
                path: res.data.text,
                query: { added: 'true' }
              });
              this.added();
            }
            // Si el controlador envía un estado de success en la validación por parte del servidor
            if (res.data.status == 'success') {
                // Muestra el mesaje que notifica exito
                this.$store.commit('snackbar', res.data);
            }
          });
        },
        added() {
          // Si el estado de la consulta es de aceptado
          if (this.$router.history.current.query.added == 'true') {
            // Muestra el mesaje de éxito
            this.$store.commit('snackbar', {
              status: 'success',
              text: 'La página ha sido agregada.'
            });
          }
        }
      }
  }
</script>
