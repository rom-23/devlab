<template>
    <v-container fluid>
        <v-card>
            <v-toolbar dense color="#c9593a">
                <v-icon color="white">mdi-file-search-outline</v-icon>
                <v-toolbar-title class="subtitle-2 ml-4 white--text">Rechercher sur le site</v-toolbar-title>
                <v-spacer/>
            </v-toolbar>
            <v-card dense flat>
                <v-card-title>
                    <v-col cols="5">
                        <v-text-field dense
                                      v-model="searchProject"
                                      prepend-inner-icon="mdi-magnify"
                                      label="Trouver un projet"
                                      single-line
                                      hide-details/>
                    </v-col>
                </v-card-title>
                <v-data-table dense class="datatable"
                              :headers="headers"
                              :items="projectList"
                              :search="searchProject"
                              return-object
                              @click:row="handleClick">
                </v-data-table>
                <v-container  v-if="projectDetails">
                    <v-card>
                        <v-card-title class="primary--text">
                            <span class="subtitle-2">Fiche du projet -> {{projectDetails.projectName}} (id {{projectDetails.id}})</span>
                        </v-card-title>
                        <v-card-text class="text-center">
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item class="caption">{{projectDetails.projectDesc}}</v-list-item>
                                <v-list-item-subtitle>Technologies utilisées :</v-list-item-subtitle>
                                <v-chip-group mandatory class="primary--text"
                                              v-for="listTechno in projectDetails.technologies"
                                              :key="listTechno.tecnhoName">
                                    <v-chip class="ma-2">
                                        <a :href="`/technology/${listTechno.id}`">{{listTechno.technoName}}</a>
                                    </v-chip>
                                </v-chip-group>
                                <v-list-item-subtitle>Outils utilisés :</v-list-item-subtitle>
                                <v-chip-group mandatory active-class="primary--text"
                                              v-for="listTools in projectDetails.tools"
                                              :key="listTools.toolName">
                                    <v-chip class="ma-2">
                                        <a :href="`/tools/${listTools.id}`">{{listTools.toolName}}</a>
                                    </v-chip>
                                </v-chip-group>
                            </v-list-item-content>
                        </v-list-item>

                        <v-row>
                            <div class="flex-grow-1"></div>
                            <v-btn class="mx-2" x-small fab @click="closeProject" elevation="1">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-row></v-card-text>
                    </v-card>
                </v-container>
            </v-card>
        </v-card>
    </v-container>
</template>
<script>

    import Api from "../../class/ApiAxios";

    export default {
        name: "SearchProject",
        data() {
            return {
                projectList: [],
                searchProject: '',
                headers: [
                    {
                        text: 'id',
                        align: 'start',
                        sortable: true,
                        value: 'id',
                    },
                    {text: 'Nom du projet', value: 'projectName'},
                    {text: 'Date de création', value: 'createdAt'}
                ],
                projectDetails: null,
            };
        },
        computed: {},
        methods: {
            closeProject() {
                this.projectDetails = null;
            },
            handleClick(value) {
                Api()
                    .get("projects/" + value.id)
                    .then(response => this.projectDetails = response.data)
                    .catch(
                        error => (this.projectDetails = `Error! Could not reach the API. ${error}`)
                    );
            },
        },

        created() {
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
