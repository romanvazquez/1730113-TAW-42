<template>
    <!-- Cabecera del sitio para visitantes -->
    <!-- ======= Header ======= -->
    <v-app-bar absolute color="primary" dark>
        <v-row class="justify-content-center">
            <v-col cols="2" sm="3" md="3" lg="3" xl="3">
                <v-toolbar-title style="width: 250px">
                    <a href="/" class="white--text" style="text-decoration: none">Red Comercial</a>
                </v-toolbar-title>
            </v-col>

            <v-col cols="10" sm="9" md="9" lg="9" xl="9">
                <v-tabs dark background-color="primary" grow>
                    <v-row>
                        <v-tab to="/">
                            Inicio
                        </v-tab>

                        <v-tab to="about">
                            Acerca de nosotros
                        </v-tab>

                        <v-tab to="/afiliate">
                            Afíliate
                        </v-tab>

                        <v-tab to="/register/empresario">
                            Regístrate
                        </v-tab>

                        <v-tab to="/login">
                            <v-btn icon>
                                <v-icon>mdi-login</v-icon>
                            </v-btn>
                        </v-tab>
                    </v-row>
                </v-tabs>
            </v-col>
        </v-row>
    </v-app-bar>
</template>
<script>
export default {
    name: 'VisitanteAppBar'
}
</script>
