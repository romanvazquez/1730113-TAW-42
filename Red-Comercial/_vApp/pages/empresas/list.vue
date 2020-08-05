<template>
    <div>
        <Header heading="Empresas">
            <v-btn to="/empresas/add" color="info">
                <v-icon left>mdi-view-list</v-icon>Agregar nueva
            </v-btn>
        </Header>
        
        <Listing endpoint="/empresas" slug="/empresas" component="empresas"></Listing>
    </div>
</template>

<script>
export default {
    data () {
        return {
            obj: [],
            slug: '/empresas',
            totalPage: null
        }
    }
}
</script>
