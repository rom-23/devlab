<template>
    <div class="parallax4">
        <v-row>
            <v-col cols="12" sm="6" md="4">
                <v-card flat class="transparent">
                    <v-card-text class="text-center mt-0 pt-0">
                        <v-icon x-large class="blue--text text--lighten-2">mdi-semantic-web</v-icon>
                    </v-card-text>
                    <v-card-title class="layout justify-center">
                        <div class="headline text-center">Création de sites / Applications Web</div>
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
                    <v-card-actions>
                        <v-container class="p-0 m-0 text-center">
                        <v-btn icon large @click="show = !show" color="primary">
                            <v-icon>{{ show ? 'mdi-arrow-up-bold-circle-outline' : 'mdi-arrow-down-drop-circle-outline' }}
                            </v-icon>
                        </v-btn>
                        <v-expand-transition>
                            <div v-show="show">
                                <v-card-text>I'm a thing. But, like most politicians, he promised more than he could
                                    deliver. You won't have time for sleeping, soldier, not with all the bed making
                                    you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                                    to that or we walk! You're going to do his laundry? I've got to find a way to
                                    escape.
                                </v-card-text>
                            </div>
                        </v-expand-transition>
                        </v-container>
                    </v-card-actions>
                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-card flat class="transparent">
                    <v-card-text class="text-center mt-0 pt-0">
                        <v-icon x-large class="blue--text text--lighten-2">mdi-database</v-icon>
                    </v-card-text>
                    <v-card-title class="layout justify-center">
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
                    <v-card-actions>
                        <v-container class="p-0 m-0 text-center">
                            <v-btn icon large @click="show2 = !show2" color="primary">
                                <v-icon>{{ show2 ? 'mdi-arrow-up-bold-circle-outline' : 'mdi-arrow-down-drop-circle-outline' }}
                                </v-icon>
                            </v-btn>
                            <v-expand-transition>
                                <div v-show="show2">
                                    <v-card-text>I'm a thing. But, like most politicians, he promised more than he could
                                        deliver. You won't have time for sleeping, soldier, not with all the bed making
                                        you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                                        to that or we walk! You're going to do his laundry? I've got to find a way to
                                        escape.
                                    </v-card-text>
                                </div>
                            </v-expand-transition>
                        </v-container>
                    </v-card-actions>
                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-card flat class="transparent">
                    <v-card-text class="text-center mt-0 pt-0">
                        <v-icon x-large class="blue--text text--lighten-2">mdi-webpack</v-icon>
                    </v-card-text>
                    <v-card-title class="layout justify-center">
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
                    <v-card-actions>
                        <v-container class="p-0 m-0 text-center">
                            <v-btn icon large @click="show3 = !show3" color="primary">
                                <v-icon>{{ show3 ? 'mdi-arrow-up-bold-circle-outline' : 'mdi-arrow-down-drop-circle-outline' }}
                                </v-icon>
                            </v-btn>
                            <v-expand-transition>
                                <div v-show="show3">
                                    <v-card-text>I'm a thing. But, like most politicians, he promised more than he could
                                        deliver. You won't have time for sleeping, soldier, not with all the bed making
                                        you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                                        to that or we walk! You're going to do his laundry? I've got to find a way to
                                        escape.
                                    </v-card-text>
                                </div>
                            </v-expand-transition>
                        </v-container>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>
<script>
    export default {
        name: 'Profil',
        data() {
            return {
                show: false,
                show2: false,
                show3: false,
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
