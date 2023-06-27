require('./bootstrap');

import Vue from 'vue';
import InputComponent from './components/InputComponent.vue';
import SignaturePad from './components/SignaturePad.vue';
import TechnicalReceptionMedicines from './components/TechnicalReceptionMedicines.vue';



Vue.component('input-component', InputComponent);
Vue.component('signature-pad', SignaturePad);
Vue.component('reception-medicines', TechnicalReceptionMedicines);

const app = new Vue({
  el: '#app',
});
