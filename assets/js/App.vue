<template>
    <v-app light>
        <v-navigation-drawer color="secondary" v-model="drawer" app clipped>
            <v-list dense>
                <v-list-item @click="">
                    <v-list-item-action>
                        <v-icon>mdi-desktop-mac-dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Dashboard</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="">
                    <v-list-item-action>
                        <v-icon>mdi-folder</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Settings</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"/>
            <v-toolbar-items class="nav myTitle">Développeur Web</v-toolbar-items>
            <div class="flex-grow-1"></div>
            <v-toolbar-items class="nav">
                <ul class=" nav navLink">
                    <a href="#propos" @click.prevent="scrollTo('#propos')">
                        à propos</a>
                    <a href="#experiences" @click.prevent="scrollTo('#experiences')">
                        Compétences</a>
                    <a href="#portfolio" @click.prevent="scrollTo('#portfolio')">
                        Portfolio</a>
                    <a href="#contactMe" @click.prevent="scrollTo('#contactMe')">
                        Contact</a>
                    <a href="/admin">Back-end</a>
                </ul>
            </v-toolbar-items>
        </v-app-bar>
        <v-content>
                <router-view name="main"></router-view>
        </v-content>
    </v-app>
</template>
<script>

    export default {
        name: "App",
        components: {},
        props: {},
        data: () => ({
            drawer: false,
        }),

        methods: {},
        created: function () {

        }
    };
</script>

<style>

</style>
