import Vue from 'vue';
import App from './App.vue';
import router from './router';
import Vuetify from 'vuetify';
import light from './theme';

Vue.config.productionTip = false;
Vue.use(Vuetify);

const vuetify = new Vuetify({
    theme: {
        themes: { light },
    },
    icons: {
        iconfont: 'mdi'
    },
});
new Vue({
    router,
    vuetify,
    render: h => h(App),
}).$mount('#app');

