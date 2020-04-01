<template>
    <v-app light>
        <v-navigation-drawer color="secondary" v-model="drawer" app clipped width="40em">
            <v-container>
                <GlobalSearch/>
            </v-container>
        </v-navigation-drawer>
        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"/>
            <v-toolbar-items class="nav myTitle"><a href="/">RomDev</a></v-toolbar-items>
            <div class="flex-grow-1"></div>
            <v-toolbar-items class="nav">
                <ul class="nav navLink ">
                    <a href="#propos" @click.prevent="scrollTo('#top')">
                        à propos</a>
                    <a href="#techno" @click.prevent="scrollTo('#techno')">
                        Technologies</a>
                    <a href="#projets" @click.prevent="scrollTo('#projets')">
                        Projets</a>
                    <a href="#ressource" @click.prevent="scrollTo('#ressource')">
                        Ressources</a>
                    <a href="#">
                        Blog</a>
                    <a href="#contactMe" @click.prevent="scrollTo('#contactMe')">
                        Contact</a>
                    <a href="/admin">Back-end</a>
                </ul>
            </v-toolbar-items>
        </v-app-bar>
        <v-content>
            <router-view name="main"/>
        </v-content>
    </v-app>
</template>
<script>
import GlobalSearch from './vuejs-components/global-search/GlobalSearch.vue';
    export default {
        name: "App",
        components: {GlobalSearch},
        props: {},
        data: () => ({
            drawer: false,
            valeur_scroll: 0,
            spies: null,
            anchor: null,
            observer: null,
            ratio: 0.5,
        }),
        mounted() {
            window.addEventListener('scroll', this.handleScroll);
            this.spies = document.querySelectorAll('[data-spy]');
            if (this.spies.length > 0) {
                const y = Math.round(window.innerHeight * this.ratio);
                this.observer = new IntersectionObserver(this.callback, {
                    rootMargin: `-${window.innerHeight - y - 1}px 0px -${y}px 0px`,
                });
                this.spies.forEach((spy) => {
                    this.observer.observe(spy);
                });
            }
        },
        beforeDestroy() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        destroyed() {
            this.observer.disconnect();
        },
        methods: {
            scrollTo(selector) {
                document.querySelector(selector).scrollIntoView({behavior: 'smooth'});
            },
            handleScroll() {
                this.valeur_scroll = window.scrollY;
                //parallax class
                document.querySelector('.parallax1').style.transform = `translateY(${this.valeur_scroll / 8}px)`;
                document.querySelector('.parallax4').style.transform = `translateY(${this.valeur_scroll / 15}px)`;
                document.querySelector('.parallax2').style.transform = `translateY(${this.valeur_scroll / 17}px)`;
                document.querySelector('.parallax3').style.transform = `translateY(${this.valeur_scroll / 18}px)`;
                document.querySelector('.parallax5').style.transform = `translateY(${this.valeur_scroll / 18}px)`;
                document.querySelector('.parallax7').style.transform = `translateY(${this.valeur_scroll / 20}px)`;
                document.querySelector('.parallax6').style.transform = `translateY(${this.valeur_scroll / 20}px)`;
            },
        },
        created: function () {

        }
    };
</script>

<style>

</style>
