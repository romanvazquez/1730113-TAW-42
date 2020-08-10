<template>
    <div>
        <v-form id="producttAdd" ref="productAdd" @submit.prevent="productAdd" autocomplete="nope">
            <Header :heading="getHeading()">
                <v-switch
                  hide-details
                  class="mr-8"
                  v-model="product.published"
                  inset
                  name="published"
                  :label="!product.published ? 'Borrador' : 'Publicado'"
                  color="success"
                  :value="product.published"
                ></v-switch>
                
                <v-btn color="success" class="mr-5" type="submit" :loading="$store.state.loading">
                    <v-icon left>mdi-content-save-outline</v-icon>Guardar
                </v-btn>
                <v-btn to="/products" color="info">
                    <v-icon left>mdi-view-list</v-icon>Ver productos
                </v-btn>
            </Header>

            <v-row wrap>
                <v-col cols="12" sm="12" md="9" lg="9" xl="9">
                    <v-card class="full">
                        <v-tabs background-color="white" color="info accent-4" left>
                            <v-tab>Información</v-tab>
                            <v-tab>SEO</v-tab>
                            <v-tab-item class="pa-5" :eager="true">
                                <div class="full">

                                    <!-- Detalles de la publicación -->
                                    <v-text-field type="text" label="Título*" v-model="product.title" name="title" :rules="validateRules" autocomplete="nope" required></v-text-field>

                                    <v-text-field type="text" label="Url*" v-model="product.url" name="url" :rules="validateRules" autocomplete="nope" required></v-text-field>

                                    <!-- Detalles del producto -->
                                    <v-row>
                                        <v-col cols="12" sm="3">
                                            <v-text-field type="text" label="Código de producto*" required v-model="product.codigo_producto" name="codigo"></v-text-field>
                                        </v-col>

                                        <v-col cols="12" sm="3">
                                            <v-text-field type="number" label="Precio*" required v-model='product.precio_max' name="precio_max"></v-text-field>
                                        </v-col>

                                        <v-col cols="12" sm="3">
                                            <v-text-field type="number" label="Cantidad Stock*" required v-model='product.stock' name="stock"></v-text-field>
                                        </v-col>

                                        <v-col cols="12" sm="3">
                                            <v-switch hide-details v-model="product.stock_satus" inset :label="!product.stock_satus ? 'Disponible' : 'No disponible'" color="success" :value="product.stock_satus" name="stock_satus"></v-switch>
                                        </v-col>
                                    </v-row>

                                    <Textarea autocomplete="nope" outlined label="Contenido" :value="product.content" name="content">
                                    </Textarea>
                                </div>
                            </v-tab-item>

                            <v-tab-item class="pa-5" :eager="true">
                                <SEO :meta="product">
                                </SEO>
                            </v-tab-item>
                        </v-tabs>

                    </v-card>
                </v-col>

                <v-col cols="12" sm="12" md="3" lg="3" xl="3">
                    <div class="justify-center" >
                        <v-expansion-panels accordion v-model="panel">

                            <v-expansion-panel class="_collapse">
                                <v-expansion-panel-header>Fecha de publicación</v-expansion-panel-header>
                                <v-expansion-panel-content :eager="true">
                                    <v-date-picker v-model="product.post_date" color="green lighten-1"></v-date-picker>
                                    <input type="hidden" :value="product.post_date" name="post_date"/>
                                </v-expansion-panel-content>
                            </v-expansion-panel>

                            <v-expansion-panel class="_collapse">
                                <v-expansion-panel-header>Categorías</v-expansion-panel-header>
                                <v-expansion-panel-content :eager="true">
                                
                                <v-checkbox
                                    v-for="(cat, i) in product.category"
                                    :key="i"
                                    hide-details
                                    :value="cat.id"
                                    name="category[]"
                                    v-model="product.selected_category"
                                    :label="cat.name"
                                ></v-checkbox>

                                </v-expansion-panel-content>
                            </v-expansion-panel>

                            <v-expansion-panel>
                            <v-expansion-panel-header>Media</v-expansion-panel-header>
                            <v-expansion-panel-content :eager="true">
                                <File
                                    block
                                    cls="_block"
                                    :value="product.image"
                                    text="Seleccione una imagen"
                                    name="id_media"
                                    :multiple="false"
                                ></File>
                            </v-expansion-panel-content>
                            </v-expansion-panel>

                        </v-expansion-panels>
                    </div>
                </v-col>
            </v-row>
        </v-form>
    </div>
</template>
<script>
  export default {
    beforeCreate() {

      var url = '/product/add';

      if (this.$router.history.current.params && this.$router.history.current.params.id) {
        url = '/product/edit/' + this.$router.history.current.params.id;
      }

      return this.$axiosx.get(url)
      .then((res) => {
          this.product = res.data.product;
          if (this.product.display_home) {
            this.product.display_home == true;
          }

          if (this.product.main_product) {
            this.product.main_product == true;
          }

          console.log(res.data.product);

      });
    },
    data () {
      return {
        product: [],
        panel:0,
        validateRules: [
          v => !!v || 'Este campo es obligatorio.'
        ],
      }
    },
    watch : {
      '$route.query.added' : function (val) {
          this.getData();
      }
    },
    methods: {
        getName (val) {
            console.log(val);
        },
        getID (val) {
            console.log(val);

        },

      getData () {
        if (this.$route.params && this.$route.params.id) {
              var url = '/product/edit/' + this.$route.params.id;
              return this.$axiosx.get(url)
              .then((res) => {
                  this.product = res.data.product;
              });
          }
      },
      getHeading () {
          if (this.product && this.product.title) {
                return this.product.title;
          }

          return 'Agregar Producto';
      },
      productAdd () {
        if (this.$refs.productAdd.validate() == false) {
                this.$store.commit('snackbar', {
                  status: 'error',
                  text: 'Proporcione los campos obligatorios.'
                });
                return true;
        }
        var fd = new FormData(this.$refs.productAdd.$el);
        this.dialog = true;

        for (var pair of fd.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }

        var url = '/product/add';

        if (this.$router.history.current.params && this.$router.history.current.params.id) {
          url = '/product/edit/' + this.$router.history.current.params.id;
        }
        this.$axiosx.post(url, fd).then((res) => {
          if (res.data.status == 'error') {
            this.$store.commit('snackbar', res.data);
            this.dialog = false;
          }

          if (res.data.status == 'redirect') {
            this.$router.push({
              path: res.data.text,
              query: { added: 'true' }
            });
            this.dialog = false;
            this.addedManufacturer();
          }
          if (res.data.status == 'success') {
              this.$store.commit('snackbar', res.data);
              this.dialog = false;
          }
        });
      },
      addedManufacturer() {
        if (this.$router.history.current.query.added == 'true') {
          this.$store.commit('snackbar', {
            status: 'success',
            text: 'El producto ha sido agregado.'
          });
        }
      }
    }
  }
</script>
