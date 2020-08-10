<template>
    <!-- Cabecera del sitio para visitantes -->
    <!-- ======= Header ======= -->
    <v-app-bar absolute color="primary" dark>
        <v-row class="align-center">
            
            <v-col cols="2">
                <v-toolbar-title>
                    <span>Red Comercial</span>
                </v-toolbar-title>
            </v-col>

            <v-col cols="10">
                <v-tabs right color="white" background-color="transparent">
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