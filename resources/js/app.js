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
Vue.component('payment-component', require('./components/Doctors/PaymentComponent.vue').default);

//Medicines
Vue.component('medicine-modal', require('./components/Modals/MedicineModal.vue').default);

//Menú
Vue.component('cost-menu', require('./components/Menu/Cost.vue').default);

//Endowment
Vue.component('addcard-component', require('./components/Card/addcardComponent.vue').default);

const app = new Vue({
  vuetify,
  el: '#app',
});
