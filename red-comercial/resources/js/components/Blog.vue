<template>
    <div>
        <v-container>
        <p class="display-3 font-weight-light text-center pa-4">Read About Fashion</p>
            <v-row>
            <v-col cols="12" sm="4" md="4" lg="4" xl="4">
                <v-card class="mx-auto" max-width="400" outlined tile href="/post">
                <v-img class="white--text align-end" height="400px" :src="require('../../../public/img/home/slider2.jpg')">
                    <v-card-title>Top 10 Fashion of the Week</v-card-title>
                </v-img>
                <v-card-subtitle class="pb-0">Lorem ipsum</v-card-subtitle>
                <v-card-text class="text--primary">
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh venenatis cras sed felis eget velit aliquet sagittis id. Enim praesent elementum facilisis leo vel fringilla est ullamcorper.</div>
                </v-card-text>

                <v-card-actions>
                    <v-btn color="orange" text>
                    Leer más
                    </v-btn>
                </v-card-actions>
                </v-card>
            </v-col>
            
            <v-col cols="12" sm="4" md="4" lg="4" xl="4">
                <v-card class="mx-auto" max-width="400" outlined tile href="/post">
                <v-img class="white--text align-end" height="400px" :src="require('../../../public/img/home/slider3.jpg')">
                    <v-card-title>Best brands for fashion</v-card-title>
                </v-img>

                <v-card-subtitle class="pb-0">Lorem ipsum</v-card-subtitle>
                <v-card-text class="text--primary">
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh venenatis cras sed felis eget velit aliquet sagittis id. Enim praesent elementum facilisis leo vel fringilla est ullamcorper.</div>
                </v-card-text>

                <v-card-actions>
                    <v-btn color="orange" text>
                    Leer más
                    </v-btn>
                </v-card-actions>
                </v-card>
            </v-col>

            
            <v-col cols="12" sm="4" md="4" lg="4" xl="4">
                <v-card class="mx-auto" max-width="400" outlined tile href="/post">
                <v-img class="white--text align-end" height="400px" :src="require('../../../public/img/home/slider4.jpg')">
                    <v-card-title>Fashion Tips & Tricks</v-card-title>
                </v-img>

                <v-card-subtitle class="pb-0">Lorem ipsum</v-card-subtitle>

                <v-card-text class="text--primary">
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh venenatis cras sed felis eget velit aliquet sagittis id. Enim praesent elementum facilisis leo vel fringilla est ullamcorper.</div>
                </v-card-text>

                <v-card-actions>
                    <v-btn color="orange" text>
                    Leer más
                    </v-btn>
                </v-card-actions>
                </v-card>
            </v-col>

            </v-row>
        </v-container>
    </div>
</template>
<script>

export default {
}
</script>