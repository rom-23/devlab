import Vue from 'vue';
import App from './App.vue';

Vue.config.productionTip = false;

new Vue({
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
