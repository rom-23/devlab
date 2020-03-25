<template>
    <v-container fluid>
        <v-app>
            <Experience/>
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
        </v-app>
    </v-container>
</template>
<script>
import request from '../class/ApiCall.js';
import Experience from "./Experience";
    export default {
        name: 'Profil',
        components: {Experience},
        data() {
            return {
                urlToCall: "/apip/projects",
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
            fetch(request('projects'))
                .then(response => {
                    if (response.ok) {
                        response.json().then(data =>
                            this.projectList = data["hydra:member"])
                    } else {
                        throw Error(response.statusText);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
        },
    };
</script>


