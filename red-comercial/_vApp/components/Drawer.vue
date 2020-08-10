<template>
    <v-navigation-drawer expand-on-hover height="auto" permanent id="_mainDrawer">
      <template v-slot:prepend>
        <v-list class="py-0" id="_logo">

          <v-list-item link two-line>
            <v-list-item-content>
              <v-list-item-title class="title _900">Dashboard</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </template>

      <v-divider></v-divider>

      <v-list nav id="_sideList" dense>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.icons"
            :append-icon="item.model ? arrowUp : arrowDown"
          >
            <template v-slot:activator>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    {{ item.text }}
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>
            
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
              color="red"
              :to="child.link"
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>

              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>

            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            link
            color="red"
            :to="item.link"
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
  data () {
    return {
      arrowDown : 'mdi-chevron-down',
      arrowUp : 'mdi-chevron-up',
      items: [

        {
          // Mis micrositios
          icon: 'mdi-web',
          text: 'Mis empresas',
          link: '/empresas',
          model: false,
          children: null
        },
        {
          // Páginas del micrositio
          icon: 'mdi-view-list',
          text: 'Páginas',
          link: '/pages',
          model: false,
          children: null,
        },
        { 
          // Post y categorías
          icons: 'mdi-blogger',
          text: 'Blog',
          model: false,
          children: [
            { 
                icon: 'mdi-pencil-box-outline',
                text: 'Posts',
                link: '/posts'
            },
            { 
                icon: 'mdi-label',
                text: 'Categorías',
                link: '/blog/category'
            }
          ]
        },
        { 
          // Productos y categorías
          icons: 'mdi-store',
          text: 'Comercio',
          model: false,
          children: [
            { 
                icon: 'mdi-post',
                text: 'Productos',
                link: '/products'
            },
            { 
                icon: 'mdi-label',
                text: 'Categorías',
                link: '/product/category'
            }
          ]
        }

      ]
    }
  }
}
</script>

