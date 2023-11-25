require('./bootstrap');
window.Vue = require('vue').default;

//SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

// Importa Vue y Vuetify
import vuetify from './vuetify';

//Vue select
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

Vue.component("v-select", vSelect);
Vue.component('invima-register', require('./components/InvimaRegister.vue').default);
Vue.component('input-component', require('./components/InputComponent.vue').default);
Vue.component('signature-pad', require('./components/SignaturePad.vue').default);
Vue.component('reception-medicines', require('./components/TechnicalReceptionMedicines.vue').default);

//Modals
Vue.component('medicine-modal', require('./components/Modals/MedicineModal.vue').default);

const app = new Vue({
  vuetify,
  el: '#app',
});
