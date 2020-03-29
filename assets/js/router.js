import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'home',
            components: {
                main: () => import('./vuejs-components/Home.vue'),
                left: () => import('./vuejs-components/technologies/SearchTechno.vue'),
            },
        },
        {
            path: '/technologies/:id',
            name: 'technologies',
            components: {
                main: () => import('./vuejs-components/Home.vue'),
                left: () => import('./vuejs-components/technologies/SearchTechno.vue'),
            },
        },
    ],
});
