<template>
    <div id="top">
        <Jumbotron/>
        <Experience/>
        <Development/>
        <Project/>
        <Contact/>
        <Footer/>
    </div>
</template>
<script>
    import Jumbotron from './Jumbotron.vue';
    import Experience from './Experience.vue';
    import Development from './Development';
    import Project from './Project';
    import Contact from './Contact';
    import Footer from './Footer';

    export default {
        name: "Home",
        components: {Jumbotron, Experience, Development, Project, Contact, Footer},
        data() {
            return {};
        },
        mounted() {
        },
        methods: {},
        created() {

        }
    };
</script>
<style>
</style>
