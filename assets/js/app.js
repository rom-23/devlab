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

import './webComponents/project-details.component';
import './webComponents/cc-countdown.component';
import './webComponents/project-card.component';


// document.querySelector('#but').addEventListener('click',function(){
//     const template = document.querySelector('#demo');
//     const templateContent = template.content;
//     document.querySelector('#displayBase').appendChild((templateContent.cloneNode(true)));
// });
