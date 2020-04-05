<template>
    <v-container fluid>
        <v-card>
            <v-row>
                <v-col>
                    <v-card dense flat  class="pl-5 pr-5">
                        <v-toolbar dense elevation="2">
                            <v-toolbar-title class="subtitle-2">
                                <v-icon class="blue--text text--lighten-2">mdi-flash</v-icon>
                                Rechercher une technologie
                            </v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-col cols="7">
                                <v-autocomplete
                                        dark
                                        v-model="selected"
                                        :loading="loading"
                                        :items="technologies"
                                        :search-input.sync="searchTechno"
                                        cache-items
                                        dense
                                        item-value="id"
                                        item-text="technoName"
                                        solo-inverted
                                        @change="onSearchTechno(selected.id)"
                                        return-object/>
                            </v-col>
                            <v-container fluid v-if="selected">
                                <v-card dense flat>
                                <v-card-title class="primary--text p-0">
                                    <span class="subtitle-2"> -> {{selected.technoName}} (id {{selected.id}})</span>
                                </v-card-title>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-subtitle>Description :</v-list-item-subtitle>
                                        <v-list-item class="caption">{{selected.technoDesc}}</v-list-item>
                                        <v-list-item-subtitle class="pt-2 primary--text">Projets utilisants cette technologie :
                                        </v-list-item-subtitle>
                                        <v-chip-group mandatory class="primary--text"
                                                      v-for="techno in selected.project"
                                                      :key="techno.id">
                                            <v-chip class="ma-2">
                                                <a :href="`/project/${techno.id}`">{{techno.projectName}}</a>
                                            </v-chip>
                                        </v-chip-group>
                                    </v-list-item-content>
                                </v-list-item>
                                </v-card>
                                <v-row>
                                    <div class="flex-grow-1"></div>
                                    <v-btn class="mx-2" x-small fab  @click="closeTechno" elevation="1">
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>
<script>

    import Api from "../../class/ApiAxios";

    export default {
        name: "SearchTechno",
        data() {
            return {
                technologies: [],
                searchResult: [],
                selected: null,
                searchTechno: null,
                loading: false
            };
        },
        computed: {},
        watch: {
            searchTechno(val) {
                val && val !== this.selected && this.querySelections(val)
            },
        },
        methods: {
            querySelections() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false
                }, 500)
            },
            closeTechno() {
                this.selected = null;
                this.searchResult = [];
            },
            onSearchTechno(selected) {
                this.searchResult = [];
                if (selected) {
                    Api()
                        .get('technologies/' + selected)
                        .then(response => console.log(response.data))
                        .catch(
                            error => (this.searchResult = `Error! Could not reach the API. ${error}`)
                        );
                }
            },
        },
        created() {
            Api()
                .get('technologies')
                .then(response => this.technologies = response.data)
                .catch(
                    error => (this.technologies = `Error! Could not reach the API. ${error}`)
                );
        }
    };
</script>
<style>

</style>
