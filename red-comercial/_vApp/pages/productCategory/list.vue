<template>
    <div>
        <Header heading="Categorías de productos">
            <v-btn to="/product/category/add" color="info">
                <v-icon left>mdi-view-list</v-icon>Agregar
            </v-btn>
        </Header>
        <Listing endpoint="/product/category" slug="/product/category" component="product_category">
        </Listing>
    </div>
</template>

<script>
export default {
    data () {
        return {
            obj: [],
            slug: '/product/category',
            totalPage: null
        }
    },
    beforeCreate () {

    },
}
</script>