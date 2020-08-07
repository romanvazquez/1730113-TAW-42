<template>
    <div>
        <Header heading="Empresas">
            <v-btn to="/empresa/add" color="info">
                <v-icon left>mdi-view-list</v-icon>Agregar
            </v-btn>
        </Header>
        
        <Listing endpoint="/empresa" slug="/empresa" component="empresa"></Listing>
    </div>
</template>

<script>
export default {
    data () {
        return {
            obj: [],
            slug: '/empresa',
            totalPage: null
        }
    }
}
</script>
