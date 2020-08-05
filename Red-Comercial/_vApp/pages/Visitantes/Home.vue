<template>
    <div>
        <VisitanteAppBar/>

        <div id="main">
            <ShopMap/>
        </div>

        <VisitanteFooter/>
    </div>
</template>
<script>
export default {
    beforeCreate () {
        this.$store.commit('setDrawerVisibility', false);

        this.$axiosx.get('/empresario/check/login')
        .then((res) => {

            if (res.data.status == 'success') {
                
                this.$store.commit('setDrawerVisibility', true);
                this.$router.push('/pages')
            }
        })
    },   
}
</script>