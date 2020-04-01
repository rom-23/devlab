<template>
    <v-container fluid>
        <v-card>
            <v-row>
                <v-col>
                    <v-card dense class="pl-5 pr-5" flat>
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
                            <v-container class="mt-0 pt-0" v-if="selected">
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-subtitle>Id : {{selected.id}}</v-list-item-subtitle>
                                        <v-list-item-subtitle>Nom : {{selected.technoName}}</v-list-item-subtitle>
                                        <v-list-item-subtitle class="pt-2">Description :</v-list-item-subtitle>
                                        <v-list-item class="caption">{{selected.technoDesc}}</v-list-item>
                                        <v-list-item-subtitle class="pt-2">Projets utilisant cette technologie :
                                        </v-list-item-subtitle>
                                        <v-list-item class="caption" v-for="list in selected.project" :key="list.id">
                                            <a :href="`/project/${list.id}`">{{list.projectName}}</a>
                                        </v-list-item>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-row align="center">
                                    <v-col align="end">
                                        <v-btn small class="text-lowercase ml-4" @click="closeTechno">close</v-btn>
                                    </v-col>
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
