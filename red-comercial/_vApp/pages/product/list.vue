<template>
    <div>
        <Header heading="Productos">
            <v-btn to="/product/add" color="info">
                <v-icon left>mdi-view-list</v-icon>Agregar
            </v-btn>
        </Header>
        <Listing endpoint="/product" slug="/product" component="product">
        </Listing>
    </div>
</template>

<script>
export default {
    data () {
        return {
            obj: [],
            slug: '/product',
            totalPage: null
        }
    }
}
</script>
