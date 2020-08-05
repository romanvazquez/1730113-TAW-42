<template>
    <div>
        <v-form id="pageAdd" ref="pageAdd" @submit.prevent="pageAdd" autocomplete="nope">
            <Header
              :heading="getHeading()"
            >
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

                <v-btn
                    min-width="130px"
                    color="success"
                    class="mr-5"
                    type="submit"
                    :loading="$store.state.loading"
                >
                    <v-icon left>mdi-content-save-outline</v-icon>
                    Guardar
                </v-btn>
                <v-btn
                    to="/pages"
                    color="info"
                >
                    <v-icon left>mdi-view-list</v-icon>
                    Ver páginas
                </v-btn>
            </Header>

            <v-card class="full">
                 <v-tabs
                   background-color="white"
                   color="info accent-4"
                   left
                 >
                 <v-tab>Información</v-tab>
                 <v-tab>SEO</v-tab>
                 <v-tab-item class="pa-5" :eager="true">
                   <v-text-field
                     v-model="page.name"
                     label="Título*"
                     name="name"
                     required
                     :rules="validateRules"
                     autocomplete="nope"
                   ></v-text-field>

                   <v-text-field
                     v-model="page.url"
                     label="Url*"
                     type="text"
                     required
                     :rules="validateRules"
                     name="url"
                     autocomplete="nope"
                   ></v-text-field>

                   <Textarea
                       autocomplete="nope"
                       outlined
                       label="Contenido"
                       name="content"
                       :value="page.content"
                   ></Textarea>

                 </v-tab-item>

              <v-tab-item class="pa-5" :eager="true">
                <SEO :meta="page">
                </SEO>
              </v-tab-item>
            </v-tabs>
          </v-card>
      </v-form>
    </div>
</template>
<script>
  export default {
    beforeCreate() {
      var url = '/page/add';
      if (this.$router.history.current.params && this.$router.history.current.params.id) {
        url = '/page/edit/' + this.$router.history.current.params.id;
      }
      return this.$axiosx.get(url)
      .then((res) => {
        this.page = res.data.page;
      });
    },
    data () {
      return {
        page: [],
        validateRules: [
          v => !!v || 'Este campo es obligatorio'
        ],
        emailRules: [
          v => !!v || 'La dirección de correo electrónico es obligatoria',
          v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ]
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
        getHeading () {
            if (this.page && this.page.name) {
                  return 'Page: ' + this.page.name;
            }

            return 'Agregar página';
        },
      pageAdd () {
          if (this.$refs.pageAdd.validate() == false) {
              this.$store.commit('snackbar', {
                status: 'error',
                text: 'Existen campos vacíos o no válidos. Por favor, ingrese los datos correctamente.'
              });
              return true;
          }
        var fd = new FormData(this.$refs.pageAdd.$el);
        this.dialog = true;
        var url = '/page/add';
        
        if (this.$router.history.current.params && this.$router.history.current.params.id) {
          url = '/page/edit/' + this.$router.history.current.params.id;
        }
        this.$axiosx.post(url, fd).then((res) => {
          if (res.data.status == 'error') {
            this.$store.commit('snackbar', res.data);
          }

          if (res.data.status == 'redirect') {
            this.$router.push({
              path: res.data.text,
              query: { added: 'true' }
            });
            this.added();
          }
          if (res.data.status == 'success') {
              this.$store.commit('snackbar', res.data);
          }
        });
      },
      added() {
        if (this.$router.history.current.query.added == 'true') {
          this.$store.commit('snackbar', {
            status: 'success',
            text: 'La página ha sido agregada satisfactoriamente.'
          });
        }
      }
    }
  }
</script>
