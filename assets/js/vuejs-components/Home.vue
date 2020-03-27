<template>
    <div>
        <Jumbotron/>
        <Profil/>
        <v-container>
            <Experience/>
        </v-container>
        <v-container fluid class="secondary">
            <Development/>
        </v-container>
        <Project/>
        <Contact/>
        <Footer/>
    </div>
</template>
<script>
    import Jumbotron from './Jumbotron.vue';
    import Experience from './Experience.vue';
    import Profil from './Profil.vue';
    import Development from './Development';
    import Project from './Project';
    import Contact from './Contact';
    import Footer from './Footer';

    export default {
        name: "Home",
        components: {Jumbotron, Experience, Profil, Development, Project, Contact, Footer},
        data() {
            return {};
        },
        mounted() {
        },
        methods: {}
    };
</script>
<style scoped>
</style>
