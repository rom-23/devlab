<template>
<div>
    <Jumbotron/>
    <Experience/>
    <Profil/>
</div>
</template>
<script>
import Jumbotron from './vuejs-components/Jumbotron.vue';
import Experience from './vuejs-components/Experience.vue';
import Profil from './vuejs-components/Profil.vue';
    export default {
        name: "App",
        components: {Jumbotron,Experience,Profil},
        props: {},
        data: () => ({
            boosters: []
        }),

        methods: {},
        created: function () {

        }
    };
</script>

