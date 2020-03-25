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
                main: () => import('./vuejs-components/Profil'),
            },
        },
        {
            path: '/editculture/:idculture',
            name: 'editculture',
            components: {
                // navbar: () => import('./components/Home/NavBar.vue'),
                // main: () => import('./components/EditCulture/EditCulture.vue'),
                // right: () => import('./components/EditCulture/RightCardCulture.vue'),
                // left: () => import('./components/Home/SearchCulture.vue'),
                // left2: () => import('./components/Home/Strains.vue'),
            },
            children: [
                {
                    path: 'editculture.measure',
                    name: 'measure',
                    component: () => import('./vuejs-components/Experience'),
                },
                {
                    path: 'editculture.charts',
                    name: 'charts',
                    component: () => import('./vuejs-components/Profil'),
                },
            ],
        },
    ],
});
