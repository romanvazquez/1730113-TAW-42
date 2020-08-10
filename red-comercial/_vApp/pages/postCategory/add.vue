<template>
    <div>
        <v-form id="postCategory" ref="postCategory" @submit.prevent="postCategory" autocomplete="nope">
            <Header :heading="getHeading()" >
            <v-switch
                hide-details
                class="mr-8"
                v-model="post_category.status"
                inset
                name="status"
                label="Status"
                color="success"
                :value="post_category.status"
            ></v-switch>
              <v-btn color="success" class="mr-5" type="submit" :loading="$store.state.loading">
                  <v-icon left>mdi-content-save-outline</v-icon>Guardar
              </v-btn>
              <v-btn to="/blog/category" color="info">
                  <v-icon left>mdi-view-list</v-icon>Ver Categorías
              </v-btn>
            </Header>
            <v-card class="full">
                 <v-tabs background-color="white" color="info accent-4" left>
                 <v-tab>Información</v-tab>
                 <v-tab>SEO</v-tab>
                 <v-tab-item class="pa-5" :eager="true">
                   <v-text-field
                     v-model="post_category.title"
                     label="Nombre*"
                     name="name"
                     required
                     :rules="validateRules"
                     autocomplete="nope"
                   ></v-text-field>

                   <v-text-field
                     v-model="post_category.url"
                     label="Url*"
                     type="text"
                     required
                     :rules="validateRules"
                     name="url"
                     autocomplete="nope"
                   ></v-text-field>

                 </v-tab-item>

              <v-tab-item :eager="true" class="pa-5">
                <SEO :meta="post_category">
                </SEO>
              </v-tab-item>
            </v-tabs>
          </v-card>
      </v-form>
    </div>
</template>
<script>
import Vue from 'vue'

  export default {
    beforeCreate() {
      /*
      * Se defines las URL que establecen comunicación entre la vista (cliente) y el controlador (servidor)
      * En este caso una misma vista con un formulario, funciona para crear nuevos registros y editarlos. 
      * */

      var url = '/post/category/add';

      if (this.$router.history.current.params && this.$router.history.current.params.id) {
        url = '/post/category/edit/' + this.$router.history.current.params.id;
      }

      /* 
      * Se envía la solicitud al controlador a través de una promesa axios. 
      * La respuesta de esta promesa (dada por el método correspondiente en el controlador, dictado por la URL) asigna el valor 
      */
      return this.$axiosx.get(url).then((res) => {
        // Inicializa el los datos del arreglo 'post_category' en data
        this.post_category = res.data.post_category;

        // Cambia el valor del estado con el botón de activación
        if (this.post_category.status == 1) {
          this.post_category.status == true;
        } else {
          this.post_category.status == false;
        }
      });
    },
    data () {
      return {
        post_category: [],
        validateRules: [
          v => !!v || 'Este campo es obligatorio.'
        ]
      }
    },
    watch : {
      '$route.query.added' : function (val) {
          this.getData();
      }
    },
    methods: {
      // Obtener información para la vista EDITAR
      getData () {
        if (this.$route.params && this.$route.params.id) {
              var url = '/blog/category/edit/' + this.$route.params.id;
              return this.$axiosx.get(url)
              .then((res) => {
                  this.post_category = res.data.post_category;
              });
          }
      },
      getHeading () {
          if (this.post_category && this.post_category.title) {
                return this.post_category.title;
          }

          return 'Agregar Categoría';
      },
      postCategory () {
        // Validacion de formulario
        if (this.$refs.postCategory.validate() == false) {
            this.$store.commit('snackbar', {
                status: 'error',
                text: 'Proporcione los campos obligatorios.'
            });
            return true;
        }

        // Se crea un objeto de tipo FormData con los datos ingresados en el formulario
        var fd = new FormData(this.$refs.postCategory.$el);
        
        this.dialog = true;
        
        var url = '/post/category/add';

        /*
        * Se envía la solicitud al controlador a través de una promesa axios. La promesa está dada por la URL en cuestión y los datos del objeto de tipo FormData
        * La URL es tomada por el fichero de rutas de Laravel y establece la comunicación de solicitudes entre la ruta (el cliente) y el controlador (el servidor).
        */
        if (this.$router.history.current.params && this.$router.history.current.params.id) {
          url = '/post/category/edit/' + this.$router.history.current.params.id;
        }
        this.$axiosx.post(url, fd).then((res) => {
          // Si el controlador envía un estado de error en la validación por parte del servidor
          if (res.data.status == 'error') {
            // Muestra el mesaje que notifica de este error
            this.$store.commit('snackbar', res.data);
          }

          // Si el controlador envía un estado de redirección. Es decir, que no recibe un 'id' dentro del objeto FromData
          // Entonces agregar al enrutador la dirección (retornada por el controlador a traves de la URL) y el estado de la consulta. También se ejecuta el método local 'added()'.
          if (res.data.status == 'redirect') {
            this.$router.push({
              path: res.data.text,
              query: { added: 'true' }
            });
            this.added();
          }
          
          // Si el controlador envía un estado de success en la validación por parte del servidor
          if (res.data.status == 'success') {
              this.$store.commit('snackbar', res.data);
          }
        });
      },
      added() {
        // Si el estado de la consulta es de aceptado
        if (this.$router.history.current.query.added == 'true') {
          this.$store.commit('snackbar', {
            status: 'success',
            text: 'La categoría de posts ha sido agregada.'
          });
        }
      }
    }
  }
</script>
