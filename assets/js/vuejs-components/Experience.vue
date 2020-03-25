<template>
    <v-container fluid class="con" id="experiences">
        <v-row>
            <v-col cols="12" sm="6" md="6">
                <v-card flat class="transparent">
                    <v-card-text class="text-center">
                        <v-icon x-large class="blue--text text--lighten-2">mdi-tools</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-center">Création de sites internet et applications</div>
                    </v-card-title>
                    <v-card-text>
                        <v-list-item two-line dense>
                            <v-list-item-content>
                                <v-list-item-title class="pb-2">Projects</v-list-item-title>
                                <!--                                <v-list-item-subtitle-->
                                <!--                                        v-for="cycleculture in searchResult"-->
                                <!--                                        :key="cycleculture.id">-->
                                <!--                                    <span>{{cycleculture.projectName}}</span>-->
                                <!--                                </v-list-item-subtitle>-->
                                mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames Nullam in aliquet odio. Aliquam mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. Pellentesque habitant morbi tristique senectus et netus et turpis egestas. Nullam in aliquet odio. Aliquam Nullam in aliquet odio. Aliquam Nullam in aliquet odio. Aliquam
                            </v-list-item-content>
                        </v-list-item>

                    </v-card-text>
                    <v-card-subtitle class="text-center">
                        <div class="my-2">
                            <v-btn color="primary">Découvrir</v-btn>
                        </div>
                    </v-card-subtitle>
                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="6">
                <v-card flat class="transparent">
                    <v-card-text class="text-center">
                        <v-icon x-large class="blue--text text--lighten-2">mdi-web</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-center">Développeur Front-end / Back-end</div>
                    </v-card-title>
                    <v-card-text>
                        mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                        Nullam in aliquet odio. Aliquam
                        mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                        Pellentesque habitant morbi tristique senectus et netus et turpis egestas.
                        Nullam in aliquet odio. Aliquam Nullam in aliquet odio. Aliquam Nullam in aliquet
                        odio. Aliquam
                    </v-card-text>
                    <v-card-subtitle class="text-center">
                        <div class="my-2">
                            <v-btn color="primary">En savoir plus</v-btn>
                        </div>
                    </v-card-subtitle>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    export default {
        name: 'Experience',
        data() {
            return {
                searchResult: [],
            };
        },
        methods: {},
        created() {

        },
    };


</script>

<style scoped>
</style>
