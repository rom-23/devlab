<template>
    <div>
        <Jumbotron/>
        <v-app light>
            <v-navigation-drawer color="primary"
                    v-model="drawer"
                    app
                    clipped
                    width="300"
            >
                <v-list dense >
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>dashboard</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="secondary--text">Dashboard</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>settings</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Settings</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
            <v-app-bar
                    color="#0e9358"
                    app
                    clipped-left
            >
                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Application</v-toolbar-title>
            </v-app-bar>
            <v-content>
                <v-container
                        fluid
                        fill-height
                >
                    <v-layout
                            row
                            wrap
                    >
                        <v-flex shrink>

                            <router-view name="main"></router-view>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-footer app height="100">
                <span>Copyright © GrowUp App 3.0</span>
            </v-footer>
        </v-app>
    </div>
</template>
<script>
    import Jumbotron from './vuejs-components/Jumbotron.vue';

    import Profil from './vuejs-components/Profil.vue';
    import Navbar from './vuejs-components/Navbar.vue';

    export default {
        name: "App",
        components: {Navbar, Jumbotron},
        props: {},
        data: () => ({
            drawer: null,
        }),

        methods: {},
        created: function () {

        }
    };
</script>

<style>

</style>
