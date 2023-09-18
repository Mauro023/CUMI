require('./bootstrap');

//SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

//Vue
import Vue from 'vue';

//Vuetify
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

import InputComponent from './components/InputComponent.vue';
import SignaturePad from './components/SignaturePad.vue';
import TechnicalReceptionMedicines from './components/TechnicalReceptionMedicines.vue';
import InvimaRegister from './components/InvimaRegister.vue';


Vue.component('input-component', InputComponent);
Vue.component('signature-pad', SignaturePad);
Vue.component('reception-medicines', TechnicalReceptionMedicines);
Vue.component('invima-register', InvimaRegister);

const app = new Vue({
  vuetify: new Vuetify(),
  el: '#app',
});
