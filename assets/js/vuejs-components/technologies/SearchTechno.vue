<template>
    <v-container fluid>
        <v-card>
            <v-toolbar dense color="#c9593a">
                <v-icon color="white">mdi-file-search-outline</v-icon>
                <v-toolbar-title class="subtitle-2 ml-4 white--text">Rechercher sur le site</v-toolbar-title>
                <v-spacer/>
            </v-toolbar>
            <v-row>
                <v-col>
                    <v-card dense flat>
                        <v-card-title>
                            <span class="subtitle-1">Liste des projets</span>
                            <v-spacer/>
                            <v-text-field
                                    v-model="search_project"
                                    append-icon="mdi-magnify"
                                    label="Trouver un projet"
                                    single-line
                                    hide-details/>
                        </v-card-title>
                        <v-data-table class="datatable"
                                      :headers="headers"
                                      :items="projectList"
                                      :search="search_project"
                                      return-object
                                      @click:row="handleClick">
                        </v-data-table>
                    </v-card>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-card dense class="mt-5 pa-5" flat>
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
                                        :search-input.sync="search"
                                        cache-items
                                        dense
                                        item-value="id"
                                        item-text="technoName"
                                        solo-inverted
                                        @change="onSearchCulture(selected.id)"
                                        return-object/>
                            </v-col>
                            <v-container class="mt-0 pt-0" v-if="selected">
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-subtitle>Id : {{selected.id}}</v-list-item-subtitle>
                                        <v-list-item-subtitle>Nom : {{selected.technoName}}</v-list-item-subtitle>
                                        <v-list-item-subtitle class="pt-2">Description :</v-list-item-subtitle>
                                        <v-list-item class="caption">{{selected.technoDesc}}</v-list-item>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-row align="center">
                                    <v-col align="end">
                                        <v-btn small class="text-lowercase ml-4"><a
                                                :href="`/technology/${selected.id}`">voir</a></v-btn>
                                        <v-btn small class="text-lowercase ml-4" @click="resetForm">close</v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
            <v-card-actions>
                <div class="flex-grow-1"></div>
                <v-btn icon class="grey" @click="show = !show">
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
            </v-card-actions>
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
                projectList: [],
                search_project: '',
                headers: [
                    {
                        text: 'id',
                        align: 'start',
                        sortable: true,
                        value: 'id',
                    },
                    {text: 'Nom du projet', value: 'projectName'},
                    {text: 'Description', value: 'projectDesc'},
                    {text: 'Crée le', value: 'createdAt'}
                ],
                searchResult: [],
                test: [],
                selected: null,
                show: false,
                search: null,
                loading: false
            };
        },
        computed: {},
        watch: {
            search(val) {
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
            resetForm() {
                this.selected = null;
                this.searchResult = [];
            },
            handleClick(value) {
                location.href = "/project/" + value.id;
            },
            onSearchCulture(selected) {
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
            Api()
                .get('projects')
                .then(response => this.projectList = response.data)
                .catch(
                    error => (this.projectList = `Error! Could not reach the API. ${error}`)
                );
        }
    };
</script>
<style>

</style>
