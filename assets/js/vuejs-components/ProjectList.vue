<template>
    <div class="parallax2">
            <v-card>
                <v-card-title>
                    Projets
                    <v-spacer></v-spacer>
                    <v-text-field
                            v-model="search"
                            append-icon="mdi-magnify"
                            label="Search"
                            single-line
                            hide-details
                    />
                </v-card-title>
                <v-data-table
                        :headers="headers"
                        :items="projectList"
                        :search="search"
                />
            </v-card>

    </div>
</template>
<script>

import Experience from "./Experience";
import Api from "../class/ApiAxios";

    export default {
        name: 'Profil',
        components: {},
        data() {
            return {
                projectList: [],
                search: '',
                headers: [
                    {
                        text: 'id',
                        align: 'start',
                        sortable: true,
                        value: 'id',
                    },
                    {text: 'Nom du projet', value: 'projectName'},
                    {text: 'Description', value: 'projectDesc'},
                    {text: 'Crée le', value: 'createdAt'},
                ],
            };
        },
        methods: {

        },
        created() {
            Api()
                .get('projects')
                .then(response => this.projectList = response.data)
                .catch(
                    error => (this.projectList =`Error! Could not reach the API. ${error}`)
                );
        },
    };
</script>


