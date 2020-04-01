<template>
    <v-container fluid>
        <v-card>
            <v-row>
                <v-col>
                    <v-card dense class="pl-5 pr-5" flat>
                        <v-toolbar dense elevation="2">
                            <v-toolbar-title class="subtitle-2">
                                <v-icon class="blue--text text--lighten-2">mdi-flash</v-icon>
                                Rechercher un outils
                            </v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-col cols="7">
                                <v-autocomplete
                                        dark
                                        v-model="selectedTools"
                                        :items="toolsList"
                                        :search-input.sync="searchTool"
                                        cache-items
                                        dense
                                        item-value="id"
                                        item-text="toolName"
                                        solo-inverted
                                        @change="onSearchTool(selectedTools.id)"
                                        return-object/>
                            </v-col>
                            <v-container class="mt-0 pt-0" v-if="selectedTools">
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-subtitle>Id : {{selectedTools.id}}</v-list-item-subtitle>
                                        <v-list-item-subtitle>Nom : {{selectedTools.toolName}}</v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-row align="center">
                                    <v-col align="end">
                                        <v-btn small class="text-lowercase ml-4" @click="closeTool">close</v-btn>
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
        name: "SearchTool",
        data() {
            return {
                toolsList: [],
                selectedTools: null,
                searchResult: [],
                searchTool: null,
                loading: false
            };
        },
        computed: {},
        watch: {
            searchTool(val) {
                val && val !== this.selectedTools && this.querySelections(val)
            },
        },
        methods: {
            querySelections() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false
                }, 500)
            },
            closeTool() {
                this.selectedTools = null;
                this.searchResult = [];
            },
            onSearchTool(selectedTools) {
                this.searchResult = [];
                if (selectedTools) {
                    Api()
                        .get('tools/' + selectedTools)
                        .then(response => console.log(response.data))
                        .catch(
                            error => (this.searchResult = `Error! Could not reach the API. ${error}`)
                        );
                }
            },
        },
        created() {
            Api()
                .get('tools')
                .then(response => this.toolsList = response.data)
                .catch(
                    error => (this.toolsList = `Error! Could not reach the API. ${error}`)
                );
        }
    };
</script>
<style>

</style>
