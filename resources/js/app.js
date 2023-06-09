require('./bootstrap');

import Vue from 'vue';
import InputComponent from './components/InputComponent.vue';
import SignaturePad from './components/SignaturePad.vue';



Vue.component('input-component', InputComponent);
Vue.component('signature-pad', SignaturePad);

const app = new Vue({
  el: '#app',
});
