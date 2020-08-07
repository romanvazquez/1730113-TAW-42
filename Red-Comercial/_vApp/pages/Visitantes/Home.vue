<template>
    <div>
        <VisitanteAppBar />

        <div id="main">
            <ShopMap />
        </div>

        <VisitanteFooter />
    </div>
</template>
<script>
export default {
    beforeCreate() {
        // Deshabilita la visibilidad de la Sidebar en esta página
        this.$store.commit("setDrawerVisibility", false);

        // Verifica que los usuarios o bien sean visitantes o tengan una sesión activa
        this.$axiosx.get("/empresario/check/login").then(res => {
            if (res.data.status == "success") {
                this.$store.commit("setDrawerVisibility", true);
                this.$router.push("/pages");
            }
        });
    }
};
</script>
