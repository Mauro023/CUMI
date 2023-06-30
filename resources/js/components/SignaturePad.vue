<template>
  <div id="app">
    <vueSignaturePad
      id="employe_signature" 
      width="300px" 
      height="120px" 
      name="employe_signature" 
      v-model="employe_signature" 
      ref="signaturePad"
    ></vueSignaturePad>
    <div class="buttons"> 
      <button @click.prevent="save" class="btn btn-default"><span class="fas fa-check-circle" style="color: #69C5A0; font-size:larger;"></span></button>
      <button @click.prevent="clear" class="btn btn-default"><span class="fas fa-times-circle" style="color: #da1b1b; font-size: larger;"></span></button>
    </div>
    <div>
      <label>
        <input type="hidden" name="employe_signature" v-model="employe_signature">
      </label>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { VueSignaturePad } from 'vue-signature-pad';

export default defineComponent({
  name: 'MySignaturePad',
  components: { VueSignaturePad },
  props: {
    initialSignature: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      employe_signature: this.initialSignature || ''
    };
  },
  mounted() {
    // Actualizar la firma en tiempo real
    this.$refs.signaturePad.$on('signatureInput', (signatureData) => {
      this.employe_signature = signatureData;
    });
  },
  methods: {
    clear() {
      this.$refs.signaturePad.clearSignature();
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
      console.log(isEmpty);
      this.employe_signature = data;
      console.log(this.employe_signature);
    },
  },
});
</script>

<style>
#employe_signature {
  border: double 3px transparent;
  border-radius: 5px;
  background-image: linear-gradient(white, white),
    radial-gradient(circle at top left, #A3BF18, #00B0EA);
  background-origin: border-box;
  background-clip: content-box, border-box;
}

.buttons {
  display: flex;
  gap: 8px;
  justify-content: center;
  margin-top: 8px;
}
</style>
