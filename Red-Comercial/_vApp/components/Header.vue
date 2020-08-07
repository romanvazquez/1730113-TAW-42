<template>
    <v-app-bar
      color="#fff"
      flat
      light
      height="64px"
      max-height="64px"
      id="_mainAppBar"
    >
      <div class="flex align-center">
          <!-- Título de la cabecera -->
          <v-toolbar-title v-text="heading"></v-toolbar-title>
          <!-- Descripción -->
          <div class="ml-5" v-if="caption">
              <small class="caption">(Showing {{ caption }})</small>
          </div>
      </div>

      <div class="flex-grow-1"></div>

      <div id="_metas_other" class="flex align-center flex-end">
        <slot>
            <v-btn icon>
              <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon>
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
        </slot>
      </div>

      <!-- Menú superior derecho de lista -->
      <v-menu left bottom >
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item :href="'/' + ADMIN_API_ROUTE + '/logout'">
            <v-list-item-title>Cerrar sesión</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
        <v-progress-linear
            :active="$store.state.loading"
            :indeterminate="$store.state.loading"
            absolute
            bottom
            color="info"
        ></v-progress-linear>
    </v-app-bar>
</template>

<script>
export default {
    props: {
      heading: {},
      caption: {},
      user: null,
    },
    data () {
        return {
          ADMIN_API_ROUTE: ADMIN_API_ROUTE
        }
    },
    created () {
    },
}
</script>
